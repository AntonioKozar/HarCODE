<?php 

session_start();

//admin
if (isset($_SESSION['admin']))
{   
    $host=$_SERVER["HTTP_HOST"];
    $path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
    header("Location: http://$host$path/php/admin/");
    exit;
}
//user
if (isset($_SESSION['user']))
{   

    $host=$_SERVER["HTTP_HOST"];
    $path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
    header("Location: http://$host$path/php/user/");
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="row">
    	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    		
    	</div>
    	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><br>
    	<?php if (isset($_SESSION['login_error'])) 
            {
            	?>

            		<div class="alert alert-danger">
            			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            			<strong>Error!</strong> Username or password is incorrect ...
            		</div>

            	 <?php
            } ?>
    	</div>
    	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    		
    	</div>
    </div>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <form class="form-signin" role="form" method="POST" action="php/login.php"><br><br>
                    <h2 class="form-signin-heading">Login</h2><br>
                    <input type="email" class="form-control" placeholder="Email..." name="email" required autofocus><br>
                    <input type="password" class="form-control" placeholder="Password..." name="password" required><br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </form>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            </div>
        </div>
    </div>
    </div>
    <!-- /container -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
