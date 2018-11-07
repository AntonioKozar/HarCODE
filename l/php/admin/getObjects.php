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


$string = mysql_real_escape_string(trim($_POST['string']));
$date_from = mysql_real_escape_string(trim($_POST['from']));
$date_to=mysql_real_escape_string(trim($_POST['to']));
$c=mysql_real_escape_string(trim($_POST['checked']));

if ($string!='' && $date_to == '' && $date_from == '') 
{

	$getObjects=mysql_query("SELECT * FROM lijekarne WHERE (naziv LIKE '%$string%' OR grad LIKE '%$string%' OR adresa LIKE '%$string%' OR drzava LIKE '%$string%' OR zupanija LIKE '%$string%') AND checked = ".$c.";");
	while ($getObjects2 = mysql_fetch_assoc($getObjects))
	{

		?>
				<tr>
				
					<td> <?php echo $getObjects2['naziv']; ?></td>
					<td> <?php echo $getObjects2['grad']; ?> </td>
					<td> <?php echo $getObjects2['adresa']; ?> </td>
					<td> <?php echo $getObjects2['drzava']; ?> </td>
					<td> <?php echo $getObjects2['zupanija']; ?> </td>
					<td> <?php echo $getObjects2['telefon']; ?></td>
					<td> <?php echo $getObjects2['email']; ?></td>
					<td> <?php

								 if($getObjects2['checked'] == 1) {

								 	?>


								 			<input type="checkbox" value="" checked="true" disabled="disabled">


								 	<?php

								  } 
								 else if ($getObjects2['checked'] == 0) {

								 	?>


								 			<input type="checkbox" value="" disabled="disabled">

								 	<?php

								 }
								 else {

								 	echo "-";

								 }


								 	?>

					</td>
					<td> <?php

						if ($getObjects2['checked']==0) {
							echo "-";
						}
						else {

							 echo $getObjects2['timestamp'] ;

							 }

							 ?> </td>
					<td> <?php 

						if ($getObjects2['checked'] == 0) {
							echo "-";
						}
						else {

						$userid = $getObjects2['user'];

						$getUser = mysql_query("SELECT name, lastname, email FROM users WHERE id = ".$userid." LIMIT 1;");

						$getUser2 = mysql_fetch_assoc($getUser);

						echo $getUser2['name']." ".$getUser2['lastname'].", ".$getUser2['email'];

						}

					 ?> </td>

				</tr>
					
		<?php

	}



}
else if($string!='' && $date_to != '' && $date_from != '')
{

	$getObjects=mysql_query("SELECT * FROM lijekarne WHERE (naziv LIKE '%$string%' OR grad LIKE '%$string%' OR adresa LIKE '%$string%' OR drzava LIKE '%$string%' OR zupanija LIKE '%$string%') AND timestamp <= '".$date_to."' AND timestamp >= '".$date_from."' AND checked = ".$c.";");
	while ($getObjects2 = mysql_fetch_assoc($getObjects))
	{

		?>
				<tr>
					
<td> <?php echo $getObjects2['naziv']; ?></td>
					<td> <?php echo $getObjects2['grad']; ?> </td>
					<td> <?php echo $getObjects2['adresa']; ?> </td>
					<td> <?php echo $getObjects2['drzava']; ?> </td>
					<td> <?php echo $getObjects2['zupanija']; ?> </td>
					<td> <?php echo $getObjects2['telefon']; ?></td>
					<td> <?php echo $getObjects2['email']; ?></td>
					<td> <?php

								 if($getObjects2['checked'] == 1) {

								 	?>


								 			<input type="checkbox" value="" checked="true" disabled="disabled">


								 	<?php

								  } 
								 else if ($getObjects2['checked'] == 0) {

								 	?>


								 			<input type="checkbox" value="" disabled="disabled">

								 	<?php

								 }
								 else {

								 	echo "-";

								 }


								 	?>

					</td>
					<td> <?php

						if ($getObjects2['checked']==0) {
							echo "-";
						}
						else {
							
							 echo $getObjects2['timestamp'] ;

							 }

							 ?> </td>
					<td> <?php 

						if ($getObjects2['checked'] == 0) {
							echo "-";
						}
						else {

						$userid = $getObjects2['user'];

						$getUser = mysql_query("SELECT name, lastname, email FROM users WHERE id = ".$userid." LIMIT 1;");

						$getUser2 = mysql_fetch_assoc($getUser);

						echo $getUser2['name']." ".$getUser2['lastname'].", ".$getUser2['email'];

						}

					 ?> </td>
				</tr>
					
		<?php

	}

}
else if($string =='' && $date_to != '' && $date_from != '')
{

	$getObjects=mysql_query("SELECT * FROM lijekarne WHERE timestamp <= '".$date_to."' AND timestamp >= '".$date_from."' AND checked = ".$c.";");
	while ($getObjects2 = mysql_fetch_assoc($getObjects))
	{

		?>
				<tr>
					
<td> <?php echo $getObjects2['naziv']; ?></td>
					<td> <?php echo $getObjects2['grad']; ?> </td>
					<td> <?php echo $getObjects2['adresa']; ?> </td>
					<td> <?php echo $getObjects2['drzava']; ?> </td>
					<td> <?php echo $getObjects2['zupanija']; ?> </td>
					<td> <?php echo $getObjects2['telefon']; ?></td>
					<td> <?php echo $getObjects2['email']; ?></td>
					<td> <?php
								 if($getObjects2['checked'] == 1) {

								 	?>


								 			<input type="checkbox" value="" checked="true" disabled="disabled">


								 	<?php

								  } 
								 else if ($getObjects2['checked'] == 0) {

								 	?>


								 			<input type="checkbox" value="" disabled="disabled">

								 	<?php

								 }
								 else {

								 	echo "-";

								 }


								 	?>

					</td>
					<td> <?php

						if ($getObjects2['checked']==0) {
							echo "-";
						}
						else {
							
							 echo $getObjects2['timestamp'] ;

							 }

							 ?> </td>
					<td> <?php 

						if ($getObjects2['checked'] == 0) {
							echo "-";
						}
						else {

						$userid = $getObjects2['user'];

						$getUser = mysql_query("SELECT name, lastname, email FROM users WHERE id = ".$userid." LIMIT 1;");

						$getUser2 = mysql_fetch_assoc($getUser);

						echo $getUser2['name']." ".$getUser2['lastname'].", ".$getUser2['email'];

						}

					 ?> </td>
				</tr>
					
		<?php

	}

}
else if($string =='' && $date_to == '' && $date_from != '')
{

	$getObjects=mysql_query("SELECT * FROM lijekarne WHERE timestamp >= '".$date_from."' AND checked = ".$c.";");
	while ($getObjects2 = mysql_fetch_assoc($getObjects))
	{

		?>
				<tr>
					
<td> <?php echo $getObjects2['naziv']; ?></td>
					<td> <?php echo $getObjects2['grad']; ?> </td>
					<td> <?php echo $getObjects2['adresa']; ?> </td>
					<td> <?php echo $getObjects2['drzava']; ?> </td>
					<td> <?php echo $getObjects2['zupanija']; ?> </td>
					<td> <?php echo $getObjects2['telefon']; ?></td>
					<td> <?php echo $getObjects2['email']; ?></td>
					<td> <?php

								 if($getObjects2['checked'] == 1) {

								 	?>


								 			<input type="checkbox" value="" checked="true" disabled="disabled">


								 	<?php

								  } 
								 else if ($getObjects2['checked'] == 0) {

								 	?>


								 			<input type="checkbox" value="" disabled="disabled">

								 	<?php

								 }
								 else {

								 	echo "-";

								 }


								 	

								 	?>

					</td>
					<td> <?php

						if ($getObjects2['checked']==0) {
							echo "-";
						}
						else {
							
							 echo $getObjects2['timestamp'] ;

							 }

							 ?> </td>
					<td> <?php 

						if ($getObjects2['checked'] == 0) {
							echo "-";
						}
						else {

						$userid = $getObjects2['user'];

						$getUser = mysql_query("SELECT name, lastname, email FROM users WHERE id = ".$userid." LIMIT 1;");

						$getUser2 = mysql_fetch_assoc($getUser);

						echo $getUser2['name']." ".$getUser2['lastname'].", ".$getUser2['email'];

						}

					 ?> </td>
				</tr>
					
		<?php

	}

}
else
{

	$getObjects=mysql_query("SELECT * FROM lijekarne;");
	while ($getObjects2 = mysql_fetch_assoc($getObjects))
	{

		?>
				<tr>
					
<td> <?php echo $getObjects2['naziv']; ?></td>
					<td> <?php echo $getObjects2['grad']; ?> </td>
					<td> <?php echo $getObjects2['adresa']; ?> </td>
					<td> <?php echo $getObjects2['drzava']; ?> </td>
					<td> <?php echo $getObjects2['zupanija']; ?> </td>
					<td> <?php echo $getObjects2['telefon']; ?></td>
					<td> <?php echo $getObjects2['email']; ?></td>
					<td> <?php

								 if($getObjects2['checked'] == 1) {

								 	?>


								 			<input type="checkbox" value="" checked="true" disabled="disabled">


								 	<?php

								  } 
								 else if ($getObjects2['checked'] == 0) {

								 	?>


								 			<input type="checkbox" value="" disabled="disabled">

								 	<?php

								 }
								 else {

								 	echo "-";

								 }


								 	?>

					</td>
					<td> <?php

						if ($getObjects2['checked']==0) {
							echo "-";
						}
						else {
							
							 echo $getObjects2['timestamp'] ;

							 }

							 ?> </td>
					<td> <?php 

						if ($getObjects2['checked'] == 0) {
							echo "-";
						}
						else {

						$userid = $getObjects2['user'];

						$getUser = mysql_query("SELECT name, lastname, email FROM users WHERE id = ".$userid." LIMIT 1;");

						$getUser2 = mysql_fetch_assoc($getUser);

						echo $getUser2['name']." ".$getUser2['lastname'].", ".$getUser2['email'];

						}

					 ?> </td>
				</tr>
					
		<?php

	}

}