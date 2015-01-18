<?php 

function __autoload($class_name) {
	require_once 'classes/'. $class_name . '.php';
}

$percentCalculator = new Percent(150,100);

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

	<style>
	table {border: 1px solid black;}


	</style>
</head>
<body>
	<p>Hoeveel percent is <?php echo $percentCalculator->new1?> van <?php echo $percentCalculator->unit1?></p>

	<table>
		<tr>
			<td>Absoluut</td>
			<td><?php echo $percentCalculator->absolute?></td>
		</tr>
		<tr>
			<td>Relatief</td>
			<td><?php echo $percentCalculator->relative?></td>
		</tr>
		<tr>
			<td>Geheel getal</td>
			<td><?php echo $percentCalculator->hundred?></td>
		</tr>		<tr>
		<td>Nominaal</td>
		<td><?php echo $percentCalculator->nominal?></td>
	</tr>
</table>

<script src="js/main.js"></script>
</body>
</html>