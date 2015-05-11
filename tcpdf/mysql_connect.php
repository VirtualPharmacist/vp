<?php
$ip="localhost";
$user="pgi";
$password="pgi123456";
$db="pgi";
$conn=mysql_connect($ip,$user,$password) or die("Cannot connect to server!".mysql_error());
mysql_select_db($db,$conn) or die("Cannot select database!".mysql_error());
?>

