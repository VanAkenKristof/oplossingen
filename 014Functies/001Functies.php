<?php 
	function berekenSom($getal1, $getal2){
		return $getal1 + $getal2;
	}

	echo(berekenSom(5,4));

	function vermenigvuldig($getal1, $getal2){
		return $getal1 * $getal2;
	}

	echo(vermenigvuldig(5,3));

	function isEven($getal){
		if ($getal%2 == 0) {
			return true;
		}
		else {
			return false;
		}
	}

	echo(isEven(12));

	function lengthAndUpperCase($string){
		$returnvalues[0] = strlen($string);
		$returnvalues[1] = strtoupper($string);
		return $returnvalues;
	}

	echo(lengthAndUpperCase("testerIInnoOOoo")[0]);
	echo(lengthAndUpperCase("testerIInnoOOoo")[1]);


 ?>