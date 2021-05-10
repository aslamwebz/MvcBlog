<?php
/**
 * phpblog AdminMiddleware.php.
 * Initial Version by: Em
 * Creation Date: 5/10/2021
 */


namespace app\core\middlewares;


use app\core\Application;
use app\core\exceptions\ForbiddenException;

class AdminMiddleware extends BaseMiddleware {

    public array $actions = [];

    /**
     * AdminMiddleware constructor.
     * @param array $actions
     */
    public function __construct(array $actions = []) {
        $this->actions = $actions;
    }

    /**
     * checks for single or multiple actions paths and blocks them if unauthorized
     *
     * @throws ForbiddenException
     */
    public function execute() {
        if(Application::isGuest()){
            if(empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)){
                throw new ForbiddenException();
            }
        }
    }
}