<?php
/**
 * phpblog AdminController.php.
 * Initial Version by: Em
 * Creation Date: 4/18/2021
 */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AdminMiddleware;
use app\models\User;

class AdminController extends Controller {

    /**
     * Main Constructor, set default layout
     *
     * @returns void
     */
    public function __construct() {
        $this->layout = 'admin/layouts/main';
        $this->registerMiddleware(new AdminMiddleware([]));
    }

    /**
     * index function return view admin
     *
     * @return string|string[]
     * */
    public function index(){
        return $this->view('admin.admin');
    }

    /**
     * profile function, return view admin with user data
     *
     * @return string|string[]
     * */
    public function profile(){
        $user = (new User)->findUserById($_SESSION['user_id']);
        $data = ['user' => $user];
        return $this->view('admin.profile', $data);
    }
}