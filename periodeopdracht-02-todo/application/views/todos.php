<?php 


?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="http://kdg.pascalculator.be/14-15/wb/opdracht-02-todo-uitgebreid/public/css/global.css">
	<link rel="author" href="humans.txt">
</head>
<body>

	<div id="container">

		<header class="group">
			<div>
				<?php echo Anchor('welcome/index', 'Home'); ?>
			</div>

			<nav>
				<ul>
					<?php
					if ($user == null) {
						echo "<li>" . Anchor('welcome/login', 'Login') . "</li>";
						echo "<li>" .Anchor('welcome/registreer', 'Registreer') . "</li>";
					}
					else {
						echo "<li>" . Anchor('welcome/dashboard', 'Dashboard') . "</li>";
						echo "<li>" . Anchor('welcome/todos', 'Todos') . "</li>";
						echo "<li>" . Anchor('welcome/logout', 'Logout (' . $user->email . ")") . "</li>";
					}

					?>
				</ul>
			</nav>
		</header>


		<div class="body">

			<?php 
				if ($melding == "Alright! Dat is geschrapt." || $melding == "Ai ai, nog meer werk..." || substr($melding , 0 , 3 ) == "Het") {
					echo '<div class="modal success">'.$melding.'</div>';
				}
				



			 ?>
			<h1>De TODO-app</h1>
			<?php 

			if (count($todos) == 0) {
				echo '<p>Nog geen todo-items. '. Anchor('todos/add', 'Voeg item toe.').'</p>';
			}
			else {
				echo '<h2>Wat moet er allemaal gebeuren?</h2>';
				echo '<p>'.Anchor('todos/add', 'Voeg item toe.').'</p>';
				echo '<h3>Todo</h3>';

				$teller = 0;
				$doneleeg = true;
				$notdoneleeg = true;

				foreach ($todos as $todo) {
					if ($todo->done == 0) {
						$notdoneleeg = false;
					} else {
						$doneleeg = false;
					}
				}

				if ($notdoneleeg){
					echo '<p>Allright, all done!</p>';
				}
				else {
					echo '<ul class="list">';
					foreach ($todos as $todo) {
						if ($todo->done == 0) {
							echo '<li class="todo">';
							echo '<span class="activate" title="Vink maar af">'.Anchor('todos/afvinken/'.$todo->id, ' ', 'class="icon fontawesome-ok-sign"').'</span>';
							echo '<span class="text">'.$todo->todo.'</span>';
							echo '<span class="delete" title="Verwijder dit maar">'.Anchor('todos/delete/'.$todo->id, ' ', 'class="icon fontawesome-remove"').'</span>';

						}
					}
					echo '</ul>';
				}

				echo '<h3>Done</h3>';
				if ($doneleeg){
					echo '<p>Damn, werk aan de winkel...</p>';
				}
				else {
					echo '<ul class="list">';
					foreach ($todos as $todo) {
						if ($todo->done == 1) {
							echo '<li class="done">';
							echo '<span class="activate" title="Vink maar af">'.Anchor('todos/afvinken/'.$todo->id, ' ', 'class="icon fontawesome-ok-sign"').'</span>';
							echo '<span class="text">'.$todo->todo.'</span>';
							echo '<span class="delete" title="Verwijder dit maar">'.Anchor('todos/delete/'.$todo->id, ' ', 'class="icon fontawesome-remove"').'</span>';

						}
					}

				}

			}
			?>

		</div>

		<script src="js/main.js"></script>
	</body>
	</html>