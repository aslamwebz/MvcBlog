<?php
/**
 * phpblog Database.php.
 * Initial Version by: Em
 * Creation Date: 4/15/2021
 */

namespace app\db;
use PDO;
use PDOException;

/**
 * Class Database
 *
 * @author M Aslam <aslam4webz@gmail.com>
 */
class Database {

//    private string $dbname = 'mvcblog';
//    private string $user = 'root';
//    private string $password = '';
//    private string $host = 'localhost';
    public PDO $pdo;
    private $statement;
    private $error;


    public function __construct() {
        $dsn = 'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_DATABASE'].';charset=utf8';

        try {
            $this->pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
            //Error mode Exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            echo $this->error = $e->getMessage();
        }
    }

    /*//Initiate Query
    public function query($sql) {
        $this->statement = $this->pdo->prepare($sql);
    }

    //Bind Values
    public function bind($parameter, $value, $type = null)
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }

        $this->statement->bindValue($parameter, $value, $type);
    }

    public function execute*/
}