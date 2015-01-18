<?php 

session_start();

unset($_SESSION['notification']);

if (isset($_POST['paswoord']) && isset($_POST['email'])) {
	$password = $_POST['paswoord'];
	$email = $_POST['email'];	
	
	$_SESSION['email'] = $email;
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
FROM logindb
WHERE logindb.email LIKE '$email'";

$stmt = $db->prepare($sql);

$stmt->execute();
$user = $stmt->fetchAll();




if (isset($user[0]['email'])) {


	//moest de achterste letter afsnijden omdat er altijd een c bij op kwam. ik weet niet waarom

	$comparePassword = hash('sha512', $user[0]['salt']).hash('sha512', $password);
	$comparePassword = substr($comparePassword, 0, -1);

	if ($user[0]['hashed_password'] == $comparePassword) {

		$cookietool = hash('sha512', $email).$user[0]['salt'];

		setcookie("login", $cookietool , time() + (86400 * 30) , '/');


		header('Location: ../dashboard.php');

	}
	else {

		$_SESSION['notification'] = "PW is fout";
		header('Location: ../login-form.php');

	}

}
else {

	$_SESSION['notification'] = "e-mail zit nog niet in db";
	header('Location: ../login-form.php');

}





?>