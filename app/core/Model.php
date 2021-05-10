<?php
/**
 * phpblog Model.php.
 * Initial Version by: Em
 * Creation Date: 4/17/2021
 */

namespace app\core;

use app\db\Database;

/**
 * Class Model
 *
 * @author M Aslam <aslam4webz@gmail.com>
 * @package  app\core;
 */
class Model extends Database {

    public function __construct() {
        parent::__construct();
    }

}