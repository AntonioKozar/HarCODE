<?php

session_start();

if (!isset($_SESSION['admin']))
{
  	$host=$_SERVER["HTTP_HOST"];
   	$path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
   	header("Location: ../../index.php");
   	exit;
 }

require_once('../connections/db_connections.php');

mysql_select_db($database, $connect);


$name = mysql_real_escape_string(trim($_POST['name']));
$city = mysql_real_escape_string(trim($_POST['city']));
$address= mysql_real_escape_string(trim($_POST['address']));
$email = mysql_real_escape_string(trim($_POST['email']));
$phone = mysql_real_escape_string(trim($_POST['phone']));
$country = mysql_real_escape_string(trim($_POST['country']));
$county = mysql_real_escape_string(trim($_POST['county']));


$newObject = false;
$newObject = mysql_query("INSERT INTO lijekarne	(naziv, 	grad, 	adresa, 	drzava	, zupanija	, telefon, email)
							 VALUES ('".$name."', '".$city."', '".$address."', '".$country."', '".$county."', ".$phone.", '".$email."')");


if($newObject){

	echo 1;
}
else {

	echo 0;
}