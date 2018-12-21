<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
header('Content-Type:application/json');
require '../../vendor/autoload.php';
$db = new SPC\Database('../../messaging.sqlite3');
$app = new \Slim\App;
$app->get('/getPost/{id}', function (Request $request, Response $response, array $args) {
    
    
    global $db;
    $id = $args['id'];
    try{
        $post = $db->getOne($id, 'messages');
    } catch (Exception $ex){
        echo $ex;
    }
    return $response->withJson($post, 201);
});
$app->get('/getAllPosts', function (Request $request, Response $response, array $args) {
    
    global $db;
    try{
        $post = $db->getAll('messages');
    } catch (Exception $ex){
        echo $ex;
    }
    return $response->withJson($post, 201);
});
$app->run();