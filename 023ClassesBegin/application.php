<?php 

  function __autoload($class_name) {
      require_once 'classes/'. $class_name . '.php';
  }
   
  $percentCalculator = new Percent(150,100);

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
        <p>Hoeveel percent is<?php echo $percentCalculator->new1?></p>




        <script src="js/main.js"></script>
    </body>
</html>