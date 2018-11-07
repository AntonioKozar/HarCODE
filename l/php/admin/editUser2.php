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
$lastname = mysql_real_escape_string(trim($_POST['lastname']));
$type= mysql_real_escape_string(trim($_POST['usertype']));
$password = mysql_real_escape_string(trim($_POST['password']));
$email = mysql_real_escape_string(trim($_POST['email']));
$phone = mysql_real_escape_string(trim($_POST['phone']));

$updateUser = false;
$updateUser = mysql_query("UPDATE users SET name='".$name."', lastname='".$lastname."', usertype = ".$type.",
 											password = '".$password."', email = '".$email."', contact = '".$phone."' 
 											WHERE id = ".$id.";");

if($updateUser){

	echo 1;
}
else {

	echo 0;
}