<?php

session_start();

if (!isset($_SESSION['user']))
{
  	$host=$_SERVER["HTTP_HOST"];
   	$path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
   	header("Location: ../../index.php");
   	exit;
 }

require_once('../connections/db_connections.php');

mysql_select_db($database, $connect);

$id = mysql_real_escape_string(trim($_POST['id']));
$contact = mysql_real_escape_string(trim($_POST['string']));
$user = $_SESSION['user_id'];


$updateObject = false;
$updateObject = mysql_query("UPDATE lijekarne SET timestamp = NOW(), 
 											 contacted = '".$contact."', 
 											   checked = 1,
 											   user = ".$user."
 											  WHERE id = ".$id.";");


if($updateObject){

	echo 1;
}
else {

	echo 0;
}