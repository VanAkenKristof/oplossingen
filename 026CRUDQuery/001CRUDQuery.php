<?php 

$messageContainer = "";
$teller = 0;

try
{

	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', 'root');
}
catch ( PDOException $e )
{
	$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
}





// $sql = "SELECT * FROM `bieren` WHERE biernr = 26";
// $stmt = $db->prepare($sql);

// $stmt->execute();
// $bieren = $stmt->fetch(PDO::FETCH_ASSOC);

// $sql = "SELECT * FROM `bieren`";
// $stmt = $db->prepare($sql);

// $stmt->execute();
// $bieren = $stmt->fetchAll();

$sql = "SELECT *
FROM bieren
INNER JOIN brouwers
ON bieren.brouwernr = brouwers.brouwernr
WHERE bieren.naam LIKE 'du%' AND brouwers.brnaam LIKE '%a%' ";



$stmt = $db->prepare($sql);

$stmt->execute();
$bieren = $stmt->fetchAll();

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
		td{
			border: solid 1px black;
		}
	</style>
</head>
<body>
	<?php if (!$messagecontainer = "") {
		echo "<p>".$messageContainer."</p>";
	} ?>
<table>
	<tr style="background-color:gray">
		<td><p>#</p></td>
		<td><p>biernr</p></td>
		<td><p>naam</p></td>
		<td><p>brouwernr</p></td>
		<td><p>soortnr</p></td>
		<td><p>alcohol</p></td>
		<td><p>brnaam</p></td>
		<td><p>adres</p></td>
		<td><p>postcode</p></td>
		<td><p>gemeente</p></td>
		<td><p>omzet</p></td>
	</tr>
<?php 
	foreach ($bieren as $bier) {
		$teller++;
		echo "
		<tr>
			<td><p>".$teller."</p></td>
			<td><p>".$bier["biernr"]."</p></td>
			<td><p>".$bier["naam"]."</p></td>
			<td><p>".$bier["brouwernr"]."</p></td>
			<td><p>".$bier["soortnr"]."</p></td>
			<td><p>".$bier["alcohol"]."</p></td>
			<td><p>".$bier["brnaam"]."</p></td>
			<td><p>".$bier["adres"]."</p></td>
			<td><p>".$bier["postcode"]."</p></td>
			<td><p>".$bier["gemeente"]."</p></td>
			<td><p>".$bier["omzet"]."</p></td>
		</tr>";
	}?>
</table>

	<script src="js/main.js"></script>
</body>
</html>