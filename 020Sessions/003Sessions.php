<?php 
session_start();

$_SESSION['straat'] = $_POST['straat'];
$_SESSION['nummer'] = $_POST['nummer'];
$_SESSION['gemeente'] = $_POST['gemeente'];
$_SESSION['postcode'] = $_POST['postcode'];



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
	<ul>
		<li>
			<p>e-mail: <?php echo $_SESSION['email']?> <a href="001Sessions.php">wijzig</a></p>
		</li>
		<li>
			<p>nickname: <?php echo $_SESSION['nickname']?> <a href="001Sessions.php">wijzig</a></p>
		</li>
		<li>
			<p>straat: <?php echo $_SESSION['straat']?> <a href="002Sessions.php">wijzig</a></p>
		</li>
		<li>
			<p>nummer: <?php echo $_SESSION['nummer']?> <a href="002Sessions.php">wijzig</a></p>
		</li>
		<li>
			<p>gemeente: <?php echo $_SESSION['gemeente']?> <a href="002Sessions.php">wijzig</a></p>
		</li>
		<li>
			<p>postcode: <?php echo $_SESSION['postcode']?> <a href="002Sessions.php">wijzig</a></p>
		</li>

	</ul>




	<script src="js/main.js"></script>
</body>
</html>