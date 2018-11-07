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

$deleteUser = false;
$deleteUser = mysql_query("DELETE FROM users WHERE id = ".$id.";");

if($deleteUser){

	echo 1;
}
else {

	echo 0;
}