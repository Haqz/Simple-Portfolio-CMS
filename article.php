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
echo "<style>".$scss->compile('@import "article.scss"')."</style>";


//print_r($post->findPostData($_GET['id']));
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
    <img src="asets/images/prof.png" alt="Logo haqz"><span id="nav-span">Haqz</span>
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
    <section class="blog-section">
      <div class="blog-post">
        <h1>Początki programowania z php</h1>
        <p>Data 2019-01-02</p>
        <div class="blog-image">
          
        </div>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae a iste tenetur iusto officiis debitis accusantium dicta magni labore dolorum accusamus sunt laudantium alias expedita molestias consequatur, ipsam adipisci ab unde? Quidem doloremque non minus obcaecati placeat, deleniti libero! Sit commodi, possimus quisquam vel obcaecati beatae hic quia rerum nemo asperiores quod ea, amet soluta deserunt consequatur maiores dolores veniam nihil, ab totam. Rem officiis vel distinctio doloremque a debitis dicta inventore porro repellendus ipsum blanditiis consectetur, amet voluptatem similique exercitationem quisquam! Modi earum hic, velit optio veniam consequuntur, enim eaque maiores eius ullam, eligendi blanditiis explicabo nostrum sint laboriosam!</p>
      </div>
      <div class="latest-post-section">
        <div class="latest-post">
          <h1>Latest Posts</h1>
          <ul>
            <li><a href="#" target="_blank">Poczatki PHP</a></li>
            <li><a href="#" target="_blank">Poczatki PHP</a></li>
            <li><a href="#" target="_blank">Poczatki PHP</a></li>
            <li><a href="#" target="_blank">Poczatki PHP</a></li>
            <li><a href="#" target="_blank">Poczatki PHP</a></li>
          </ul>
        </div>
        <div class="tags-post">
          <h1>Tags</h1>
          <p>#php, #php, #php, #php, #php, #php, #php,</p>
        </div>
      </div>
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
