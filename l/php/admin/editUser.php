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

$userid = mysql_real_escape_string(trim($_GET['id']));

$getUserData = mysql_query("SELECT * FROM users WHERE id = ".$userid." LIMIT 1;");

$getUserData2 = mysql_fetch_assoc($getUserData);

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
		<li>
			<a href="editCreateObjects.php"><i class="glyphicon glyphicon-bookmark"></i>&nbsp;Edit/Create objects</a>
		</li>
		<li class="active">
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

		<input type="hidden" name="id" id="inputId" class="form-control" value=" <?php echo $getUserData2['id']; ?> "><br>
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputId" class="col-sm-2">Name: </label>
<input type="text" name="name" id="inputName" class="form-control" value="<?php echo $getUserData2['name']; ?>" required="required" pattern="" title=""><br>

			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputLastname" class="col-sm-2">Lastname: </label>
			<input type="text" name="lastname" id="inputLastname" class="form-control" value="<?php echo $getUserData2['lastname']; ?>" required="required" pattern="" title=""><br>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputEmail" class="col-sm-2">Email: </label>
			<input type="email" name="email" id="inputEmail" class="form-control" value="<?php echo $getUserData2['email']; ?>" required="required" title=""><br>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<label for="inputPassword" class="col-sm-2">Password: </label>
			<input type="text" name="password" id="inputPassword" class="form-control" value="<?php echo $getUserData2['password']; ?>" required="required" pattern="" title=""><br>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputPhone" class="col-sm-2">Contact/Phone: </label>

		<input type="tel" name="phone" id="inputPhone" class="form-control" value="<?php echo $getUserData2['contact'] ?>" required="required" title=""><br>	
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

		<label for="inputUsertype" class="col-sm-2">Usertype: </label>

		<select name="usertype" id="inputUsertype" class="form-control">

		<?php if ($getUserData2['usertype']==1) {
			
			?>

			<option value="1" selected="selected">Admin</option>
			<option value="2">User</option>

			<?php

		}
		else{
			?>

			<option value="1">Admin</option>
			<option value="2" selected="selected">User</option>
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
			<a href="editCreateUsers.php" type="button" class="btn btn-danger">Cancel</a>
			<button style="float:right;" type="button" onclick="updateUser();" class="btn btn-success">Save</button>
		</div>

		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>


	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

	<script>

	function updateUser(){

	var id = $("#inputId").val();
	var name = $("#inputName").val();
	var lastname = $("#inputLastname").val();
	var password = $("#inputPassword").val();
	var email = $("#inputEmail").val();
	var phone = $("#inputPhone").val();
	var usertype = $("#inputUsertype").val(); 

	$.ajax({
		url: 'editUser2.php',
		type: 'POST',
		data: {

			id: id,
			name: name,
			lastname: lastname,
			password: password,
			email: email,
			phone: phone,
			usertype: usertype

		},
	})
	.done(function(data) {

		var data = parseInt(data);

		if (data == 1) {

			alert("User sucessfully edited!");

			location.href = 'editCreateUsers.php'; 

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
