<?php 
$i = 0;
$j = 0;

while ($i != 100) {
	
echo($i.' ');
$i++;
}

echo("\n<br />");

while ($j != 100) {
	if ($j%3 == 0 && $j > 40 && $j < 80) {
		echo($j.' ');
	}


$j++;
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
         
         <script src="js/main.js"></script>
     </body>
 </html>