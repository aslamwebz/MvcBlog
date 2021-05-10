<?php
/**
 * phpblog View.php.
 * Initial Version by: Em
 * Creation Date: 4/13/2021
 */


namespace app\core;


/**
 * Class View
 *
 * @author M Aslam <aslam4webz@gmail.com>
 * @package  app\core;
 */
class View {

    /**
     * render view
     *
     * @param $view
     * @param array $params
     * @return string|bool
     */
    public function renderView($view, array $params = []){
        $viewContent = $this->renderViewOnly($view, $params);
        $layout = Application::$app->layout;
        if(Application::$app->controller){
            $layout = Application::$app->controller->layout;
        }
        ob_start();
        require_once Application::$ROOT_DIR."/views/$layout.php";
        $layoutContent = ob_get_clean();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    /**
     * render view only
     *
     * @param $view
     * @param array $params
     * @return string|bool
     */
    public function renderViewOnly($view,array $params = []){
        foreach ($params as $key => $value){
            $$key = $value;
        }
        $position = strpos($view,'.');
        if($position !== false){
            $view = str_replace('.', '/' , $view);
        }
        ob_start();
        require_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }

}