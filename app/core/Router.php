<?php
/**
 * phpblog Router.php.
 * Initial Version by: Em
 * Creation Date: 4/13/2021
 */


namespace app\core;


/**
 * Class Router
 *
 * @author M Aslam <aslam4webz@gmail.com>
 * @package  app\core;
 */
class Router {

    private array $routes = [];
    public Request $request;
    public Response $response;

    /**
     * default constructor
     *
     */
    public function __construct() {
        $this->request = new Request();
        $this->response = new Response();
    }

    /**
     * add url params to routes
     *
     * @param $url
     * @param $callback
     */
    public function get($url, $callback){
        $this->routes['get'][$url] = $callback;
    }

    /**
     * add url params to routes
     *
     * @param $url
     * @param $callback
     */
    public function post($url, $callback){
        $this->routes['post'][$url] = $callback;
    }

    /**
     * get regex pattern if matched :id {id}
     *
     * @param $pattern
     * @return bool|string
     */
    function getRegex($pattern){
        if (preg_match('/[^-:\/_{}()a-zA-Z\d]/', $pattern))
            return false; // Invalid pattern

        // Turn "(/)" into "/?"
        $pattern = preg_replace('#\(/\)#', '/?', $pattern);

        // Create capture group for ":parameter"
        $allowedParamChars = '[a-zA-Z0-9\_\-]+';
        $pattern = preg_replace(
            '/:(' . $allowedParamChars . ')/',   # Replace ":parameter"
            '(?<$1>' . $allowedParamChars . ')', # with "(?<parameter>[a-zA-Z0-9\_\-]+)"
            $pattern
        );

        // Create capture group for '{parameter}'
        $pattern = preg_replace(
            '/{('. $allowedParamChars .')}/',    # Replace "{parameter}"
            '(?<$1>' . $allowedParamChars . ')', # with "(?<parameter>[a-zA-Z0-9\_\-]+)"
            $pattern
        );

        // Add start and end matching
        $patternAsRegex = "@^" . $pattern . "$@D";

        return $patternAsRegex;
    }


    /**
     * Router resolve function, resolves url to view or controller with request and response
     *
     * @return mixed|string|string[]
     */
    public function resolve(){
        $url = $this->request->getUrl();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$url] ?? false;

        foreach ($this->routes[$method] as $key => $value){
           if($value[1] == 'edit' || $value[1] == 'delete' || $value[1] == 'post'){
               //matching our urls with regex, if matched call callback directly
               $patternAsRegex = $this->getRegex($key);
               if ($ok = !!$patternAsRegex) {
                   // We've got a regex, let's parse a URL
                   if ($ok = preg_match($patternAsRegex,  $url, $matches)) {
                       $params = array_intersect_key(
                           $matches,
                           array_flip(array_filter(array_keys($matches), 'is_string'))
                       );

                       // Turn parameter array into string
                       list ($k, $v) = each($params);
                       $params = [$k => $v];
                       $this->request->params = $params;
                       //callback
                       $controller = new $value[0];
                       $controller->action = $value[1];
                       Application::$app->controller = $controller;
                       $callback[0] = $controller;
                       $callback[1] = $value[1];
                    return call_user_func($callback, $this->request, $this->response);
                   }
               }
           }
        }

        //Error 404 page
        if(!$callback){
            return Application::$app->renderView('exceptions.404');
        }

        //if string view page
        if(is_string($callback)){
            return Application::$app->renderView($callback);
        }

        //if array, map controller and action
        if(is_array($callback)){
            /** @var \app\core\Controller $controller */
            $controller = new $callback[0];
            // used for middleware
            $controller->action = $callback[1];
            Application::$app->controller = $controller;
            $callback[0] = $controller;

            foreach ($controller->getMiddleware() as $middleware){
                $middleware->execute();
            }
        }

        return call_user_func($callback, $this->request,$this->response);
    }

//    public function getUrl()
//    {
//        if (isset($_GET['url'])) {
//            //remove last /
//            $url = rtrim($_GET['url'], '/');
//            //filter variables
//            $url = filter_var($url, FILTER_SANITIZE_URL);
//            //Break into an array
//            $url = explode('/', $url);
//            return $url;
//        }
//    }

}