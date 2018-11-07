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

$date_from = mysql_real_escape_string(trim($_POST['from']));
$date_to=mysql_real_escape_string(trim($_POST['to']));
$id = $_SESSION['user_id'];


if ($date_from != '' && $date_to != '') 
{
	
	$count = mysql_query("SELECT count(id) as cnt FROM lijekarne where timestamp >= '".$date_from."' AND timestamp <= '".$date_to."' AND checked = 1 AND user = ".$id.";");

	$count2 = mysql_fetch_assoc($count);

	echo $count2['cnt'];

}
else if ($date_from == '' && $date_to == '')
{

	$count = mysql_query("SELECT count(id) as cnt FROM lijekarne WHERE checked = 1 AND user = ".$id.";");

	$count2 = mysql_fetch_assoc($count);

	echo $count2['cnt'];

}
else 
{

	echo 0;


}