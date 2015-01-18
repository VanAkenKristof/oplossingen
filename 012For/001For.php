<?php 
for ($i=0; $i < 101; $i++) { 
	if ($i!=100) {
		echo ($i.' ,');
	}
	else{
		echo ($i);
	}
}

echo("\n<br />");
echo("\n<br />");

for ($i=0; $i < 101; $i++) { 
	if ($i%3==0 && $i>40 && $i<80) {
		if ($i!=100) {
			echo ($i.' ,');
		}
		else{
			echo ($i);
		}
	}
}


?>