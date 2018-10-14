<?php
require 'Models/Post.php';

$post = new Post;

$post->findOnePost($_GET['id']);
$post->findNextPost($_GET['id']);
$post->findPerviousPost($_GET['id']);