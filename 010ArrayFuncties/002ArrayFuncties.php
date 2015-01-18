<?php 
$dieren = array('paard','geit','ezel','vogel','luiaard','neushoorn','vis');
$hoeveelDieren = count($dieren);

$teZoekenDier = 'hangbuikzwijn';

if (in_array($teZoekenDier, $dieren)) {
	$afDruk = $teZoekenDier.' is aanwezig in de array';
}
else{
	$afDruk = $teZoekenDier.' is NIET aanwezig in de array';
}

asort($dieren);
$zoogdieren = array('kat','hond','dolfijn');
$dierenLijst = array_merge($dieren, $zoogdieren);

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
         <p>Er zitten <?= $hoeveelDieren ?> dieren in de array</p>
         <p><?= $afDruk?>
         <script src="js/main.js"></script>
     </body>
 </html>