<?php 
$jaar = 1983;

if ($jaar%4 == 0){
	$schrikkel = 'een schrikkeljaar';
}
else {
	$schrikkel = 'geen schrikkeljaar';
}

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
        <?= $jaar.' is '.$schrikkel?>
        <script src="js/main.js"></script>
    </body>
</html>