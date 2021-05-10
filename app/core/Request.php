<?php
/**
 * phpblog Request.php.
 * Initial Version by: Em
 * Creation Date: 4/14/2021
 */


namespace app\core;


/**
 * Class Request
 *
 * @author M Aslam <aslam4webz@gmail.com>
 * @package  app\core;
 */
class Request {

    public array $params = [];

    /**
     * get method type
     *
     * @return false|string
     */
    public function getMethod(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * get URL
     *
     * @return string
     */
    public function getUrl(){
        $path = $_SERVER['REQUEST_URI'];
        $position = strpos($path, '?');
        if($position !== false){
            $path = substr($path, 0 , $position);
        }
        return $path;
    }

    /**
     * return true if POST
     *
     * @return bool
     */
    public function isGet(){
        return $this->getMethod() === 'get';
    }

    /**
     * return true if POSTt
     *
     * @return bool
     */
    public function isPost(){
        return $this->getMethod() === 'post';
    }


    /**
     * return body after sanitize
     *
     * @return array
     */
    public function getBody(){
        $data = [];
        if($this->isGet()){
            foreach ($_GET as $key => $value){
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if($this->isPost()){
            foreach ($_POST as $key => $value){
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
            }
        }
        return $data;
    }
}