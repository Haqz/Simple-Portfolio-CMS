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
echo "<style>".$scss->compile('@import "admin.scss"')."</style>";
if ($_POST['login']) {
    $user->Login($_POST['nick'], $_POST['pass']);
    header('Location: admin.php', true, 301);
}
function printSite($id) 
{
    global $settings;
    switch($id){
    case 1:
            echo '
            <form method="post">
        <input type="text" name="title" required>
        <input type="text" name="content" required>
        <input type="submit" name="submit">
        </form>';
        break;
    case 2:
        echo "<textarea rows='4' cols='50' name='css'>". $settings->readStyleFile() ." </textarea>";
        break;
    default:
        echo 'heji';
        break;
    }
}
    $get = $_GET['site'];
if ($get) {
    printSite($get);
}

if ($_POST['unset']) {
    unset($_SESSION['logged']);
}
$get = $_GET['site'];

if ($_POST['submit']) {
    $f1 = $_POST['title'];
    $f2 = $_POST['content'];
    $date = new DateTime();
    $f3 = $date->getTimestamp();
    $post->insertPost($f1, $f2, $f3);
    header('Location: admin.php', true, 301);
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
    </main>

    


<form method="post">
<input type="submit" name="unset">
</form>
</body>
</html>