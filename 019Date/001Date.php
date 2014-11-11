<?php 
	//22u 35m 25sec 21 januari 1904
	setlocale(LC_ALL, 'nld_nld');
	$date = strftime ("%Hu %Mm %Ssec %d %B %Y" ,mktime(22,35,25,1,21,1904));
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
    	<?php echo $date?>
        <script src="js/main.js"></script>
    </body>
</html>