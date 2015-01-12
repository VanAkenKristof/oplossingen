<?php 

session_start();

include 'php/verification.php';

try
{

	$db = new pdo('mysql:host=localhost;dbname=secyrityoefening', 'root', 'root');
}
catch ( PDOException $e )
{
	$_SESSION['errormessage']	=	'Er ging iets mis: ' . $e->getMessage();
}


$sql = "SELECT *
FROM artikels";

$stmt = $db->prepare($sql);

$stmt->execute();
$artikels = $stmt->fetchAll();

?>


<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Overzicht van de artikels</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="author" href="humans.txt">
	<style>
		#artikel {
			width: 500px;
			background-color: gray;
			border-radius: 15px;
			padding: 20px;
			margin-bottom: 10px;
		}


	</style>
</head>
<body>

	<?php if (isset($_SESSION['statusmessage'])) : ?>
	<p><?php echo $_SESSION['statusmessage'] ?></p>
	<?php unset($_SESSION['statusmessage']) ?>
	<?php endif ; ?>



	<?php if ($validUser) : ?>
	<p><a href="dashboard.php">Terug naar dashboard</a> | Ingelogd als <?php echo $email ?> | <a href="php/logout-process.php">Uitloggen</a></p>
	<h1>Overzicht van de artikels</h1>
	<hr>
	<ul>
		<li>
			<a href="artikel-toevoegen-form.php">Voeg een artikel toe</a>
		</li>
	</ul>



<?php endif ; ?>


<?php 
	foreach ($artikels as $key) {
		echo '<div id="artikel">'.
		'<h2>'.$key['titel'].'</h2><ul><hr>'.
		'<p>'.$key['artikel'].'</p>
		<p>Kernwoorden: '.$key['kernwoorden'].'</p>
		<p>Datum: '.$key['datum'].'</p>'.'<a href="artikel-wijzigen-form.php?key='.$key['id'].'">Artikel Wijzigen</a> | '.
		($key['is_active'] == '0' ? '<a href="php/manage-activation.php?key='.$key['id'].'&activate=1">Activeer Artikel</a>' : '<a href="php/manage-activation.php?key='.$key['id'].'&activate=0">Deactiveer Artikel</a>').' | <a href="php/artikel-verwijderen.php?key='.$key['id'].'">Artikel verwijderen</a>'
		.'</div>';
	}

 ?>


<script src="js/main.js"></script>
</body>
</html>