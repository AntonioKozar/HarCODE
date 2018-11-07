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


$string = mysql_real_escape_string(trim($_POST['email']));
$string2 = mysql_real_escape_string(trim($_POST['title']));
$saveEmail = false;
$saveEmail = mysql_query("UPDATE emails SET text = '".$string."', title = '".$string2."';");

if($saveEmail){

	echo 1;
}
else {

	echo 0;
}