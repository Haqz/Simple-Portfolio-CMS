<?php
require './bbcode.php';
require 'Configs/Globals.php';
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
  <!-- BOOTSTRAP FILES -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="#">
    <img src="prof.png" alt="Logo haqz">Haqz
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse nav-list-left text-left" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Projects</a>
      </li>
    </ul>
  </div>
</nav>
<header>
  <div class="text">
    <h1>Simple Portfolio CMS</h1>
    <p>As simple as possible</p>
  </div>
</header>
<main>

  <!-- ABOUT SECTION -->

  <section class="about">
    <div class="about-content">
      <h1>About</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum repudiandae culpa ipsam optio vel nostrum,
      quos facere cumque blanditiis sed sequi accusamus, soluta corporis vitae provident! 
      Voluptatibus repellat porro quaerat, eum optio dignissimos deleniti consequuntur velit architecto harum. 
      Veniam possimus quos fugit ducimus, eos ab impedit fugiat in debitis error.</p>
    </div>
  </section>

  <!-- BLOG SECTION -->

  <section class="blog">
    <h1>Recent blog entries</h1>
    <div class="container">
      <div class="row">
        <?php
        $postsData = $post->getLatestPostsData();
        foreach ($postsData as $row) {
            echo 
            "
            <div class='col-md-6 col-lg-4'>
            <a href='article?id=".$row['id']."'>
              <div class='first blog-div'>
                <img src='asets/images/blog1.jpg' alt=''>
                <h1>".htmlspecialchars($row['title'])."</h1>
                <p>Lorem Ipsum</p>
                <div class='overlay'>
                  <p>".$row['message']."</p>
                  <button>Check it!</button>
                </div>
              </div>
            </a>
        </div>";
        }
        ?>
        <div class='col-md-6 col-lg-4'>
            <a href="#">
              <div class='first blog-div'>
                <img src='asets/images/blog1.jpg' alt=''>
                <h1>Tu testuj Raloseq(animacja do)</h1>
                <p>Lorem ipsum</p>
                <div class="overlay">
                  <p>Początki programowania w php</p>
                  <button>Check it!</button>
                </div>
              </div>
            </a>
        </div>
      </div>
    </div>
  </section>

  <!-- PROJECTS SECTION -->

  <section class="projects">
    <h1>My projects</h1>
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-6 col-lg-4">
          <h1>Pierwszy wpis</h1>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
          <h1>Drugi wpis</h1>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
          <h1>Trzeci wpis</h1>
        </div>
      </div>
    </div>
  </section>
  <!-- <div id="Sidebar" class="column">
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
  </div> -->
<!-- <div class="container">
  <h2 class="indexHeader" >Recent on blog</h2>
  <div id="Posts" class="Posts">
   -->
    

  <!-- </div> -->
  
  <!-- <h2 class="indexHeader">Recent projects</h2> -->
  <!-- <div id="Projects">
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
  </div> -->
  </main>

      <!-- FOOTER -->

  <footer>
    <h1>Contact me with:<a href=""><i class="fab fa-github"></i></a><i class="fas fa-at"></i></h1>
  </footer>
  <!-- BOOTSTRAP FILES -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
