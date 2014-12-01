<?php 

$messageContainer = "";

try
{

	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', 'root');
}
catch ( PDOException $e )
{
	$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
}


$sql = "SELECT brouwernr, brnaam
FROM brouwers";



$stmt = $db->prepare($sql);

$stmt->execute();
$brouwers = $stmt->fetchAll();

if ( isset ( $_GET['brouwernr'] ) )
{
	$brouwernr = $_GET['brouwernr'];

	$sql = "SELECT naam
	FROM bieren
	WHERE brouwernr = $brouwernr";

	$stmt = $db->prepare($sql);

	$stmt->execute();
	$bieren = $stmt->fetchAll();
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

	<form action="002CRUDQuery.php" method="get">
		<select name="brouwernr">
			<?php 
			foreach ($brouwers as $brouwer) { 
				echo "<option value=".$brouwer["brouwernr"].">".$brouwer["brnaam"]."</option>";
			}
			?>
			
		</select>
		<input type="submit" value="Submit">
	</form>

	<?php 
	if ( isset ( $_GET['brouwernr'] ) )
	{
		$teller = 1;
		$message = "
		<table>
		<tr style=\"background-color:gray\">
			<td>Aantal</td>
			<td>Naam</td>
		</tr>";




		foreach ($bieren as $bier) { 
			$message .=
			"<tr>
				<td>".$teller."</td>
				<td>".$bier["naam"]."</td>
			</tr>";
			$teller++;
		}

		$message .= "</table>";	

		echo $message;
	}




	?>
	<script src="js/main.js"></script>
</body>
</html>