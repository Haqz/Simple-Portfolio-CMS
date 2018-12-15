<?php

include 'Classes/Autoloader.php';
try{
  $post = new Post;
  $user = new User;
  $settings = new Settings;
$scss = new scssc();
}catch(Exception $e){
  echo $e->getMessage();
}
$scss->setImportPaths("scss/");
$scss->setVariables(array(
'background' => $settings->getStyleClass("background")
));
echo "<style>".$scss->compile('@import "article.scss"')."</style>";

$post = new Post;

$post->findOnePost($_GET['id']);