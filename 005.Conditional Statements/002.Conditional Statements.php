<?php 
$getal = rand(1,7);

switch ($getal) {
	case '1':
		$dag = 'maandag';
		break;
	
		case '2':
		$dag = 'dinsdag';
		break;
	
		case '3':
		$dag = 'woensdag';
		break;
	
		case '4':
		$dag = 'donderdag';
		break;
	
		case '5':
		$dag = 'vrijdag';
		break;
	
		case '6':
		$dag = 'zaterdag';
		break;
	
		case '7':
		$dag = 'zondag';
		break;
	
	default:
		# code...
		break;
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
         <?= $dag?>
         <script src="js/main.js"></script>
     </body>
 </html>