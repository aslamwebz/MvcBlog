<?php
/**
 * phpblog AdminController.php.
 * Initial Version by: Em
 * Creation Date: 4/18/2021
 */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

class AdminController extends Controller {

    /**
     * Main Constructor class, set default layout
     *
     * @returns void
     */
    public function __construct() {
        $this->layout = 'admin/layouts/main';
    }

    /**
     * index function return view admin
     *
     * @return view
     * */
    public function index(){
        return $this->view('admin.admin');
    }

    /**
     * profile function, return view admin with user data
     *
     * @return view
     * */
    public function profile(){
        $user = Application::$app->user->findUserById($_SESSION['user_id']);
        $data = ['user' => $user];
        return $this->view('admin.profile', $data);
    }
}