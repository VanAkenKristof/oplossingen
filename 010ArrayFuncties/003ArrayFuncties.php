<?php
$cijferLijst = array(8, 7, 8, 7, 3, 2, 1, 2, 4);
$cijferLijst = array_unique($cijferLijst);
rsort($cijferLijst);


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
        <?= var_dump($cijferLijst)?>
        <script src="js/main.js"></script>
    </body>
</html>