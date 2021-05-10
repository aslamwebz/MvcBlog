<?php
/**
 * phpblog Controller.php.
 * Initial Version by: Em
 * Creation Date: 4/14/2021
 */

namespace app\core;


use app\core\middlewares\BaseMiddleware;

/**
 * Class Controller
 *
 * @author M Aslam <aslam4webz@gmail.com>
 * @package  app\core;
 */
class Controller {
    public string $layout = 'main';
    public string $action = '';

    /**
     * @var BaseMiddleware[]
     */
    protected array $middleware = [];

    /**
     * @return middlewares\BaseMiddleware[]
     */
    public function getMiddleware(): array {
        return $this->middleware;
    }

    /**
     * render view only redirect to view
     *
     * @param $view
     * @param array $params
     * @return false|string
     */
    public function view($view, $params = []){
        return Application::$app->renderView($view, $params);
    }

    /**
     * set layout
     *
     * @param $layout
     * @return void
     */
    public function setLayout($layout){
        $this->layout = $layout;
    }

    /**
     * @param BaseMiddleware $middleware
     *
     * @return void
     */
    public function registerMiddleware(BaseMiddleware $middleware){
        $this->middleware[] = $middleware;
    }
}