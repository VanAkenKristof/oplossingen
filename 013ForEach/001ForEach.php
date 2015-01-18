<?php 
$text = file_get_contents("text-file.txt");
$textchars = str_split($text);
arsort($textchars);
$textchars = array_reverse($textchars);

$hoeveelChars = count_chars($text, 3);
$hoeveelCharsArray = str_split($hoeveelChars);

for ($i=0; $i < strlen($hoeveelChars); $i++) { 
	echo("Character ". $hoeveelCharsArray[$i]. " komt ". substr_count($text, $hoeveelCharsArray[$i]). " keer voor \n<br>");
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