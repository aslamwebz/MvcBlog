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

    public function store($data){
        var_dump($data);
        $sql = "INSERT INTO posts VALUES (?,?,?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        if($statement->execute(['','1', $data['title'], $data['body'], $data['image'], '', ''])){
            return true;
        }else{
            return false;
        }

    }

    public function update($data){
        var_dump($data);
       $statement = $this->pdo->prepare("UPDATE posts SET title=?, body =?, image=? where id=?");
       if($statement->execute([$data['title'], $data['body'], $data['image'], $data['id']])){
           return true;
       }else {
           return false;
       }

    }

    public function getPost($id){
            $sql = "SELECT * FROM posts where id=?";
            $statement = $this->pdo->prepare($sql);
            if($statement->execute([$id])){
                return $statement->fetch();
            }else{
                return false;
            }
    }

    public function getPosts(){
        $statement = $this->pdo->prepare("SELECT * FROM posts");
        if($statement->execute()){
            return $statement->fetchAll();
        }else{
            return false;
        }
    }

    public function destroy($id) {
        $statement = $this->pdo->prepare("DELETE FROM posts WHERE id=?");
        if($statement->execute([$id])){
            return true;
        }else{
            return false;
        }
    }
}