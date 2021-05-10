<?php
/**
 * phpblog Post.php.
 * Initial Version by: Em
 * Creation Date: 4/19/2021
 */

namespace app\models;

use app\core\Model;

/**
 * Class Post
 *
 * @author M Aslam <aslam4webz@gmail.com>
 * @package  app\models;
 */
class Post extends Model {

    /**
     * store post
     *
     * @param $data
     * @return bool
     *
     */
    public function store($data){
        $sql = "INSERT INTO posts VALUES (?,?,?,?,?,?,?,?)";
        $user_id = $_SESSION['user_id'];
        $statement = $this->pdo->prepare($sql);
        if($statement->execute(['',$user_id, $data['title'], $data['body'], $data['image'],"","", date("Y-m-d H:i:s")])){
            return true;
        }else{
            return false;
        }

    }

    /**
     * update post
     *
     * @param $data
     * @return bool
     *
     */
    public function update($data){
       $statement = $this->pdo->prepare("UPDATE posts SET title=?, body =?, image=? where id=?");
       if($statement->execute([$data['title'], $data['body'], $data['image'], $data['id']])){
           return true;
       }else {
           return false;
       }

    }

    /**
     * get single post
     *
     * @param $id
     * @return object|array|bool
     */
    public function getPost($id){
            $sql = "SELECT * FROM posts where id=?";
            $statement = $this->pdo->prepare($sql);
            if($statement->execute([$id])){
                return $statement->fetch();
            }else{
                return false;
            }
    }

    /**
     * get all posts
     *
     * @return object|array|bool
     */
    public function getPosts(){
        $statement = $this->pdo->prepare("SELECT * FROM posts");
        if($statement->execute()){
            return $statement->fetchAll();
        }else{
            return false;
        }
    }

    /**
     * get user posts
     *
     * @return object|array|bool
     */
    public function getUserPosts(){
        $user_id = $_SESSION['user_id'];
        $statement = $this->pdo->prepare("SELECT * FROM posts where user_id = ?");
        if($statement->execute([$user_id])){
            return $statement->fetchAll();
        }else{
            return false;
        }
    }

    /**
     * delete post
     *
     * @param $id
     * @return bool
     */
    public function destroy($id) {
        $statement = $this->pdo->prepare("DELETE FROM posts WHERE id=?");
        if($statement->execute([$id])){
            return true;
        }else{
            return false;
        }
    }
}