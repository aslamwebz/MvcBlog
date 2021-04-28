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
    public function getMethod(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getUrl(){
        $path = $_SERVER['REQUEST_URI'];
        $position = strpos($path, '?');
        if($position !== false){
            $path = substr($path, 0 , $position);
        }
        return $path;
    }

    public function isGet(){
        return $this->getMethod() === 'get';
    }

    public function isPost(){
        return $this->getMethod() === 'post';
    }


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