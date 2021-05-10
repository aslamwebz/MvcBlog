<?php
/**
 * phpblog PostController.php.
 * Initial Version by: Em
 * Creation Date: 4/18/2021
 */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\core\Validation;
use app\Models\Post;

/**
 * Class PostController
 *
 * @author M Aslam <aslam4webz@gmail.com>
 * @package  app\controllers;
 */
class PostController extends Controller {

    /**
     * default constructor, set layout
     *
     * @return void
     *
     * */
    public function __construct() {
        $this->layout = 'admin/layouts/main';
    }

    /**
     * return index view with user post data
     *
     * @return string|string[]
     *
     * */
    public function index(){
        $post = new Post();
        $data = $post->getUserPosts();
        return $this->view('admin.posts', ['data' => $data]);
    }

    /**
     * create post
     *
     * @param Request $request
     * @param Response $response
     * @return string|string[]
     *
     */
    public function create(Request $request, Response $response){
        if($request->isPost()){
            $validator = new Validation();
            $data = $request->getBody();

            //get image params
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "images/".$filename;

            //validate everything
            $validator->name('title')->value($data['title'])->required();
            $validator->name('body')->value($data['body'])->required();
            $validator->name('image')->value($filename)->required();


            if($validator->isSuccess()){
                $post = new Post();

                //upload image
                $data['image'] = $filename;

                if (move_uploaded_file($tempname, $folder))  {
                    $msg = "Image uploaded successfully";
                }else{
                    $msg = "Failed to upload image";
                }

                //Create post
                if($post->store($data)){
                    Application::$app->session->setFlash('success', 'Post Created Successfully');
                    return $response->redirect('/posts');
                }else{
                    Application::$app->session->setFlash('error', 'Post Create Error');
                }
            }else{
                $data = [
                    'title' => $data['title'],
                    'body' => $data['body'],
                    'errors' => $validator->getErrors()
                ];
                return $this->view('admin.create', $data);
            }
        }
        return $this->view('admin.create');
    }

    /**
     * edit post
     *
     * @param Request $request
     * @param Response $response
     * @return string|string[]
     *
     */
    public function edit(Request $request, Response $response){
        $post = new Post();

        if($request->isPost()){
            $data = $request->getBody();
            $oldImage = $data['oldImage'];

            $validator = new Validation();
            $validator->name('title')->value($data['title'])->required();
            $validator->name('body')->value($data['body'])->required();

            if($validator->isSuccess()){

                //get image params
                if($_FILES['image']['name'] !== ''){
                    $filename = $_FILES["image"]["name"];
                    $tempname = $_FILES["image"]["tmp_name"];
                    $folder = "images/".$filename;
                    $data['image'] = $filename;

                    //upload image
                    if (move_uploaded_file($tempname, $folder))  {
                        $msg = "Image uploaded successfully";
                    }else{
                        $msg = "Failed to upload image";
                    }
                }else{
                    $data['image'] = $oldImage;
                }

                //update post
                if($post->update($data)){
                    Application::$app->session->setFlash('success', 'Post Updated Successfully');
                   return $response->redirect('/posts');
                }else{
                    Application::$app->session->setFlash('error', 'Post Updated Error');
                }

                $data = [
                    'id' => $data['id'],
                    'title' => $data['title'],
                    'body' => $data['body'],
                    'errors' => $validator->getErrors()
                ];

                return $this->view("admin.edit", $data);
            }else{
                $data = [
                    'title' => $data['title'],
                    'body' => $data['body'],
                    'errors' => $validator->getErrors()
                ];
                return $this->view('admin.edit', $data);
            }
        }
        if(isset($request->params['id']) && $request->params['id'] !== ''){
            $data = $post->getPost($request->params['id']);
        } else{
           $data = [];
        }
        return $this->view('admin.edit', $data);
    }


    /**
     * delete post
     *
     * @param Request $request
     * @param Response $response
     * @return string|string[]
     *
     */
    public function delete(Request $request, Response $response){
        $post = new Post();
        if($post->destroy($request->params['id'])){
            Application::$app->session->setFlash('success', 'Post Deleted Successfully');
        }else{
            Application::$app->session->setFlash('error', 'Post Delete Error');
        }

        return $response->redirect('/posts');
    }
}