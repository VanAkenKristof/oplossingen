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
			<h1>Registreren</h1>
			<?php

			$attributes = array('name' => 'myform');
			echo form_open('user/registreer', $attributes);
			?>
			<table>
				<?php 
				if (isset($melding1)) {
					echo '<div class="modal error">'. $melding1 .'</div>';
				}

				?>
				<tr>
					<td><?php echo form_label('Email:', 'email'); ?></td>
					<td><?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '30')); ?></td>
				</tr>
				<?php 
				if (isset($melding2)) {
					echo '<div class="modal error">'. $melding2 .'</div>';
				}

				?>
				<tr>
					<td><?php echo form_label('Wachtwoord:', 'password'); ?></td>
					<td><?php 
					$data = array('name' => 'password', 'id' => 'password', 'size' => '30');
					echo form_password($data);
					?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo form_submit('mysubmit', 'Submit'); ?></td>
			</tr>
		</table>





	</div>
</div>

<script src="js/main.js"></script>
</body>
</html>