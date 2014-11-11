<?php 
// $berekenGeld = 100000;
// $intrest = 0;

// for ($i=1; $i < 11; $i++) { 
// 	$intrest = $berekenGeld * 0.08;
// 	$berekenGeld += $intrest;
// 	echo "In jaar ".$i." was er ".$berekenGeld." in totaal en was de intrest ".$intrest."<br>";


// 	}


	$startKapitaal 	=	100000;
	$renteVoet		=	8;
	$aantalJaar		=	10;

	$bericht = "";

	function berekenGeld($startKapitaal, $renteVoet, $aantalJaar){
		static $i = 1;
		static $arrayDump 	= 	array();
		
		$winst 	= $startKapitaal * ( $renteVoet / 100);
		$totaal	=	$startKapitaal + $winst;

		$arrayDump[] =  "In jaar ".$i." was er ".$totaal." in totaal en was de intrest ".$winst."<br>";
		

		if ($i < $aantalJaar)
		{
			$i++;
			berekenGeld( $totaal, $renteVoet, $aantalJaar );
		}

		return $arrayDump;
	}

	$winstHans = berekenGeld( $startKapitaal, $renteVoet, $aantalJaar );

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
         <ul>
			<?php foreach($winstHans as $value): ?>
				<li><?php echo $value ?></li>
			<?php endforeach ?>
		</ul>
         <script src="js/main.js"></script>
     </body>
 </html>