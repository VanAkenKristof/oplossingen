<?php 

$email = $_SESSION['email'];
$validUser = false;

try
{

	$db = new pdo('mysql:host=localhost;dbname=secyrityoefening', 'root', 'root');
}
catch ( PDOException $e )
{
	$_SESSION['errormessage']	=	'Er ging iets mis: ' . $e->getMessage();
}


$sql = "SELECT *
FROM logindb
WHERE logindb.email LIKE '$email'";

$stmt = $db->prepare($sql);

$stmt->execute();
$user = $stmt->fetchAll();




if (!isset($_COOKIE['login'])) {
	header('Location: login-form.php');
}

else {

	$salt = $user[0]['salt'];
	$hashedemail = hash('sha512', $email);


	if ($_COOKIE['login'] = $hashedemail.$salt) {

		$validUser = true;

	}
	else {

		unset($_COOKIE['login']);
		header('Location: login-form.php');

	}

}

?>