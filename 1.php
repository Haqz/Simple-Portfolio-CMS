<?php
require "scssphp/scss.inc.php";
require "Models/Settings.php";
$scss = new scssc();
$sett = new Settings;


echo "<style>".$scss->compile($sett->getStyleFile())."</style>";
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
    <div class="underName">
asdasd
    </div>
</body>
</html>