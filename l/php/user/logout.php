<?php

session_start();

//destroy session variables
unset($_SESSION['user']);

session_destroy();

//redirect to login page
$host=$_SERVER["HTTP_HOST"];
$path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
header("Location: ../../index.php");
exit;
