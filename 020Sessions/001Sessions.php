<?php 

session_start();

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    unset($_SESSION['email']);
}
if(isset($_SESSION['nickname'])){
    $nickname = $_SESSION['nickname'];
    unset($_SESSION['nickname']);
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

    <h1>Deel 1: Registratiegegevens</h1>

    <form action="002Sessions.php" method="POST">
        <ul>
            <li>
                <label for="email">E-Mail:</label>
                <input type="text" name="email" id="email" <?php if(isset($email)) : ?>value=<?php echo $email?><?php endif; ?>>
            </li>
            <li>
                <label for="nickname">Nickname:</label>
                <input type="text" name="nickname" id="nickname" <?php if(isset($nickname)) : ?>value=<?php echo $nickname?><?php endif; ?>>
            </li>
        </ul>
        <input type="submit" name="submit" value="Send">
    </form>
</div>
<script src="js/main.js"></script>
</body>
</html>