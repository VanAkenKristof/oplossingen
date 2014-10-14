<?php 
$berekenGeld = 100000;
$intrest = 0;

//Is niet gelukt met een recursive function
for ($i=1; $i < 11; $i++) { 
	$intrest = $berekenGeld * 0.08;
	$berekenGeld += $intrest;
	echo "In jaar ".$i." was er ".$berekenGeld." in totaal en was de intrest ".$intrest."<br>";


	}




 ?>