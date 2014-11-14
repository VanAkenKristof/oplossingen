<?php 

session_start();
if(!isset($_SESSION['email'])){
  $_SESSION['email'] = $_POST['email'];
}
if(!isset($_SESSION['nickname'])){
  $_SESSION['nickname'] = $_POST['nickname'];
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

  <h1>Registratiegegevens</h1>
  <hr>
  <ul>
    <li>e-mail: <?php echo $_SESSION['email']?></li>
    <li>Nickname: <?php echo $_SESSION['nickname']?></li>
  </ul>

  <h1>Deel 2: adres</h1>
  <hr>
  <form action="003Sessions.php" method="POST">
    <p>Straat</p>
    <input type="text" name="straat" id="straat" <?php if(isset($_SESSION['straat'])) : ?>value=<?php echo $_SESSION['straat']?><?php endif; ?>>

    
    <p>Nummer</p>
    <input type="text" name="nummer" id="nummer" <?php if(isset($_SESSION['nummer'])) : ?>value=<?php echo $_SESSION['nummer']?><?php endif; ?>>
    <p>Gemeente</p>
    <input type="text" name="gemeente" id="gemeente" <?php if(isset($_SESSION['gemeente'])) : ?>value=<?php echo $_SESSION['gemeente']?><?php endif; ?>>
    <p>Postcode</p>
    <input type="text" name="postcode" id="postcode" <?php if(isset($_SESSION['postcode'])) : ?>value=<?php echo $_SESSION['postcode']?><?php endif; ?>>
    <br><br>
    <input type="submit" name="submit" value="Send">
  </form>


</div>
<script src="js/main.js"></script>
</body>
</html>