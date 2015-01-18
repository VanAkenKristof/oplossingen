<?php 

session_start();

include 'php/verification.php';

if (isset($_GET['key'])) {
	$key = $_GET['key'];
}

else{
	header('Location: ../dashboard.php');
}

try
{

	$db = new pdo('mysql:host=localhost;dbname=secyrityoefening', 'root', 'root');
}
catch ( PDOException $e )
{
	$_SESSION['errormessage']	=	'Er ging iets mis: ' . $e->getMessage();
}

$sql = "SELECT *
FROM artikels
WHERE id = '$key'";

$stmt = $db->prepare($sql);

$stmt->execute();
$artikel = $stmt->fetchAll();


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
	<form action="php/artikel-update-process.php?key=<?php echo $key ?>" method="POST">
		Titel<br>
		<input type="text" name="titel" value="<?php echo $artikel[0]['titel'] ?>"><br>
		Artikel<br>
		<textarea name="artikel" id="" cols="30" rows="10" ><?php echo $artikel[0]['artikel'] ?></textarea><br>
		Kernwoorden<br>
		<input type="text" name="kernwoorden" value="<?php echo $artikel[0]['kernwoorden'] ?>"><br>
		Datum<br>
		<input type="date" name="datum" value="<?php echo $artikel[0]['datum'] ?>"><br><br>
		<input type="submit" name="submit" value="Wijzigen">
	</form>

<?php endif ; ?>





<script src="js/main.js"></script>
</body>
</html>