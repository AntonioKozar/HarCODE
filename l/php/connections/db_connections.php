<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
//$hostname = "www.harcode.com";
$hostname = "localhost";
$database = "harcode_ljekarne";
$username = "harcode_ljekarne";
$password = "crashoverride";
$connect = mysql_connect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES 'utf8'", $connect); 


?>