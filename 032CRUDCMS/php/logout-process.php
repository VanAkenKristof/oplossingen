<?php 
session_start();

setcookie("login", "", time() - 36000, "/");
session_destroy();

header('Location: ../login-form.php');


?>