<?php
error_reporting(E_ERROR && E_WARNING);
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


$file = basename(__FILE__, '.php');

require __DIR__ . '/TwigBootstrap.php';



if ($_POST['login']) {
    try {
        if($user->Login($_POST['nick'], $_POST['pass']) == true) header('Location: admin.php?site=1', true, 301);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
$site = $_GET['site'];
if (!$site) {
    echo $twig->render('_'.$file.'.html');
} else {
    echo $twig->render('_'."$file$site".'.html');
}
if ($_POST['unset']) {
    unset($_SESSION['logged']);
}
if ($_POST['submit']) {
    $f1 = $_POST['title'];
    $f2 = $_POST['content'];
    $date = new DateTime();
    $f3 = $date->getTimestamp();
    $post->insertPost($f1, $f2, $f3);
}

$scss->setImportPaths("Style/scss/");
echo "<style>".$scss->compile('@import "main.scss"')."</style>";