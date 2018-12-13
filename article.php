<?php
require 'Models/Post.php';
require "scssphp/scss.inc.php";
require 'Models/Settings.php';

$scss = new scssc();
$settings = new Settings;

$scss->setImportPaths("scss/");
$scss->setVariables(array(
'background' => $settings->getStyleClass("background")
));
echo "<style>".$scss->compile('@import "article.scss"')."</style>";

$post = new Post;

$post->findOnePost($_GET['id']);