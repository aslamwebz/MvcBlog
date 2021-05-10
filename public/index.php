<?php

/**
 * phpblog index.php.
 * Initial Version by: Em
 * Creation Date: 4/13/2021
 */
use app\core\Application;
use app\controllers\HomeController;
use app\controllers\AuthController;
use app\controllers\PostController;
use app\controllers\AdminController;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../app/helpers/functions.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$rootDir = dirname(__DIR__) .'/app';

$app = new Application($rootDir);

//$app->get('/', function (){
//    return 'hi';
//});


$asd = ['asd' => 123, 'def' => 'aaa'];

$app->get('/', [HomeController::class, 'index']);
$app->get('/post/:id', [HomeController::class, 'post']);
$app->get('/posts', [PostController::class, 'index']);


$app->get('/login', [AuthController::class, 'login']);
$app->get('/logout', [AuthController::class, 'logout']);
$app->get('/register', [AuthController::class, 'register']);
$app->post('/login', [AuthController::class, 'login']);
$app->post('/register', [AuthController::class, 'register']);
$app->post('/index', [AuthController::class, 'index']);

$app->get('/admin', [AdminController::class, 'index']);
$app->get('/profile', [AdminController::class, 'profile']);


$app->get('/create', [PostController::class, 'create']);
$app->post('/create', [PostController::class, 'create']);
$app->get('/edit/:id', [PostController::class, 'edit']);
$app->post('/edit', [PostController::class, 'edit']);
$app->get('/delete/:id', [PostController::class, 'delete']);

$app->run();
