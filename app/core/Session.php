<?php
/**
 * phpblog Session.php.
 * Initial Version by: Em
 * Creation Date: 4/18/2021
 */


namespace app\core;


/**
 * Class Session
 *
 * @author M Aslam <aslam4webz@gmail.com>
 * @package  app\core;
 */
class Session {
    protected const FLASH_KEY = 'flash_messages';

    /**
     * default constructor,session start
     *
     * @return void
     *
     * */
    public function __construct() {
        session_start();
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$flashMessage){
            $flashMessages['remove'] = true;
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    /**
     * set session val
     *
     * @param $key
     * @param $value
     * @return void
     *
     */
    public function set($key,$value){
        $_SESSION[$key] = $value;
    }

    /**
     * get session val
     *
     * @param $key
     * @return string|bool
     *
     */
    public function get($key){
        return $_SESSION[$key] ?? false;
    }

    /**
     * remove session val
     *
     * @param $key
     * @return void
     *
     */
    public function remove($key){
        unset($_SESSION[$key]);
    }

    /**
     * set session flash message
     *
     * @param $key
     * @param $message
     * @return void
     */
    public function setFlash($key,$message){
        $_SESSION[self::FLASH_KEY][$key] = [
            'remove' => false,
            'value' => $message
        ];
    }


    /**
     * get flash message
     *
     * @param $key
     * @return string|bool
     *
     */
    public function getFlash($key){
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }

    /**
     * remove all flash messages
     *
     * @return void
     *
     */
    public function __destruct()
    {
        $this->removeFlashMessages();
    }

    /**
     * flash message remove method
     *
     * @return void
     *
     */
    public function removeFlashMessages()
    {
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => $flashMessage) {
                unset($flashMessages[$key]);
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

//    public function sessionTimeoutRemove(){
//        //Ending a php session after 30 minutes of inactivity
//        $minutesBeforeSessionExpire=30;
//        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > ($minutesBeforeSessionExpire*60))) {
//            session_unset();     // unset $_SESSION
//            session_destroy();   // destroy session data
//        }
//        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity

//        $minutesBeforeSessionExpire=0.1;
//        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > ($minutesBeforeSessionExpire*60))) {
//           $this->removeFlashMessages();
//        }
//        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity
//        var_dump($minutesBeforeSessionExpire*60);
//    }
}