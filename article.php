<?php

require 'vendor/autoload.php';
require 'src/Autoloader.php';
try {
    $db = new SPC\Database();
    $settings = new SPC\Settings($db);
    $post = new SPC\Post($db);
    $user = new SPC\User($db);
    $scss = new scssc;
} catch (Exception $e) {
    echo $e->getMessage();
}
$scss->setImportPaths("Style/scss/");
echo "<style>".$scss->compile('@import "main.scss"')."</style>";



$file = basename(__FILE__, '.php');
require __DIR__ . '/TwigBootstrap.php';
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $postsData = $post->getLatestPostsData();
    $actualPost = $post->findPostData($_GET['id']);
    echo $twig->render('_'.$file.'.html', ['posts'=>$postsData, 'post'=>$actualPost]);
} else {
    echo $twig->render('_404.html');
}
