<?php

require 'vendor/autoload.php';
require 'src/Autoloader.php';
try{
      
      $db = new SPC\Database();
      $settings = new SPC\Settings($db);
      $post = new SPC\Post($db);
      $user = new SPC\User($db);
      $scss = new scssc;
}catch(Exception $e){
      echo $e->getMessage();
}
$scss->setImportPaths("Style/scss/");
echo "<style>".$scss->compile('@import "main.scss"')."</style>";

$file = basename(__FILE__, 'php');
require __DIR__ . '/TwigBootstrap.php';
echo $twig->render('_'.$file.'html');

