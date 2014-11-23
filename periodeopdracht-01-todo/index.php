<?php
session_start();

$emptylist = true;
$message1 = "Je hebt nog geen TODO's toegevoegd. Zo weinig werk of meesterplanner?";


	$_SESSION['todo'][] = $_POST['todoitem'];

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





	</style>
</head>
<body>
	<h1>Todo App</h1>
	<?php if (!$emptylist): ?>
	<?php echo $message1?>
<?php else :?>
<!--  <?php foreach ( $_SESSION['todo'] as $item ): ?>
	<?php echo $_SESSION['todo'][$item]?>
 <?php endforeach ?> -->
 <?php var_dump($_SESSION['todo'])?>
<?php endif ?>




<!-- Form stuk -->
<form action="index.php" method="POST">
	<h1>Todo Toevoegen</h1>
	<label for="todoitem">Beschrijving: </label>
	<input type="text" name="todoitem" id="todoitem">
	<input type="submit" name="submit" value="Voeg Toe">
</form>






<script src="js/main.js"></script>
</body>
</html>