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
	<title>Dashboard</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="author" href="humans.txt">
</head>
<body>
	<?php if ($validUser) : ?>
	<p><a href="dashboard.php">Terug naar dashboard</a> | Ingelogd als <?php echo $email ?> | <a href="php/logout-process.php">Uitloggen</a></p>
	<h1>Dashboard</h1>
	<hr>
	<ul>
		<li>
			<a href="artikel-overzicht.php">Artikels</a>
		</li>
	</ul>
<?php endif ; ?>





<script src="js/main.js"></script>
</body>
</html>