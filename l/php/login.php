<?php 

session_start();
require_once('connections/db_connections.php');
//echo "okok";
if (isset($_POST['email']) && isset($_POST['password']))
{
	$username = $_POST['email'];
    $password = $_POST['password'];

   // echo "ok";
	
	mysql_select_db($database, $connect);
  
	//check login data
	$login = mysql_query(sprintf("SELECT id, email, password, usertype FROM users WHERE email='%s'
	         AND password='%s';", mysql_real_escape_string(trim($username)), mysql_real_escape_string(trim($password))));
   
    $check_login = mysql_num_rows($login);
  
	//if login data are correct, redirect to user home page
	if ($check_login > 0)
	{		
		$login2 = mysql_fetch_assoc($login);		
		
		//admin
		if ($login2['usertype'] == 1)
		{  		//echo 0;
			//declare session variables
			$_SESSION['admin'] = $login2['email'];
			$host=$_SERVER["HTTP_HOST"];
			$path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
			header("Location: http://$host$path/admin/index.php");
			exit;
		}
		//user	
		elseif ($login2['usertype'] == 2)
		{  		//echo 1;
			//declare session variables
			$_SESSION['user'] = $login2['email'];
			$_SESSION['user_id'] = $login2['id'];
			$host=$_SERVER["HTTP_HOST"];
			$path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
			header("Location: http://$host$path/user/index.php");
			exit;
		}
		else
		{
			$_SESSION['login_error'] = true;
			$host=$_SERVER["HTTP_HOST"];
			$path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
			header("Location: ../index.php");
			exit;
		}		
	}
	//set login error session and redirect to index.php
	else
	{
		$_SESSION['login_error'] = true;
		$host=$_SERVER["HTTP_HOST"];
		$path=rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
		header("Location: ../index.php");
		exit;
	}
}

?>