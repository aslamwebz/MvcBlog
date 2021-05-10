<?php
/**
 * phpblog User.php.
 * Initial Version by: Em
 * Creation Date: 4/15/2021
 */

namespace app\models;

use app\core\Application;
use app\core\Model;
/**
 * Class User
 *
 * @author M Aslam <aslam4webz@gmail.com>
 */
class User extends Model{

    /**
     * user login
     *
     * @param $data
     * @return object|bool|mixed
     */
    public function login($data){
        $user = $this->findUser($data['email']);
        if(!$user){
            Application::$app->session->setFlash('error', 'User Dosen\'t exist');
            return false;
        }

        if(!password_verify($data['password'], $user->password)){
            Application::$app->session->setFlash('error', 'Username or Password error');
            return false;
        }else{
            Application::$app->session->set('user_id' , $user->id);
            Application::$app->session->set('user_name' , $user->username);
            Application::$app->session->set('user_email' , $user->email);
//            $_SESSION['user_id'] = $user->id;
//            $_SESSION['user_name'] = $user->username;
//            $_SESSION['user_email'] = $user->email;
            return $user;
        }
    }

    /**
     * user register
     *
     * @param $data
     * @return bool
     */
    public function register($data){
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $statement = $this->pdo->prepare("INSERT INTO users VALUES (?, ?, ?, ?,?,?,?,?,?)");
        if($statement->execute(["", $data['username'],$data['firstname'],$data['lastname'], $data['email'], $password,"", date("Y-m-d H:i:s"), date("Y-m-d H:i:s")])){
            return true;
        }else {
            return false;
        }
    }

    /**
     * find user by email
     *
     * @param $email
     * @return bool
     */
    public function findUser($email){
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        if($statement->execute([$email])){
            return $statement->fetchObject();
        }else{
            return false;
        }
    }

    /**
     * find user by id
     *
     * @param $id
     * @return bool
     */
    public function findUserById($id){
        $statement = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        if($statement->execute([$id])){
            return $statement->fetchObject();
        }else{
            return false;
        }
    }

    /**
     * user logout
     *
     */
    public function logout(){
//        unset($_SESSION['user_id']);
//        unset($_SESSION['user_name']);
//        unset($_SESSION['user_email']);
        Application::$app->setCurrentUser(null);
        Application::$app->session->remove('user_id');
        Application::$app->session->remove('user_name');
        Application::$app->session->remove('user_email');
    }
}