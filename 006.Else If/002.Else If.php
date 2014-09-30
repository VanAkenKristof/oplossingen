<?php
$seconden = 70000000000;
$minuten = $seconden / 60;
$uren = $minuten / 60;
$dagen = $uren / 24;
$weken = $dagen / 7;
$maanden = $dagen / 31;
$jaren = $dagen / 365;

$totaal = "In ".$seconden." seconden<br>".
"Minuten: ".round($minuten)."<br>".
"Uren: ".round($uren)."<br>".
"Dagen: ".round($dagen)."<br>".
"Weken: ".round($weken)."<br>".
"Maanden: ".round($maanden)."<br>".
"Jaren: ".round($jaren);
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
         <?= $totaal?>
         <script src="js/main.js"></script>
     </body>
 </html>