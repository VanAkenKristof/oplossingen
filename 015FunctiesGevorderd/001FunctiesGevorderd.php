<?php 
	$md5HashKey = "d1fa402db91a7a93c4f414b8278ce073";

	function functie1($getal){
		global $md5HashKey;
		return "De needle '".$getal."' komt ".(substr_count($md5HashKey, $getal)/strlen($md5HashKey)*100)."% voor in de hash key '".$md5HashKey."'";
	}

	echo(functie1("2")."<br>");
	echo(functie1("8")."<br>");
	echo(functie1("a")."<br>");


 ?>