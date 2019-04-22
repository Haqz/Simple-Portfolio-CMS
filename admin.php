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
//    if ($_POST['login']) {
//        $user->Login($_POST['nick'], $_POST['pass']);
//        header('Location: admin.php', true, 301);
//    }
//    function printSite($id) 
//    {
//        global $settings;
//        switch($id){
//        case 1:
//                echo '
//                <form method="post">
//            <input type="text" name="title" required>
//            <input type="text" name="content" required>
//            <input type="submit" name="submit">
//            </form>';
//            break;
//        case 2:
//            echo "<textarea rows='4' cols='50' name='css'>". $settings->readStyleFile() ." </textarea>";
//            break;
//        default:
//            echo 'heji';
//            break;
//        }
//    }
//        $get = $_GET['site'];
//    if ($get) {
//        printSite($get);
//    }
   
//    if ($_POST['unset']) {
//        unset($_SESSION['logged']);
//    }
//    $get = $_GET['site'];
   
//    if ($_POST['submit']) {
//        $f1 = $_POST['title'];
//        $f2 = $_POST['content'];
//        $date = new DateTime();
//        $f3 = $date->getTimestamp();
//        $post->insertPost($f1, $f2, $f3);
//        header('Location: admin.php', true, 301);
//    }
   ?>
