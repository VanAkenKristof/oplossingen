<?php 

session_start();


try
{

	$db = new pdo('mysql:host=localhost;dbname=secyrityoefening', 'root', 'root');
}
catch ( PDOException $e )
{
	$_SESSION['errormessage']	=	'Er ging iets mis: ' . $e->getMessage();
}



if (isset($_POST['email'])) {
	$_SESSION['email'] = $_POST['email'];
	$email = $_SESSION['email'];
}

if (isset($_POST['paswoord'])) {
	$_SESSION['passwoord'] = $_POST['paswoord'];
	$password = $_SESSION['passwoord'];

}

if (isset($_POST['generatePassword'])){
	$_SESSION['passwoord'] = generatePassword(12);
	unset($_SESSION['errormessage']);
	header('Location: ../registratie-form.php');
	exit();
}






if (isset($_POST['register'])) { 
	if (filter_var($email, FILTER_VALIDATE_EMAIL)){
		if (strlen($_POST['paswoord']) > 3 ) {

			$sql = "SELECT email
			FROM logindb
			WHERE logindb.email LIKE '$email'";

			$stmt = $db->prepare($sql);

			$stmt->execute();
			$emailconflict = $stmt->fetchAll();




			if (!isset($emailconflict[0][0])) {

				unset($_SESSION['errormessage']);



			//database insertion start

				$salt = uniqid(mt_rand(), true);
				$hashedSalt = hash('sha512', $salt);
				$hashedPassword = $hashedSalt.hash('sha512', $password);
				$lastLoginTime = date("Y-m-d H:i:s");


				try {

					$db -> beginTransaction();

					$sql = "INSERT INTO `logindb`(`email`, `salt`, `hashed_password`, `last_login_time`)"
					."VALUES (:email, :salt, :hashed_password, :last_login_time)";

					$stmt = $db->prepare($sql);
					$stmt -> bindParam(':email', $email, PDO::PARAM_STR);
					$stmt -> bindParam(':salt', $salt, PDO::PARAM_STR);		
					$stmt -> bindParam(':hashed_password', $hashedPassword, PDO::PARAM_STR);
					$stmt -> bindParam(':last_login_time', $lastLoginTime, PDO::PARAM_STR);
					$stmt -> execute();

					$db -> commit();

					$_SESSION['notification'] = "Account successvol aangemaakt";

					header('Location: ../login-form.php');

				} catch (PDOExeption $e) {

					$db -> rollBack();
					echo "fail";

				}
			}

			else{
				$_SESSION['errormessage'] = "Een account met deze e-mail bestaat al";
				header('Location: ../registratie-form.php');
			}


		}
		else {
			$_SESSION['errormessage'] = "Geef een geldig paswoord adres a.u.b.";
			header('Location: ../registratie-form.php');
		}
	}


	else{
		$_SESSION['errormessage'] = "Geef een geldig e-mail adres a.u.b.";
		header('Location: ../registratie-form.php');
	}
}


function generatePassword( $length = 8 ) {

	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$password = substr( str_shuffle( $chars ), 0, $length );

	return $password;

}



?>

