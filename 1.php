<?php

require 'vendor/autoload.php';
require 'src/Autoloader.php';
try {
      $db = new SPC\Database();
      $settings = new SPC\Settings($db);
      $post = new SPC\Post($db);
      $user = new SPC\User($db);
      $scss = new scssc;
} catch (Exception $e) {
      echo $e->getMessage();
}

//$user->Register("admin", "admin@admin.pl", "admin123");