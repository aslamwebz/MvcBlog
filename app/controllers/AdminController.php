<?php
/**
 * phpblog AdminController.php.
 * Initial Version by: Em
 * Creation Date: 4/18/2021
 */


namespace app\controllers;


use app\core\Application;
use app\core\Controller;

/**
 * Class AdminController
 *
 * @author M Aslam <aslam4webz@gmail.com>
 * @package  app\controllers;
 */
class AdminController extends Controller {

    public function __construct() {
        $this->layout = 'admin/layouts/main';
    }

    public function index(){
        return $this->view('admin.admin');
    }
}