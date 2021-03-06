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
		<li  class="active">
			<a href="object.php"><i class="glyphicon glyphicon-fire"></i>&nbsp;Objects Overview</a>
		</li>
		<li>
			<a href="editCreateObjects.php"><i class="glyphicon glyphicon-bookmark"></i>&nbsp;Edit/Create objects</a>
		</li>
		<li >
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
			<input class="form-control" value="02-16-2012" id="dp1" placeholder="from..." type="text">
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<input class="form-control" value="02-16-2012" id="dp21" placeholder="to..." type="text">
		</div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
<div class="checkbox">
	<label>
		<input id="checked" type="checkbox" value="">
		Checked
	</label>
</div>
</div>
<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
	<button type="button" class="btn btn-default">GO!</button>
</div>

	</div><br>
	<div class="row">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th>Objects checked <span id="totals"></span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			
		</div>
	</div>
		<div class="row">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
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
				</tr>
			</thead>
			<tbody id="table_rows">

			</tbody>
		</table>
	</div>
		
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
       <script src="../../js/bootstrap-datepicker.js"></script>
	<script>

function counter()
{

	var from = $("#dp1").val();
	var to = $("#dp21").val();

	$.ajax({
		url: 'counter.php',
		type: 'POST',
		data: {from: from, to: to}
	})
	.done(function(data) {
		$("#totals").html(data);
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	

}

function getObjects(arg) 
{

	var date_from = $("#dp1").val();
	var date_to = $("#dp21").val();

	var checked = $("#checked").prop('checked');

	if (checked) {

		checked = 1;
	}
	else {

		checked = 0;
	}

	arg = $("#inputSearch").val();

	$.ajax({
		url: 'getObjects.php',
		type: 'POST',
		data: { from: date_from, checked: checked, to: date_to, string: arg},
	})
	.done(function(data) {
		$("#table_rows").html(data);
		counter();
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}	


	if (top.location != location) {
    top.location.href = document.location.href ;
  }
		$(function(){
			window.prettyPrint && prettyPrint();
			$('#dp1').datepicker({
				format: 'mm-dd-yyyy'
			});
			$('#dp21').datepicker({
				format: 'mm-dd-yyyy'
			});
			$("#dp1").val("");
			$("#dp21").val("");
		});

$(document).ready(function() {
	getObjects();

	$("#dp1").val("");
	$("#dp21").val("");
});

	</script>
</body>
</html>
