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
			<?php	if ($melding == "Pfieuw, het aanmelden is goed verlopen. Welkom!") {
				echo '<div class="modal success">'. $melding .'</div>';
			}
			?>
			<h1>Dashboard</h1>

			<?php echo Anchor('welcome/todos','Todo Applicatie') ; ?>

		</div>
	</div>

	<script src="js/main.js"></script>
</body>
</html>