<?php
/**
 * phpblog Application.php.
 * Initial Version by: Em
 * Creation Date: 4/13/2021
 */

namespace app\core;
use app\models\User;

/**
 * Class Application
 *
 * @author M Aslam <aslam4webz@gmail.com>
 */
class Application {
    public static Application $app;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public View $view;
    public ?Controller $controller = null;
    public Session $session;
    public ?User $user;
    public string $layout = 'layouts/main';
    private $currentUser;

    public function __construct($rootDir) {
        self::$app = $this;
        self::$ROOT_DIR = $rootDir;
        $this->request = new Request();
        $this->router = new Router($this->request);
        $this->view = new View();
        $this->session = new Session();
        $this->user = new User();
        $userEmail = Application::$app->session->get('user_email');
        if($userEmail){
            $this->currentUser = $this->user->findUser($userEmail);
        }
    }

    public static function isGuest(){
        return !self::$app->currentUser;
    }

    public function get($path, $callback){
        $this->router->get($path, $callback);
    }

    public function post($path, $callback){
        $this->router->post($path, $callback);
    }

    public function put($path, $callback){
        $this->router->get($path, $callback);
    }

    public function delete($path, $callback){
        $this->router->post($path, $callback);
    }

    public function renderView($view, $params = []){
        return $this->view->renderView($view, $params);
    }

    public function renderViewOnly($view, $params = []){
        return $this->view->renderViewOnly($view, $params);
    }

    public function run(){
        echo $this->router->resolve();
    }
}