<?php 

session_start();

include 'php/verification.php';


?>


<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Artikel Toevoegen</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="author" href="humans.txt">
</head>
<body>
	<?php if ($validUser) : ?>
	<p><a href="dashboard.php">Terug naar dashboard</a> | Ingelogd als <?php echo $email ?> | <a href="php/logout-process.php">Uitloggen</a></p>
	<p><a href="artikel-overzicht.php">Terug naar overzicht</a></p>
	<h1>Artikel Toevoegen</h1>
	<hr>
	<form action="artikel-toevoegen-process.php" method="POST">
		Titel<br>
		<input type="text" name="titel"><br>
		Artikel<br>
		<textarea name="artikel" id="" cols="30" rows="10"></textarea><br>
		Kernwoorden<br>
		<input type="text" name="kernwoorden"><br>
		Datum<br>
		<input type="date" name="datum"><br><br>
		<input type="submit" name="submit" value="Toevoegen">
	</form>
	

<?php endif ; ?>





<script src="js/main.js"></script>
</body>
</html>