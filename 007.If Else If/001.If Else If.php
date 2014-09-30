<?php 
$getal = rand(0,100);

if ($getal!=100 && $getal!=0) {
	$eersteCijfer = substr($getal, 0, 1);
	$tweedeCijfer = $eersteCijfer+1;

	$toShow = 'Het getal light tussen '.$eersteCijfer.'0'.' en '.$tweedeCijfer.'0. |'.$getal.'|';
	$toShowReverser = strrev($toShow);
}
elseif ($getal == 100) {
	$toShow = 'Het getal light tussen is 100!';
	$toShowReverser = strrev($toShow);
}
else {
	$toShow = 'Het getal light tussen is 0!';
	$toShowReverser = strrev($toShow);
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
	<?= $toShow?><br>
	<?= $toShowReverser?>
	<script src="js/main.js"></script>
</body>
</html>