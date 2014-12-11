<?php 

try
{

	$db = new pdo('mysql:host=localhost;dbname=bieren', 'root', 'root');
}
catch ( PDOException $e )
{
	$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
}





if (isset($_GET['order_by'])) {

	$order = $_GET['order_by'];

	$orderItem = explode("-", $order);

	$sql = "SELECT *
			FROM bieren
			INNER JOIN brouwers
			ON bieren.brouwernr = brouwers.brouwernr
			INNER JOIN soorten
			ON soorten.soortnr = bieren.soortnr
			ORDER BY $orderItem[0] $orderItem[1];";
}
else {
	$order = "none";

	$sql = "SELECT *
		FROM bieren
		INNER JOIN brouwers
		ON bieren.brouwernr = brouwers.brouwernr
		INNER JOIN soorten
		ON soorten.soortnr = bieren.soortnr;";
}

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

	table, th, td {
		border: 1px solid #BEBBC2;
		border-collapse: collapse;
	}

	th {
		background-color: lightgray;
	}


	.order a
	{
		padding-right:20px;
		background-repeat:no-repeat;
		background-position:right;
	}

	.ascending a
	{
		background-image: url("images/icon-asc.png");
	}

	.descending a
	{
		background-image: url("images/icon-desc.png");
	}



	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th class="order <?= ( $order == 'biernr-desc' ) ? 'descending' : 'ascending' ?>">
					<a href="001CRUDSortBy.php?order_by=<?= ( $order == 'biernr-desc' ) ? 'biernr-asc' : 'biernr-desc' ?> ">Biernummer</a></th>

				<th class="order <?= ( $order == 'naam-desc' ) ? 'descending' : 'ascending' ?>">
					<a href="001CRUDSortBy.php?order_by=<?= ( $order == 'naam-desc' ) ? 'naam-asc' : 'naam-desc' ?> ">Bier</th>

								<th class="order <?= ( $order == 'brnaam-desc' ) ? 'descending' : 'ascending' ?>">
					<a href="001CRUDSortBy.php?order_by=<?= ( $order == 'brnaam-desc' ) ? 'brnaam-asc' : 'brnaam-desc' ?> ">Brouwer</th>

				<th class="order <?= ( $order == 'soort-desc' ) ? 'descending' : 'ascending' ?>">
					<a href="001CRUDSortBy.php?order_by=<?= ( $order == 'soort-desc' ) ? 'soort-asc' : 'soort-desc' ?> ">Soort</th>

				<th class="order <?= ( $order == 'alcohol-desc' ) ? 'descending' : 'ascending' ?>">
					<a href="001CRUDSortBy.php?order_by=<?= ( $order == 'alcohol-desc' ) ? 'alcohol-asc' : 'alcohol-desc' ?> ">Alcoholpercentage</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($bieren as $bier) {
				echo "<tr>";
				echo "<td>".$bier['biernr']."</td>";
				echo "<td>".$bier['naam']."</td>";
				echo "<td>".$bier['brnaam']."</td>";
				echo "<td>".$bier['soort']."</td>";
				echo "<td>".$bier['alcohol']."</td>";
			}


			?>
		</tbody>
	</table>




	<script src="js/main.js"></script>
</body>
</html>