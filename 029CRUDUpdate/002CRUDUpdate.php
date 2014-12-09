<?php 

session_start();

try
{

	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', 'root');
}
catch ( PDOException $e )
{
	$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
	echo $messageContainer;
}


if (isset($_POST['editItem'])) {

	$_SESSION['editItem'] = $_POST['editItem'];

}

if (isset($_POST['submit'])){

	$editItem = $_SESSION['editItem'];
	echo $editItem;

	$brouwernaam = $_POST['brouwernaam'];
	$adres = $_POST['adres'];
	$postcode = $_POST['postcode'];
	$gemeente = $_POST['gemeente'];
	$omzet = $_POST['omzet'];

	
		try
	{
		
		$sql = "UPDATE brouwers
		SET brnaam = $brouwernaam, adres = $adres, postcode = $postcode, gemeente = $gemeente, omzet = $omzet
		WHERE brouwernr = $editItem";

		$stmt = $db->prepare($sql);

		$stmt->execute();
		$brouwers = $stmt->fetchAll();
		
		// header('Location: 001CRUDUpdate.php');

	}

	catch ( PDOException $e )
	{
		$messageContainer2	=	'Er ging iets mis: ' . $e->getMessage();
		echo $messageContainer2;
	}


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
	<h1>Brouwer Aanpassen</h1>
	<form action="002CRUDUpdate.php" method="POST">
		brouwernaam<br>
		<input type="text" name="brouwernaam"><br>
		adres<br>
		<input type="text" name="adres"><br>
		postcode<br>
		<input type="text" name="postcode"><br>
		gemeente<br>
		<input type="text" name="gemeente"><br>
		omzet<br>
		<input type="text" name="omzet"><br>
		<input type="submit" name="submit">
	</form>



	<script src="js/main.js"></script>
</body>
</html>