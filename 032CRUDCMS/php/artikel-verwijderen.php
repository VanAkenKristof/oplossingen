<?php 

if ( isset ( $_GET['key'] ) )
{
	$key = $_GET['key'];
}

try
{

	$db = new pdo('mysql:host=localhost;dbname=secyrityoefening', 'root', 'root');
}
catch ( PDOException $e )
{
	$_SESSION['errormessage']	=	'Er ging iets mis: ' . $e->getMessage();
}

echo $key;

try
{

	$sql = "DELETE FROM artikels
	WHERE id = $key";

	$stmt = $db->prepare($sql);

	$stmt->execute();
	$artikel = $stmt->fetchAll();

	header("Location: ../artikel-overzicht.php");

}

catch ( PDOException $e )
{
	$messageContainer2	=	'Er ging iets mis: ' . $e->getMessage();
	echo $messageContainer2;
}








 ?>