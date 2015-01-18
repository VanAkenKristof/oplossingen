<?php
session_start();

function __autoload($class_name) {
	require_once 'classes/'. $class_name . '.php';
}

if (isset($_POST['done'])){
	$item = $_POST['itemInList'];
	$_SESSION['todo'][(int)$item]->setCompletedTrue();
}


if (isset($_POST['delete'])){
	$item = $_POST['itemInList'];
	unset($_SESSION['todo'][(int)$item]);
	$_SESSION['todo'] = array_values($_SESSION['todo']);
}


if ( isset ( $_POST[ 'submit' ] ) ) {
	if (empty($_POST['todoitem'])){
		echo "Invul kader is leeg, gelieven iets in te vullen";
	}
	else{

		$_SESSION['todo'][] = new ToDo($_POST['todoitem']);
	}
}

function doChecks1() {
	foreach($_SESSION['todo'] as $id => $todo){
		if ($todo->getItemCompleted()){
			return false;
		}
	}
	return true;
}

function doChecks2() {
	foreach($_SESSION['todo'] as $id => $todo){
		if (!$todo->getItemCompleted()){
			return false;
		}
	}
	return true;
}

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ToDo Lijst</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="author" href="humans.txt">
	<style>
	#doneKnop {border-radius: 20px; background-color: green; margin-right: 10px;}
	#deleteKnop {border-radius: 20px; background-color: red; margin-left: 10px;}




	</style>
</head>
<body>
	<h1>Todo App</h1>
	<?php if (isset($_SESSION['todo']) && !empty($_SESSION['todo'])): ?>
	<?php echo "<h2>Nog te doen</h2>".(doChecks2() ? "<p>Schouderklopje, alles is gedaan!</p>":"")?>
	<?php foreach($_SESSION['todo'] as $id => $todo): ?>
	<?php if (!$todo->getItemCompleted()):?>
	<?php echo "<form action=\"index.php\" method=\"POST\"><input type=\"hidden\" name=\"itemInList\" value=\"".$id."\"><p><input type=\"submit\" name=\"done\" value=\"V\" id=\"doneKnop\">"
	.$todo->getName()."<input type=\"submit\" name=\"delete\" value=\"X\" id=\"deleteKnop\"></p></form>"?>
<?php endif;?>
<?php endforeach; ?>
<?php echo "<h2>Done and done!</h2>".(doChecks1() ? "<p>Werk aan de winkel...</p>":"")?>
<?php foreach($_SESSION['todo'] as $id => $todo): ?>
	<?php if ($todo->getItemCompleted()):?>
	<?php echo "<form action=\"index.php\" method=\"POST\"><input type=\"hidden\" name=\"itemInList\" value=\"".$id."\"><p><strike><input type=\"submit\" name=\"done\" value=\"V\" id=\"doneKnop\">"
	.$todo->getName()."<input type=\"submit\" name=\"delete\" value=\"X\" id=\"deleteKnop\"></strike></p></form>"?>
<?php endif;?>
<?php endforeach; ?>
<?php else :?>
	<?php echo "Je hebt nog geen TODO's toegevoegd. Zo weinig werk of meesterplanner?"?>
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