<?php 

if ( isset ( $_GET['key'] ) )
{
	$key = $_GET['key'];
}

if ( isset ( $_GET['activate'] ) )
{
	$activate = $_GET['activate'];
}


try
{

	$db = new pdo('mysql:host=localhost;dbname=secyrityoefening', 'root', 'root');
}
catch ( PDOException $e )
{
	$_SESSION['errormessage']	=	'Er ging iets mis: ' . $e->getMessage();
}


try
{

	$sql = "UPDATE artikels
	SET is_active = $activate
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