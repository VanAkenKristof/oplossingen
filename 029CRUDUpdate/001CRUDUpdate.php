<?php 
session_start();

try
{

	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', 'root');
}
catch ( PDOException $e )
{
	$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
}

$_SESSION['deleteInQueue'] = false;

$confirmationDiv = '<div id="confirmationWindow">
<p>Bent u hééél zeker dat u deze record wilt verwijderen?</p>

<form action"001CRUDDelete.php" method="POST">
<input type="submit" name="ja" value="Ja">
<input type="submit" name="nee" value="Nee">
</form>

</div>';


$formFrontDelete = '<form action="001CRUDUpdate.php" method="POST">
<input type="hidden" name="itemInList" value="';

$formEndDelete = '"><input type="submit" name="go" id="replacement-submitbutton-stop">
</form>';


$formFrontEdit = '<form action="002CRUDUpdate.php" method="POST">
<input type="hidden" name="editItem" value="';

$formEndEdit = '"><input type="submit" id="replacement-submitbutton-edit">
</form>';


if (isset($_POST['ja'])){

	$item = $_SESSION['item'];

	try
	{
		
		$sql = "DELETE FROM brouwers
		WHERE brouwernr = $item";

		$stmt = $db->prepare($sql);

		$stmt->execute();
		$brouwers = $stmt->fetchAll();

	}

	catch ( PDOException $e )
	{
		$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
	}

}

if (isset($_POST['nee'])){
	unset($_SESSION['item']);
}






if (isset($_POST['go'])) {

	$_SESSION['item'] = $_POST['itemInList'];
	$_SESSION['deleteInQueue'] = true;
}






$sql = "SELECT *
FROM brouwers";

$stmt = $db->prepare($sql);

$stmt->execute();
$brouwers = $stmt->fetchAll();




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

	#confirmationWindow{
		background-color: red;
		border-radius: 6px;
		border: solid, black 1px;
		width: 250px;
		padding: 10px;
	}

	thead {
		background-color: gray;
	}

	#replacement-submitbutton-stop {
		width: 16px;
		height: 16px;
		margin: 0;
		padding: 0;
		border: 0;
		background: transparent url(images/icon-delete.png) no-repeat center top;
		text-indent: -1000em;
		cursor:pointer;
	}

		#replacement-submitbutton-edit {
		width: 16px;
		height: 16px;
		margin: 0;
		padding: 0;
		border: 0;
		background: transparent url(images/icon-edit.png) no-repeat center top;
		text-indent: -1000em;
		cursor:pointer;
	}

	#even {
		background-color: #BEBBC2;
	}

	table, th, td {
		border: 1px solid #BEBBC2;
		border-collapse: collapse;
	}

	tbody>tr:hover>td {
		background-color: green;
	}

	</style>
</head>
<body>
			<?php if ($_SESSION['deleteInQueue']) {
		echo $confirmationDiv;
	} ?>

	<table>
		<thead>
			<tr>
				<td>Brouwernummer</td>
				<td>brouwernaam</td>
				<td>adres</td>
				<td>postcode</td>
				<td>gemeente</td>
				<td>omzet</td>
				<td></td>
				<td></td>
			</tr>

		</thead>
		<tbody>
			<?php

			$evenChecker = 1;

			foreach ($brouwers as $brouwer) {
				if ($evenChecker % 2 == 0) {
					echo '<tr id="even">';
				}
				else {
					echo '<tr id="uneven">';
				}

				echo "<td>".$brouwer['brouwernr']."</td>";
				echo "<td>".$brouwer['brnaam']."</td>";
				echo "<td>".$brouwer['adres']."</td>";
				echo "<td>".$brouwer['postcode']."</td>";
				echo "<td>".$brouwer['gemeente']."</td>";
				echo "<td>".$brouwer['omzet']."</td>";
				echo "<td>".$formFrontDelete.$brouwer['brouwernr'].$formEndDelete."</td>";
				echo "<td>".$formFrontEdit.$brouwer['brouwernr'].$formEndEdit."</td>";
				echo "</tr>";

				$evenChecker++;
			}
			?>

		</tbody>
	</table>

	<script src="js/main.js"></script>
</body>
</html>