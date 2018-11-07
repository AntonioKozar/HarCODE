<?php 

session_start();

if (isset($_SESSION['admin']))
{   

}
else if (isset($_SESSION['user']))
{   

    $host=$_SERVER["HTTP_HOST"];
    $path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
    header("Location: ../user/index.php");
    exit;
}
else
{
	$host=$_SERVER["HTTP_HOST"];
    $path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
    header("Location: ../../index.php");
    exit;
}

require_once('../connections/db_connections.php');

mysql_select_db($database, $connect);

$id = mysql_real_escape_string(trim($_GET['id']));

$getObjectsData = mysql_query("SELECT * FROM lijekarne WHERE id = ".$id." LIMIT 1;");

$getObjectsData2 = mysql_fetch_assoc($getObjectsData);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/datepicker.css" rel="stylesheet">
     <link href="../../less/datepicker.less" rel="stylesheet">
</head>
	<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<a class="navbar-brand" href="#"><?php echo $_SESSION['admin']; ?></a>
	<ul class="nav navbar-nav">
		<li>
			<a href="index.php"><i class="glyphicon glyphicon-eye-open"></i>&nbsp;Users Overview</a>
		</li>
		<li>
			<a href="object.php"><i class="glyphicon glyphicon-fire"></i>&nbsp;Objects Overview</a>
		</li>
		<li  class="active">
			<a href="editCreateObjects.php"><i class="glyphicon glyphicon-bookmark"></i>&nbsp;Edit/Create objects</a>
		</li>
		<li>
			<a href="editCreateUsers.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Edit/Create users</a>
		</li>
		<li>
			<a href="emails.php"><i class="glyphicon glyphicon-envelope"></i>&nbsp;Emails</a>
		</li>
		<li>
			<a href="logout.php"><i class="glyphicon glyphicon-off"></i>&nbsp;Log Out</a>
		</li>
	</ul>
</nav><br><br><br><br>
	<div class="container">



	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<input type="hidden" name="id" id="inputId" class="form-control" value=" <?php echo $getObjectsData2['id']; ?> "><br>
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputName" class="col-sm-2">Name: </label>
<input type="text" name="name" id="inputName" class="form-control" value="<?php echo $getObjectsData2['naziv']; ?>" required="required" pattern="" title=""><br>

			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputCity" class="col-sm-2">City: </label>
			<input type="text" name="city" id="inputCity" class="form-control" value="<?php echo $getObjectsData2['grad']; ?>" required="required" pattern="" title=""><br>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputAddress" class="col-sm-2">Address: </label>
			<input type="text" name="address" id="inputAddress" class="form-control" value="<?php echo $getObjectsData2['adresa']; ?>" required="required" title=""><br>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputCountry" class="col-sm-2">Country: </label>
			<input type="text" name="country" id="inputCountry" class="form-control" value="<?php echo $getObjectsData2['drzava']; ?>" required="required" pattern="" title=""><br>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputCounty" class="col-sm-2">County: </label>

		<input type="text" name="county" id="inputCounty" class="form-control" value="<?php echo $getObjectsData2['zupanija'] ?>" required="required" title=""><br>	
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputPhone" class="col-sm-2">Contact/Phone: </label>

		<input type="tel" name="phone" id="inputPhone" class="form-control" value="<?php echo $getObjectsData2['telefon'] ?>" required="required" title=""><br>	
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>		
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputEmail" class="col-sm-2">Email: </label>

		<input type="email" name="email" id="inputEmail" class="form-control" value="<?php echo $getObjectsData2['email'] ?>" required="required" title=""><br>	
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputTimestamp" class="col-sm-2">Date: </label>

		<input type="text" name="timestamp" id="inputTimestamp" class="form-control" value="<?php echo $getObjectsData2['timestamp'] ?>" required="required" title=""><br>	
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputContacted" class="col-sm-2">Contacted: </label>

		<input type="text" name="contacted" id="inputContacted" class="form-control" value="<?php echo $getObjectsData2['contacted'] ?>" required="required" title=""><br>	
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
			<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputChecked" class="col-sm-2">Checked: </label>

		<select name="checked" id="inputChecked" class="form-control" required="required">

		<?php

			if ($getObjectsData2['checked']==1) {

				?>
				
				<option value="1" selected="selected">Yes</option>
				<option value="0">No</option>

				<?php

			}
			else
			{
				?>

				<option value="1">Yes</option>
				<option value="0" selected="selected">No</option>

				<?php 

			}

		 ?>

			</select><br>

		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<a href="editCreateObjects.php" type="button" class="btn btn-danger">Cancel</a>
			<button style="float:right;" type="button" onclick="updateObject();" class="btn btn-success">Save</button>
		</div>

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div><br><br><br>


	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

	<script>

	function updateObject(){

	var id = $("#inputId").val();
	var name = $("#inputName").val();
	var city = $("#inputCity").val();
	var address = $("#inputAddress").val();
	var email = $("#inputEmail").val();
	var phone = $("#inputPhone").val();
	var country = $("#inputCountry").val(); 
	var county = $("#inputCounty").val(); 
	var contact = $("#inputPhone").val(); 
	var date = $("#inputTimestamp").val();
	var contacted = $("#inputContacted").val();
	var checked = $("#inputChecked").val();  


	$.ajax({
		url: 'editObject2.php',
		type: 'POST',
		data: {

			id: id,
			name: name,
			city: city,
			address: address,
			email: email,
			phone: phone,
			country: country,
			county: county,
			contact: contact,
			date: date,
			contacted: contacted,
			checked: checked

		},
	})
	.done(function(data) {

		var data = parseInt(data);

		if (data == 1) {

			alert("Object sucessfully edited!");

			location.href = 'editCreateObjects.php'; 

		}

		else
		{

			alert("An error occured, try again!");
		}

	})
	.fail(function() {
		alert("An error occured, try again!");

	})
	.always(function() {

	});
	}

	</script>
</body>
</html>
