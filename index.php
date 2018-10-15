<?php

require_once './bbcode.php';
require "scssphp/scss.inc.php";
require 'Models/Post.php';
require 'Models/User.php';

$post = new Post;
$scss = new scssc();
$user = new User;

$directory = "stylesheets";
$scss->setImportPaths("scss/");
$scss->setVariables(array(
'color' => "#f1aaaa"
));
echo "<style>".$scss->compile('@import "main.scss"')."</style>";



if($_POST['submit']){
  $f1 = $_POST['title'];
  $f2 = $_POST['content'];
  $date = new DateTime();
  $f3 = $date->getTimestamp();
  $f2 = bbcode::tohtml($f2);
  $post->insertPost($f1, $f2, $f3);
  header('Location: index.php', true, 301);
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class="container">
  <form method="post">
    <input type="text" name="title" required>
    <input type="text" name="content" required>
    <input type="submit" name="submit">
  </form>
  <?php
    $post->getPostsStyled(false);
    $user->Login("ADmin", 'MamaMama1');
    //$user->Register("ADmin","maszynista91@gmail.com", "MamaMama1");
    if(isset($_SESSION['error_mail'])){
      echo $_SESSION['error_mail'];
      unset($_SESSION['error_mail']);
    } else if(isset($_SESSION['error_nick'])){
      echo $_SESSION['error_nick'];
      unset($_SESSION['error_nick']);
    }else if(isset($_SESSION['error_pass'])){
      echo $_SESSION['error_pass'];
      unset($_SESSION['error_pass']);
    }
  ?>
  </div>
</body>
</html>
