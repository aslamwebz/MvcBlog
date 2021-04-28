<?php
/**
 * phpblog HomeController.php.
 * Initial Version by: Em
 * Creation Date: 4/14/2021
 */
namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Post;

/**
 * Class HomeController
 *
 * @author M Aslam <aslam4webz@gmail.com>
 */
class HomeController extends Controller{

    public function __construct() {
        $this->layout = 'layouts/main';
    }

    public function index(){
        $post = new Post();
        $posts = $post->getPosts();
        $data = ['posts' => $posts];
        return $this->view('home', $data);
    }

    public function post(Request $request){
        $post = new Post();
        $postData = $post->getPost($request->params['id']);
        $data = ['post' => $postData];
        return $this->view('post', $data);
    }

}