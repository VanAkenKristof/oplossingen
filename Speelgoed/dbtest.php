<?php 

try
{

	$db = new pdo('mysql:host=localhost;dbname=secyrityoefening', 'root', 'root');
}
catch ( PDOException $e )
{
	$_SESSION['errormessage']	=	'Er ging iets mis: ' . $e->getMessage();
}

$email = 'vanakenk@gmail.com';

$sql = "SELECT email
FROM logindb
WHERE logindb.email LIKE '$email'";

$stmt = $db->prepare($sql);

$stmt->execute();
$emailconflict = $stmt->fetchAll();


if (isset($emailconflict[0][0])) {
	echo "bestaat al";
}
else {

	echo "bestaat NIET";
}



?>