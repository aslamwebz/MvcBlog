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


    /**
     * Application constructor.
     * @param $rootDir
     */
    public function __construct($rootDir) {
        self::$app = $this;
        self::$ROOT_DIR = $rootDir;
        $this->request = new Request();
        $this->router = new Router();
        $this->view = new View();
        $this->session = new Session();
        $this->user = new User();
        $userEmail = Application::$app->session->get('user_email');
        if($userEmail){
            $this->setCurrentUser($this->user->findUser($userEmail));
        } else{
            $this->setCurrentUser(null);
        }
    }

    /**
     * @return object
     */
    public function getCurrentUser() {
        return $this->currentUser;
    }

    /**
     * @param User $currentUser
     */
    public function setCurrentUser($currentUser) {
        $this->currentUser = $currentUser;
    }

    /**
     * check if user is logged in not
     *
     * @return bool
     *
     * */
    public static function isGuest(){
        return !self::$app->currentUser;
    }

    /**
     * crud function GET redirect to router
     *
     * @param $path
     * @param $callback
     * @return void
     *
     */
    public function get($path, $callback){
        $this->router->get($path, $callback);
    }

    /**
     * crud function POST redirect to router
     *
     * @param $path
     * @param $callback
     * @return void
     *
     */
    public function post($path, $callback){
        $this->router->post($path, $callback);
    }

    /**
     * crud function PUT redirect to router
     *
     * @param $path
     * @param $callback
     * @return void
     *
     */
    public function put($path, $callback){
        $this->router->get($path, $callback);
    }

    /**
     * crud function DELETE redirect to router
     *
     * @param $path
     * @param $callback
     * @return void
     *
     */
    public function delete($path, $callback){
        $this->router->post($path, $callback);
    }

    /**
     * render redirect to view
     *
     * @param $view
     * @param array $params
     * @return string|string[]
     */
    public function renderView($view, $params = []){
        return $this->view->renderView($view, $params);
    }

    /**
     * render view only, redirect to view
     *
     * @param $view
     * @param array $params
     * @return false|string
     */
    public function renderViewOnly($view, $params = []){
        return $this->view->renderViewOnly($view, $params);
    }

    /**
     * Main run
     *
     * @return void
     *
     */
    public function run(){
        try {
            echo $this->router->resolve();
        }catch (\Exception $e){
            Application::$app->controller->layout = 'layouts/main';
            echo $this->renderView('exceptions.403', [
                'exception' => $e
            ]);
        }
    }
}