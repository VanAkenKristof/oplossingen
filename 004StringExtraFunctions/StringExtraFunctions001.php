<?php 
$fruit = 'kokosnoot';
$fruitLen = strlen($fruit);
$fruitPosOfO = strpos($fruit, 'o');


 ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
        <?= $fruitLen?>
        <?= $fruitPosOfO?>
        <script src="js/main.js"></script>
    </body>
</html>