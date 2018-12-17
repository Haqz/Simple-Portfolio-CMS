<?php

require 'Classes/Autoloader.php';
require 'Configs/Globals.php';
try{
    $db = new Database();
    $post = new Post($db);
    $user = new User($db);
    $settings = new Settings($db);
    $scss = new scssc;
}catch(Exception $e){
    echo $e->getMessage();
}

echo $GLOBALS['assets'];
