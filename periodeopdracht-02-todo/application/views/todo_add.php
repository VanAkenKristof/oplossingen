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
			
			<h1>Voeg een TODO-item toe</h1>
			<?php echo '<p>' . Anchor('welcome/todos', 'Terug naar mijn TODO\'s') . '</p>'	; ?>

			<?php $attributes = array('name' => 'myform');

			echo form_open('todos/toevoegen', $attributes);

			?>
			<table>
				<tr>
					<td><?php echo form_label('Wat moet er gedaan worden?', 'todo'); ?></td>
					
				</tr>
				<tr>
					<td><?php echo form_input(array('name' => 'todo', 'id' => 'todo', 'size' => '30')); ?></td>
				</tr>
				<tr>
					<td><?php echo form_submit('mysubmit', 'Toevoegen'); ?></td>
				</tr>
			</table>








		</div>

		<script src="js/main.js"></script>
	</body>
	</html>