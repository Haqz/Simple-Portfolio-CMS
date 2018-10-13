<?php
$directory = "stylesheets";

require "scssphp/scss.inc.php";
$foo = new scssc();
$foo->setImportPaths("scss/");
$foo->setVariables(array(
'color' => "#f1aaaa"
));
echo "<style>".$foo->compile('@import "main.scss"')."</style>";

require 'Models/Post.php';
$foo = new Post;
 if($_POST['submit']){
  $date = new DateTime();
  $f3 = $date->getTimestamp();
  $foo->insertPost("Halo alo", "Co tam u was", $f3);
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
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>
<body>
  <form method="post">
    <input type="submit" name="submit">
  </form>
  <?php
  $foo->getPostsStyled();
  ?>
</body>
</html>
