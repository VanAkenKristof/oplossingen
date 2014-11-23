<?php 

class percent {
	public $absolute;
	public $relative;
	public $hundred;
	public $nominal;
	public $new1;
	public $unit1;

	public function __construct($new, $unit){
		echo 'Gelukt! <br />';

		$this->new1 = $new;
		$this->unit1 = $unit;

		$absolute = $new/$unit;
		$relative = $absolute-1;
		$hundred = $absolute * 100;

		if ($absolute>1) {
			$this->nominal = "positive";
		}
		elseif ($absolute=1) {
			$this->nominal = "status-quo";
		}
		else{
			$this->nominal = "negative";
		}

		function formatNumber($number){
			return round($number,2);
		}

		$this->absolute = formatNumber($absolute);
		$this->relative = formatNumber($relative);
		$this->hundred = formatNumber($hundred);
	}



}



?>

