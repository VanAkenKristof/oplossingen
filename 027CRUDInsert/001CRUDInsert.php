<?php 

$messageContainer = "";
$statusMessage = "";

try
{

	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', 'root');
}
catch ( PDOException $e )
{
	$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
}


if(isset($_POST['submit'])){
	$brouwernaam = $_POST['brouwernaam'];
	$adres = $_POST['adres'];
	$postcode = $_POST['postcode'];
	$gemeente = $_POST['gemeente'];
	$omzet = $_POST['omzet'];

	try {
		$db -> beginTransaction();

		$sql = "INSERT INTO `brouwers`(`brnaam`, `adres`, `postcode`, `gemeente`, `omzet`)"
		."VALUES (:brouwernaam, :adres, :postcode, :gemeente, :omzet)";

		$stmt = $db->prepare($sql);
		$stmt -> bindParam(':brouwernaam', $brouwernaam, PDO::PARAM_STR);
		$stmt -> bindParam(':adres', $adres, PDO::PARAM_STR);		
		$stmt -> bindParam(':postcode', $postcode, PDO::PARAM_INT);
		$stmt -> bindParam(':gemeente', $gemeente, PDO::PARAM_STR);
		$stmt -> bindParam(':omzet', $omzet, PDO::PARAM_STR);
		$stmt -> execute();

		$db -> commit();
		
		// $varLastId = $db->lastInsertId('brouwernr');

		$stmt = $db->query("SELECT LAST_INSERT_ID()");
		$varLastId = $stmt -> fetch(PDO::FETCH_NUM);
		$varLastId = $varLastId[0];

		$statusMessage = $brouwernaam." succesvol toegevoegd. Het unieke nummer van deze brouwerij is ".$varLastId.".";
		
	} catch (PDOExeption $e) {
		$db -> rollBack();
		echo "fail";
	}



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

	<h1>Voeg een brouwer toe</h1>

	<?php echo $messageContainer."<br><br>" ?>
	<?php echo $statusMessage."<br><br>" ?>

	<form action"<?php echo ($_SERVER['REQUEST_URI']) ?>" method="POST">
		brouwernaam:<br>
		<input type="text" name="brouwernaam">
		<br>
		adres:<br>
		<input type="text" name="adres">
		<br>
		postcode:<br>
		<input type="text" name="postcode">
		<br>
		gemeente:<br>
		<input type="text" name="gemeente">
		<br>
		omzet:<br>
		<input type="text" name="omzet">
		<br><br>
		<input type="submit" value="Submit" name="submit">
	</form>



	<script src="js/main.js"></script>
</body>
</html>