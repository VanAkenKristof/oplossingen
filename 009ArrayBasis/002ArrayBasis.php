<?php 
for ($i=1; $i < 6; $i++) { 
	$getal[$i-1] = $i;
}

$getal2 = array('5', '4', '3','2','1');

$totaalGetal[0] = $getal[0] * $getal[1];
$totaalGetal[1] = $getal[0] * $getal[2];
$totaalGetal[2] = $getal[0] * $getal[3];
$totaalGetal[3] = $getal[0] * $getal[4];
$totaalGetal[4] = $getal[1] * $getal[2];
$totaalGetal[5] = $getal[1] * $getal[3];
$totaalGetal[6] = $getal[1] * $getal[4];
$totaalGetal[7] = $getal[2] * $getal[3];
$totaalGetal[8] = $getal[2] * $getal[4];
$totaalGetal[9] = $getal[3] * $getal[4];

$afTeDrukken = '';

for ($i=0; $i < count($totaalGetal); $i++) { 
	if ($totaalGetal[$i]%2 == 0) {
		$afTeDrukken .= ' '.$totaalGetal[$i];
	}
}

for ($i=0; $i < count($getal); $i++) { 
	$totaalGetal2[$i] = $getal[$i] + $getal2[$i];
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
         <?= $afTeDrukken?><br>
         <?= var_dump($totaalGetal2)?>
         <script src="js/main.js"></script>
     </body>
 </html>