<?php
require "scssphp/scss.inc.php";
require 'Models/User.php';

$scss = new scssc();
$user = new User;

$scss->setImportPaths("scss/");
echo "<style>".$scss->compile('@import "admin.scss"')."</style>";
if($_POST['login']){
    $user->Login($_POST['nick'], $_POST['pass']);
    header('Location: admin.php', true, 301);
    
}
if($_POST['unset']){
    unset($_SESSION['logged']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<?php

    if(!$_SESSION['logged']){
        echo '
        <main id="Login">
        <div class="container">
            <div class="loginBox">
                <span style="font-size: 36px;">Login :D</span>
                <form method="post">
                    <div>
                        <input type="text" name="nick" placeholder="Username" required>
                    </div>
                    <div>
                        <input type="password" name="pass" placeholder="Password" required>
                    </div>
                    <div>
                        <input type="submit" name="login">
                    </div>
                </form>
            </div>
        </div>
        </main>';
    }else{
        echo 'elo';
    }
?>
<form method="post">
<input type="submit" name="unset">
</form>
</body>
</html>