<?php 

session_start();

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
	<h1>Dashboard</h1>
	<a href="php/logout-process.php">Uitloggen</a>
<?php endif ; ?>





<script src="js/main.js"></script>
</body>
</html>