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

if ($string!='') 
{

	$getUsers=mysql_query("SELECT * FROM users WHERE name LIKE '%$string%' OR lastname LIKE '%$string%' OR email LIKE '%$string%' OR contact LIKE '%$string%' AND usertype = 2;");
	while ($getUsers2 = mysql_fetch_assoc($getUsers))
	{

		?>
				<tr>
					<td style="cursor:pointer" onclick="editUser( '<?php echo $getUsers2['id']; ?>' )"><i class="glyphicon glyphicon-pencil"></i></td>
					<td> <?php echo $getUsers2['name']; ?></td>
					<td> <?php echo $getUsers2['lastname']; ?> </td>
					<td> <?php echo $getUsers2['email']; ?> </td>
					<td> <?php echo $getUsers2['contact']; ?> </td>
					<td>
						
						<?php 

							$user_id = $getUsers2['id'];

							$getCount = mysql_query("SELECT count(id) AS cnt FROM lijekarne WHERE user =".$user_id." LIMIT 1;");

							$getCount2 = mysql_fetch_assoc($getCount);

							echo $getCount2['cnt'];

						 ?>

					</td>

					<td>


						<?php 

							$getLast = mysql_query("SELECT MAX(id) AS max, timestamp FROM lijekarne WHERE user =".$user_id." LIMIT 1;");

							$getLast2 = mysql_fetch_assoc($getLast);

							echo $getLast2['timestamp'];

						 ?>
						

					</td>
				<td style="cursor:pointer" onclick="removeUser( '<?php echo $getUsers2['id']; ?>' )"><i class="glyphicon glyphicon-remove"></i></td></tr>
					
		<?php

	}



}
else
{

	$getUsers=mysql_query("SELECT * FROM users WHERE  usertype = 2;");
	while ($getUsers2 = mysql_fetch_assoc($getUsers))
	{

		?>
				<tr>
					<td style="cursor:pointer" onclick="editUser( '<?php echo $getUsers2['id']; ?>' )"><i class="glyphicon glyphicon-pencil"></i></td>
					<td> <?php echo $getUsers2['name']; ?></td>
					<td> <?php echo $getUsers2['lastname']; ?> </td>
					<td> <?php echo $getUsers2['email']; ?> </td>
					<td> <?php echo $getUsers2['contact']; ?> </td>
					<td>
						
						<?php 

							$user_id = $getUsers2['id'];

							$getCount = mysql_query("SELECT count(id) AS cnt FROM lijekarne WHERE user =".$user_id." LIMIT 1;");

							$getCount2 = mysql_fetch_assoc($getCount);

							echo $getCount2['cnt'];

						 ?>

					</td>

					<td>


						<?php 

							$getLast = mysql_query("SELECT MAX(id) AS max, timestamp FROM lijekarne WHERE user =".$user_id." LIMIT 1;");

							$getLast2 = mysql_fetch_assoc($getLast);

							echo $getLast2['timestamp'];

						 ?>
						

					</td>
				<td style="cursor:pointer" onclick="removeUser( '<?php echo $getUsers2['id']; ?>' )"><i class="glyphicon glyphicon-remove"></i></td></tr>
					
		<?php

	}

}