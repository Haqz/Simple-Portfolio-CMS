<?php

require 'Classes/Autoloader.php';
try{
    $db = new Database();
    $post = new Post($db);
    $user = new User;
    $settings = new Settings;
    $scss = new scssc();
} catch(Exception $e){
    echo $e->getMessage();
}
$scss->setImportPaths("scss/");
$scss->setVariables(
    array(
      'background' => $settings->getStyleClass("background"))
);
echo "<style>".$scss->compile('@import "article.scss"')."</style>";


print_r($post->findPostData($_GET['id']));