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

$id = mysql_real_escape_string(trim($_POST['id']));
$name = mysql_real_escape_string(trim($_POST['name']));
$city = mysql_real_escape_string(trim($_POST['city']));
$address= mysql_real_escape_string(trim($_POST['address']));
$email = mysql_real_escape_string(trim($_POST['email']));
$phone = mysql_real_escape_string(trim($_POST['phone']));
$country = mysql_real_escape_string(trim($_POST['country']));
$county = mysql_real_escape_string(trim($_POST['county']));
$contact = mysql_real_escape_string(trim($_POST['contact']));
$date = mysql_real_escape_string(trim($_POST['date']));
$contacted = mysql_real_escape_string(trim($_POST['contacted']));
$checked = mysql_real_escape_string(trim($_POST['checked']));

$updateObject = false;
$updateObject = mysql_query("UPDATE lijekarne SET naziv= '".$name."', 
											   	   grad= '".$city."', 
											 	adresa = '".$address."',
 												drzava = '".$country."', 
 												 email = '".$email."', 
 											   telefon = '".$phone."', 
 											  zupanija = '".$county."', 
 											 timestamp = '".$date."', 
 											 contacted = '".$contacted."', 
 											   checked = '".$checked."'
 											  WHERE id = ".$id.";");


if($updateObject){

	echo 1;
}
else {

	echo 0;
}