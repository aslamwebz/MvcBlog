<?php
/**
 * phpblog User.php.
 * Initial Version by: Em
 * Creation Date: 4/15/2021
 */

namespace app\models;

use app\core\Model;
/**
 * Class User
 *
 * @author M Aslam <aslam4webz@gmail.com>
 */
class User extends Model{

    public function login($data){
        $user = $this->findUser($data['email']);
        if($user){
            if(!password_verify($data['password'], $user->password)){
                return 'username or password error';
            }else{
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_name'] = $user->username;
                $_SESSION['user_email'] = $user->email;
                return $user;
            }
        }else {
            return 'User Not Found';
        }
    }

    public function register($data){
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $statement = $this->pdo->prepare("INSERT INTO users VALUES (?, ?, ?, ?,?,?,?,?,?)");
        if($statement->execute(["", $data['username'],"","", $data['email'], $password,"", date("Y-m-d H:i:s"), date("Y-m-d H:i:s")])){
            return true;
        }else {
            return false;
        }
    }

    public function findUser($email){
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        if($statement->execute([$email])){
            return $statement->fetchObject();
        }else{
            return false;
        }
    }

    public function findUserById($id){
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        if($statement->execute([$id])){
            return $statement->fetchObject();
        }else{
            return false;
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
    }
}