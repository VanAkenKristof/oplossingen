<?php 

class percent {
	public $absolute;
	public $relative;
	public $hundred;
	public $nominal;

	public function __construct($new, $unit){
		echo 'Gelukt! <br />';

		$absolute = $new/$unit;
		$relative = $absolute-1;
		$hundred = $absolute * 100;

		if ($absolute>1) {
			$nominal = "positive";
		}
		elseif ($absolute=1) {
			$nominal = "status-quo";
		}
		else{
			$nominal = "negative";
		}

		function formatNumber($number){
			return round($number,2);
		}

		$absolute = formatNumber($absolute);
		$relative = formatNumber($relative);
		$hundred = formatNumber($hundred);
	}



}



?>

