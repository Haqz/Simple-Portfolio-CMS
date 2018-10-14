<?php
require 'Models/Post.php';

$post = new Post;

$post->findOnePost($_GET['id']);