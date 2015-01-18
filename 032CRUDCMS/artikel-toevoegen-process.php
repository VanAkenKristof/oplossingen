<?php 

session_start();

if (isset($_POST['titel'])){
	$titel = $_POST['titel'];
}

if (isset($_POST['artikel'])){
	$artikel = $_POST['artikel'];
}

if (isset($_POST['kernwoorden'])){
	$kernwoorden = $_POST['kernwoorden'];
}

if (isset($_POST['datum'])){
	$datum = $_POST['datum'];
}






	echo $titel;
	echo "<br>";
	echo $artikel;
	echo "<br>";
	echo $kernwoorden;
	echo "<br>";
	echo $datum;
	echo "<br>";




try
{

	$db = new pdo('mysql:host=localhost;dbname=secyrityoefening', 'root', 'root');
}
catch ( PDOException $e )
{
	$_SESSION['errormessage']	=	'Er ging iets mis: ' . $e->getMessage();
}

// Invoer

	try {
		$db -> beginTransaction();

		$sql = "INSERT INTO `artikels`(`titel`, `artikel`, `kernwoorden`, `datum`)"
		."VALUES (:titel, :artikel, :kernwoorden, :datum )";

		$stmt = $db->prepare($sql);
		$stmt -> bindParam(':titel', $titel, PDO::PARAM_STR);
		$stmt -> bindParam(':artikel', $artikel, PDO::PARAM_STR);		
		$stmt -> bindParam(':kernwoorden', $kernwoorden, PDO::PARAM_INT);
		$stmt -> bindParam(':datum', $datum, PDO::PARAM_STR);
		$stmt -> execute();

		$db -> commit();

		$stmt = $db->query("SELECT LAST_INSERT_ID()");
		$varLastId = $stmt -> fetch(PDO::FETCH_NUM);
		$varLastId = $varLastId[0];

		$_SESSION['statusmessage'] = $titel." succesvol toegevoegd.";

		header("Location: artikel-overzicht.php");
		
	} catch (PDOExeption $e) {
		$db -> rollBack();
		echo "fail";
	}




?>