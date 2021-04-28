<?php
/**
 * phpblog Response.php.
 * Initial Version by: Em
 * Creation Date: 4/14/2021
 */

namespace app\core;

use http\Header;

/**
 * Class Response
 *
 * @author M Aslam <aslam4webz@gmail.com>
 * @package  app\core;
 */
class Response {

    public function redirect($url){
        Header("Location: $url");
    }

}