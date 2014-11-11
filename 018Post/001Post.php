<?php 
	$message = "Geef gebruikersnaam en paswoord in aub";
	$username = "kristof";
	$password = "abc123";

	if ( isset ( $_POST[ 'submit' ] ) ) {
		if ($_POST['username'] == $username && $_POST['password'] == $password){
			$message = "Welkom ".$username;
		}
		else {
			$message = "Incorrecte gebruikersnaam of paswoord";
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
	<h1>Inloggen</h1>

    	<form action="001post.php" method="POST">
		<ul>
			<li>
				<label for="username">Username:</label>
				<input type="text" name="username" id="username">
			</li>
			<li>
				<label for="password">Paswoord:</label>
				<input type="password" name="password" id="password">
			</li>
			<p><?php echo $message?></p>
		</ul>
		<input type="submit" name="submit" value="Send">

	</form>
        
        <script src="js/main.js"></script>
    </body>
</html>