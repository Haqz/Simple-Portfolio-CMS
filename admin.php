<?php
   require 'vendor/autoload.php';
   require 'Classes/Autoloader.php';
   try{
       
       $db = new SPC\Database();
       $settings = new SPC\Settings($db);
       $post = new SPC\Post($db);
       $user = new SPC\User($db);
       $scss = new scssc;
   }catch(Exception $e){
       echo $e->getMessage();
   }
   
   $scss->setImportPaths("scss/");
   echo "<style>".$scss->compile('@import "main.scss"')."</style>";
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
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Page Title</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
      <!-- BOOTSTRAP FILES -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <!-- FONT AWESOME -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
      <script src="main.js"></script>
   </head>
   <body class="admin-body">
   <nav class="navigation navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
         <a class="navbar-brand">
         <img src="asets/images/prof.png" alt="Logo haqz"><span>Haqz</span>
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="menu-btn navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse nav-list-left text-left" id="navbarNav">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" href="index.php">Home</a>
               </li>
            </ul>
         </div>
      </nav>
      <main class="admin-main">
         <div class="box">
         <h2>Login</h2>
               <form method="post">
               <img src="asets/images/avatar.png" alt="">
               <div class="input-box">
                  <input type="text" name="nick" required>
                  <label for="">Username</label>
                </div>
                <div class="input-box">
                  <input type="password" name="pass" required>
                  <label for="">Password</label>
                </div>
                  <input type="submit" name="login">
               </form>  
         </div>
      </main>
      <!-- <form method="post">
         <input type="submit" name="unset">
      </form> -->
   </body>
</html>