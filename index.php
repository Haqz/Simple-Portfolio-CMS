<?php
require_once './bbcode.php';

include 'Classes/Autoloader.php';
try{
  $post = new Post;
  $user = new User;
  $settings = new Settings;
$scss = new scssc;
}catch(Exception $e){
  echo $e->getMessage();
}



$scss->setImportPaths("scss/");
$scss->setVariables(array(
'background' => $settings->getStyleClass("background")
));
echo "<style>".$scss->compile('@import "main.scss"')."</style>";

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet"> 
  <link href="https://fonts.googleapis.com/css?family=Spicy+Rice" rel="stylesheet"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<main>
  <div id="Sidebar" class="column">
    <div class="aboutSmall">
      <img src="prof.png" alt="Tu bedzie zjędzie" class="prof"/>
      <p class="name">Haqz</p>
      <p class="underName">The creator</p>
    </div>
    <ul class="list">
      <li><a href="" class="a">About</a></li>
      <li><a href="" class="a">Projects</a></li>
      <li><a href="" class="a">Blog</a></li>
    </ul>
    <p class="copyright">@Copyright 2018 by Haqz</p>
  </div>
<div class="container">
    <h2 class="indexHeader" >Recent on blog</h2>
  <div id="Posts" class="Posts">
  
    <?php
      $post->getPostsStyled(false);
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
  
  <h2 class="indexHeader">Recent projects</h2>
  <div id="Projects">
  <a href="" class="post">
                <div>
                    <p class="title">'Lorem ipsum'</p>
                    <p class="content">'.$row['message'].'</p>
                    <p class="time">'.$time.'</p>
                </div>
            </a>
            <a href="" class="post">
                <div>
                    <p class="title">'Lorem ipsum'</p>
                    <p class="content">'.$row['message'].'</p>
                    <p class="time">'.$time.'</p>
                </div>
            </a>
            <a href="" class="post">
                <div>
                    <p class="title">'Lorem ipsum'</p>
                    <p class="content">'.$row['message'].'</p>
                    <p class="time">'.$time.'</p>
                </div>
            </a>
  </div>
  </div>
    </main>
</body>
</html>
