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

    /**
     * Main constructor, set layout
     *
     * @return void
     *
     * */
    public function __construct() {
        $this->layout = 'layouts/main';
    }

    /**
     * return index view with post data
     *
     * @return string|string[]
     *
     * */
    public function index(){
        $post = new Post();
        $posts = $post->getPosts();
        $data = ['posts' => $posts];
        return $this->view('home', $data);
    }

    /**
     * return view post data or error
     *
     * @param Request $request
     * @return string|string[]
     *
     */
    public function post(Request $request){
        $post = new Post();
        $postData = $post->getPost($request->params['id']);
        if($postData != ''){
            $data = ['post' => $postData];
            return $this->view('post', $data);
        }else{
            $data = [
                'error' => 'no data found'
            ];
            return $this->view('posts', $data);
        }

    }

}