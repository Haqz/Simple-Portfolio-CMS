<?php

require_once './bbcode.php';
require "scssphp/scss.inc.php";
require 'Models/Post.php';

$post = new Post;
$scss = new scssc();

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
  <form method="post">
    <input type="text" name="title" required>
    <input type="text" name="content" required>
    <input type="submit" name="submit">
  </form>
  <?php
    $foo->getPostsStyled(false);
  ?>
</body>
</html>
