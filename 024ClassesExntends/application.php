<?php 

function __autoload($class_name) {
	require_once 'classes/'. $class_name . '.php';
}

// $goat = new Animal("Goat", "male", 75);
// $worm = new Animal("Worm", "hermaphrodite", 10);
// $whale = new Animal ("Whale", "female", 70000);

// $whale->changeHealth(-150);


// echo $goat->getName()."heeft het geslacht ".$goat->getGender()." en heeft momenteel ".$goat->getHealth()." levenspunten. Special Move: ".$goat->doSpecialMove()."<br>";
// echo $whale->getName()."heeft het geslacht ".$whale->getGender()." en heeft momenteel ".$whale->getHealth()." levenspunten. Special Move: ".$whale->doSpecialMove()."<br>";
// echo $worm->getName()."heeft het geslacht ".$worm->getGender()." en heeft momenteel ".$worm->getHealth()." levenspunten. Special Move: ".$worm->doSpecialMove()."<br>";

// $simba = new Lion("Simba", "male", 75, "Congo Lion");
// $scar = new Lion("Simba", "male", 75, "Kenia Lion");

// echo "De speciale move van ". $simba->getName() ." (soort: ". $simba->getSpecies() ."): ". $simba->doSpecialMove() .".<br>";
// echo "De speciale move van ". $scar->getName() ." (soort: ". $scar->getSpecies() ."): ". $scar->doSpecialMove() .".<br>";

$zeke = new Zebra("Zeke", "female", 100, "Quagga");
$zana = new Zebra("Zana", "female", 100, "Selous");

echo "De speciale move van ". $zeke->getName() ." (soort: ". $zeke->getSpecies() ."): ". $zeke->doSpecialMove() .".<br>";
echo "De speciale move van ". $zana->getName() ." (soort: ". $zana->getSpecies() ."): ". $zana->doSpecialMove() .".<br>";


 ?>