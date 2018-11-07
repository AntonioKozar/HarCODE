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
		<li class="active">
			<a href="editCreateObjects.php" ><i class="glyphicon glyphicon-bookmark"></i>&nbsp;Edit/Create objects</a>
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
			<input type="search" name="search" id="inputSearch" class="form-control" onkeyup="getObjects(this.value)" value="" placeholder="search..." title="">
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
		</div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

</div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
<a href="newObject.php" type="button" class="btn btn-primary">Add New Object <i class="glyphicon glyphicon-plus-sign"></i></a>
</div>
	</div><br>
		<div class="row">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Edit</th>
					<th>Name</th>
					<th>City</th>
					<th>Address</th>
					<th>Country</th>
					<th>County</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Checked</th>
					<th>Date checked</th>
					<th>Checked by user</th>
					<th>Remove</th>
				</tr>
			</thead>
			<tbody id="table_rows">

			</tbody>
		</table>
	</div>
		
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

	<script>

function removeObject(id)
	{

		var yesno = confirm("Are you sure you want to remove selected User?");

		if (yesno) {

		$.ajax({
			url: 'removeObject.php',
			type: 'POST',
			data: {id: id},
		})
		.done(function(data) {
			var data = parseInt(data);
			if (data == 1) {
				alert("User successfully removed!");

			}
			else {
				alert("An error occured please try again!");
			}
			console.log("success");
		})
		.fail(function() {
			alert("An error occured please try again!");
		})
		.always(function() {
			
		});
		
	} else {


	}
}



function editObject(id){

	location.href = 'editObject.php?id='+id;

}

function getObjects(arg) 
{

	arg = $("#inputSearch").val();

	$.ajax({
		url: 'getObjectsEdit.php',
		type: 'POST',
		data: { string: arg},
	})
	.done(function(data) {
		$("#table_rows").html(data);
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}	

$(document).ready(function() {
	getObjects();
});

	</script>
</body>
</html>
