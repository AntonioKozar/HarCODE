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

$getMail = mysql_query("SELECT * FROM emails WHERE id=1;");

$getMail2 = mysql_fetch_assoc($getMail);


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
		<li  >
			<a href="object.php"><i class="glyphicon glyphicon-fire"></i>&nbsp;Objects Overview</a>
		</li>
		<li>
			<a href="editCreateObjects.php"><i class="glyphicon glyphicon-bookmark"></i>&nbsp;Edit/Create objects</a>
		</li>
		<li >
			<a href="editCreateUsers.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Edit/Create users</a>
		</li>
		<li class="active">
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
				<input type="text" name="title" id="inputTitle" class="form-control" value=" <?php echo $getMail2['title']; ?> " required="required" pattern="" title="">
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<textarea rows="8" cols="25" name="mail" id="inputMail" class="form-control" value="<?php echo $getMail2['text']; ?>" required="required" pattern="" title=""><?php echo $getMail2['text']; ?></textarea>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				
			</div>
		</div><br>
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<button type="button" style="float: right;" class="btn btn-success" onclick="saveEmail();">Save</button>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				
			</div>
		</div>
		
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
       <script src="../../js/bootstrap-datepicker.js"></script>
	<script>

function saveEmail(){

	var email = $("#inputMail").val();
	var title = $("#inputTitle").val();

	$.ajax({
		url: 'saveEmail.php',
		type: 'POST',
		data: {email: email, title: title},
	})
	.done(function(data) {
		var data = parseInt(data);

		if(data == 1){

			alert("Email updated successfully!");

		}
		else {

			alert("An error occured, please try again!");

		}

		console.log("success");
	})
	.fail(function() {
		alert("An error occured, please try again!");
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	

}

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
