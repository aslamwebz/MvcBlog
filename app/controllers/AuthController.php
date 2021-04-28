<?php
/**
 * phpblog AuthController.php.
 * Initial Version by: Em
 * Creation Date: 4/15/2021
 */

namespace app\controllers;

use app\core\Response;
use app\models\User;
use app\core\Controller;
use app\core\Request;
use app\core\Validation;
use app\db\Database;

/**
 * Class AuthController
 *
 * @author M Aslam <aslam4webz@gmail.com>
 * @package  app\controllers;
 */
class AuthController extends Controller {
    public function __construct() {
        $this->layout = 'admin/layouts/auth';
    }

    public function login(Request $request, Response $response) {
        if ($request->isPost()) {
            $data = $request->getBody();
            $validator = new Validation();
            $validator->name('email')->value($data['email'])->is_email($data['email'])->required();
            $validator->name('password')->value($data['password'])->customPattern('[A-Za-z0-9-.;_!#@]{5,15}')->required();
            if ($validator->isSuccess()) {
                $user = new User();
                $loggedInUser = $user->login($data);
                if ($loggedInUser) {
                    return $response->redirect('/');
                }
            } else {
                $data = [
                    'email' => $data['email'],
                    'errors' => $validator->getErrors()
                ];

                return $this->view('auth.login', $data);
            }
        }
        return $this->view('auth.login');
    }

    public function register(Request $request) {

        if ($request->isPost()) {
            $data = $request->getBody();
            $user = new User();

            //Check if user email already exists
            if (!$user->findUser($data['email'])) {
                $val = new Validation();
                $val->name('username')->value($data['username'])->required();
                $val->name('firstname')->value($data['firstname'])->required();
                $val->name('lastname')->value($data['lastname'])->required();
                $val->name('email')->value($data['email'])->is_email($data['email'])->required();
                $val->name('password')->value($data['password'])->min(6)->max(25)->customPattern('[A-Za-z0-9-.;_!#@]{5,15}')->required();
                $val->name('confirmpassword')->value($data['confirmpassword'])->equal($data['password'])->required();

                if ($val->isSuccess()) {
                    if ($user->register($data)) {
                        return $this->view('auth.login');
                    }
                } else {
                    $data = [
                        'username' => $data['username'],
                        'email' => $data['email'],
                        'firstname' => $data['firstname'],
                        'lastname' => $data['lastname'],
                        'email' => $data['email'],
                        'errors' => $val->getErrors()
                    ];

                    return $this->view('auth.register', $data);
                }
            } else {
                $data = [
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'errors' => [
                        'email' => 'Email already exists'
                    ]
                ];
                return $this->view('auth.register', $data);
            }

        }
        return $this->view('auth.register');
    }

    public function logout(Request $request, Response $response) {
        $user = new User();
        $user->logout();
        $response->redirect('/');
    }
}
