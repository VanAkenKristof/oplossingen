<?php 
    
    session_start();

    $randomPassword = 'value = ""';
    $email = 'value = ""';
    $errorDiv = "";

    if (isset($_SESSION['errormessage'])) {
        $errorDiv = '<div id="error">'.$_SESSION['errormessage'].'</div>';
    }

    if (isset($_SESSION['passwoord'])) {
        $randomPassword = 'value = "'.$_SESSION['passwoord'].'"';
    }

    if (isset($_SESSION['email'])) {
        $email = 'value = "'.$_SESSION['email'].'"';
    }

 ?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
        <style>
            #error {
                color: red;
            }

        </style>
    </head>
    <body>
        <h1>Registreren</h1>
        <?php echo $errorDiv ?>
		<form action="php/registratie-process.php" method="POST">
			<p>e-mail</p>
			<input type="text" name="email" <?php echo $email ?>>
			<p>paswoord</p>
			<input type="text" name="paswoord" <?php echo $randomPassword ?>>
			<input type="submit" value="Genenereer een paswoord" name="generatePassword"><br>
			<input type="submit" value="Registreer" name="register">

		</form>


        <script src="js/main.js"></script>
    </body>
</html>