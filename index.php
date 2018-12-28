<?php
require './bbcode.php';
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
  <?php 
    $scss->setImportPaths("scss/");
    echo "<style>".$scss->compile('@import "main.scss"')."</style>";
  ?>
  
</head>
<body>
<nav class="navigation navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <a class="navbar-brand">
    <img src="prof.png" alt="Logo haqz"><span id="nav-span">Haqz</span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="menu-btn navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse nav-list-left text-left" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#about-sec">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#blog-sec">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#projects-sec">Projects</a>
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

  <section class="about" id="about-sec">
    <div class="about-content">
      <h1>About</h1>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum repudiandae culpa ipsam optio vel nostrum,
      quos facere cumque blanditiis sed sequi accusamus, soluta corporis vitae provident! 
      Voluptatibus repellat porro quaerat, eum optio dignissimos deleniti consequuntur velit architecto harum. 
      Veniam possimus quos fugit ducimus, eos ab impedit fugiat in debitis error.</p>
    </div>
  </section>

  <!-- BLOG SECTION -->

  <section class="blog" id="blog-sec">
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
                <div class="overlay">
                  <p>Początki programowania w php</p>
                  <!-- <button>Check it!</button> -->
                </div>
              </div>
            </a>
        </div>
      </div>
    </div>
  </section>

  <!-- PROJECTS SECTION -->

  <section class="projects" id="projects-sec">
    <h1>My projects</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class='first project-div'>
                <div class="description">
                  <h1>Pierwszy projekt</h1>
                  <a href="">
                    <button>Check it!</button>
                  </a>
                </div>
              </div>
        </div>
        <div class="col-md-6 col-lg-4">
        <div class='first project-div'>
                <div class="description">
                  <h1>Pierwszy projekt</h1>
                  <a href="">
                    <button>Check it!</button>
                  </a>
                </div>
              </div>
        </div>
        <div class="col-md-6 col-lg-4">
        <div class='first project-div'>
                <div class="description">
                  <h1>Pierwszy projekt</h1>
                  <a href="">
                    <button>Check it!</button>
                  </a>
                </div>
              </div>
        </div>
      </div>
    </div>
    <h1>Check more on github<a href="https://github.com/Haqz" target="blank"><i class="fab fa-github"></i></a></h1>
  </section>
  </main>
        
      <!-- FOOTER -->

  <footer>
    <div class="footer-content">
      <h1>Contact me with:</h1>
        <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Title</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="exampleTextarea">Message</label>
    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </footer>
  <!-- BOOTSTRAP FILES -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- MY SCRIPTS -->
  <script src="menuscroll.js"></script>
</body>
</html>
