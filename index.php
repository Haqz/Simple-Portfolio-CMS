<?php
require './bbcode.php';

require 'Classes/Autoloader.php';
try{
    $db = new Database();
    $post = new Post($db);
    $user = new User($db);
    $settings = new Settings($db);
    $scss = new scssc;
}catch(Exception $e){
    echo $e->getMessage();
}



$scss->setImportPaths("scss/");
$scss->setVariables(
    array(
      'background' => $settings->getStyleClass("background"))
);
echo "<style>".$scss->compile('@import "main.sass"')."</style>";

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
      $postsData = $post->getLatestPostsData();
    foreach ($postsData as $row) {
        echo 
        "<a href=article?id=".$row['id']." class='post'>".
          "<div>"
            ."<p class='title'>".htmlspecialchars($row['title'])."</p>"
            ."<p class ='content'>".$row['message']."</p>"
          ."</div>"
        ."</a>";
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
