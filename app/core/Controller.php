<?php
/**
 * phpblog Controller.php.
 * Initial Version by: Em
 * Creation Date: 4/14/2021
 */

namespace app\core;


/**
 * Class Controller
 *
 * @author M Aslam <aslam4webz@gmail.com>
 * @package  app\core;
 */
class Controller {
    public string $layout = 'main';
    public string $action = '';

    public function view($view, $params = []){
        return Application::$app->renderView($view, $params);
    }

    public function setLayout($layout){
        $this->layout = $layout;
    }
}