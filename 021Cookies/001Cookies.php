<?php 

$gebruiker = explode( ',', file_get_contents( 'koekje.txt' ));
$bericht = "Geef gebruikersnaam en paswoord aub";
$loggedin = false;

if ( isset( $_GET[ 'logout' ] ) ){
  setcookie('authentication', $gebruiker[0], time() - 400);
  $loggedin = false;
}

if ( !isset( $_COOKIE['authentication'] )){
  if ( isset( $_POST[ 'submit' ] ) )
  {
    if ($_POST['gebruikersnaam'] == $gebruiker[0] && $_POST['paswoord'] == $gebruiker[1]){
      $bericht = "U bent ingelogd.";
      setcookie('authentication', $gebruiker[0], time() + 360);
      $loggedin = true;

    }
    else {
      $bericht = "Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.";
    }
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
 <div id="container">
  <?php if ($loggedin): ?><br>
  <?php echo $bericht?>
  <a href="001cookies.php?logout=true">Uitloggen</a>

<?php else :?>
  <h1>Inloggen</h1>

  <form action="001cookies.php" method="POST">
    <?php echo $bericht?>
    <ul>
      <li>
        <label for="gebruikersnaam">gebruikersnaam:</label>
        <input type="text" name="gebruikersnaam" id="gebruikersnaam">
      </li>
      <li>
        <label for="paswoord">paswoord:</label>
        <input type="password" name="paswoord" id="paswoord">
      </li>
    </ul>
    <input type="submit" name="submit" value="Send">
  </form>
<?php endif ?>
</div>
<script src="js/main.js"></script>
</body>
</html>