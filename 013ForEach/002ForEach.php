<?php 
$text = file_get_contents("text-file.txt");

$text = file_get_contents("text-file.txt");
$text = strtolower($text);
$hoeveelChars = count_chars($text, 3);

$hoeveelChars = substr($hoeveelChars, 18);
$hoeveelCharsArray = str_split($hoeveelChars);

for ($i=0; $i < strlen($hoeveelChars); $i++) { 
	echo($hoeveelCharsArray[$i]. " = ". substr_count($text, $hoeveelCharsArray[$i])."\n<br>");
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