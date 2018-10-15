<?php
require "scssphp/scss.inc.php";

$scss = new scssc();
$scss->setImportPaths("scss/");
echo "<style>".$scss->compile('@import "admin.scss"')."</style>";
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
    <div class="container">
        <div class="loginBox">
            <span style="font-size: 36px;">Login :D</span>
            <form method="post">
                <div>
                <input type="text" name="nick" placeholder="Username" required>
                </div>
                <div>
                <input type="text" name="pass" placeholder="Password" required>
                </div>
                <div>
                <input type="submit" name="login">
                </div>
            </form>
        </div>
    </div>
</body>
</html>