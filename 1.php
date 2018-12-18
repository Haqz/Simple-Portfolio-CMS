<?php

require 'Classes/Autoloader.php';
try{
    $db = new Database();
    $post = new Post($db);
    $user = new User($db);
    $settings = new Settings($db);
    $scss = new scssc;
}catch(Exception $e){
    echo $e->getMessage();
}

if ($_POST['sumbit']) {
    try{
        $settings->writeStyleFile($_POST['css']);
        header('Location: 1.php');
    } catch(Exception $ex){
        echo $ex-getMessage();
    }
}


//test packet
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
    <form method="post">
    <textarea rows="4" cols="50" name="css"><?php echo $settings->readStyleFile();?> </textarea>
    
    <input type="submit" name="sumbit">
    </form>
</body>
</html>