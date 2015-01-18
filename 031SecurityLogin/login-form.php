<?php 

session_start();

$errorDiv = "";
$email = "";

if (isset($_SESSION['notification'])) {
	$errorDiv = '<p id="error">'.$_SESSION['notification'].'</p>';
}

if (isset($_SESSION['email'])) {
	$email = 'value="'.$_SESSION['email'].'"';
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
	<style>

		#error {
			color: red;
		}

	</style>
</head>
<body>

	<h1>Log In</h1>

	<?php echo $errorDiv ?>
	
	<form action="php/login-process.php" method="POST">

		<p>e-mail</p>
		<input type="text" name="email" <?php echo $email ?>>
		<p>paswoord</p>
		<input type="text" name="paswoord">
		<input type="submit" value="Login" name="login">

	</form>
	<p>Nog geen login? <a href="registratie-form.php">Registreer</a></p>
	<script src="js/main.js"></script>
</body>
</html>