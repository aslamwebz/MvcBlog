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

    public function __construct() {
        session_start();
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$flashMessage){
            $flashMessages['remove'] = true;
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }

    public function set($key,$value){
        $_SESSION[$key] = $value;
    }

    public function get($key){
        return $_SESSION[$key] ?? false;
    }

    public function remove($key){
        unset($_SESSION[$key]);
    }

    public function setFlash($key,$message){
        $_SESSION[self::FLASH_KEY][$key] = [
            'remove' => false,
            'value' => $message
        ];

    }

    public function getFlash($key){
        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? false;
    }

    public function __destruct()
    {
        $this->removeFlashMessages();
    }

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