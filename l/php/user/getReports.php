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


$string = mysql_real_escape_string(trim($_POST['string']));
$date_from = mysql_real_escape_string(trim($_POST['from']));
$date_to=mysql_real_escape_string(trim($_POST['to']));
$id = $_SESSION['user_id'];

if ($date_from=='') {
	$date_from = '2000-01-01 00:00:00';
}

if ($date_to=='') {
	$date_to = '2020-01-01 00:00:00';
}

if ($string != '') 
{

	$getReport = mysql_query("SELECT * FROM lijekarne WHERE user = ".$id." AND checked = 1 AND timestamp >= '".$date_from."' AND timestamp <= '".$date_to."' AND (naziv LIKE '%$string%' OR grad LIKE '%$string%' OR adresa LIKE '%$string%' OR drzava LIKE '%$string%' OR zupanija LIKE '%$string%');");

	while ($getReport2 = mysql_fetch_assoc($getReport)) {
		
		?>


			<tr>
				<th><?php 	echo $getReport2['naziv']; ?></th>
				<th> <?php 	echo $getReport2['grad']; ?></th>
				<th><?php 	echo $getReport2['adresa']; ?></th>
				<th><?php 	echo $getReport2['zupanija']; ?></th>
				<th><?php 	echo $getReport2['drzava']; ?></th>
				<th><?php 	echo $getReport2['timestamp']; ?></th>
			</tr>


		<?php

	}


}
else 
{

	$getReport = mysql_query("SELECT * FROM lijekarne WHERE user = ".$id." AND checked = 1 AND timestamp >= '".$date_from."' AND timestamp <= '".$date_to."';");

	while ($getReport2 = mysql_fetch_assoc($getReport)) {
		
		?>


			<tr>
				<th><?php 	echo $getReport2['naziv']; ?></th>
				<th> <?php 	echo $getReport2['grad']; ?></th>
				<th><?php 	echo $getReport2['adresa']; ?></th>
				<th><?php 	echo $getReport2['zupanija']; ?></th>
				<th><?php 	echo $getReport2['drzava']; ?></th>
				<th><?php 	echo $getReport2['timestamp']; ?></th>
			</tr>


		<?php

	}


}