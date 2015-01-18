<?php 
/*$dieren[0] = 'varken';
$dieren[1] = 'vos';
$dieren[2] = 'arend';
$dieren[3] = 'slang';
$dieren[4] = 'hond';
$dieren[5] = 'kat';
$dieren[6] = 'paard';
$dieren[7] = 'ezel';
$dieren[8] = 'vlieg';
$dieren[9] = 'vis';*/

$dieren = array('varken','vos','arend','slang','hond','kat','paard','ezel','vlieg','vis');

$voertuigen['landvoertuig'] = array('auto','brommer','quad');
$voertuigen['watervoertuigen'] = array('boot','jetski');
$voertuigen['luchtvoertuigen'] = array('vliegtuig', 'helicopter', 'luchtballon', 'gryphon');



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
         <?= var_dump($dieren)?><br>
         <?= var_dump($voertuigen) ?>
         <script src="js/main.js"></script>
     </body>
 </html>