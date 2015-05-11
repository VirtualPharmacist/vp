<?php
$ip="localhost";
$user="vp";
$password="vp123456";
$db="vp";
$conn=mysql_connect($ip,$user,$password) or die("Cannot connect to server!".mysql_error());
mysql_select_db($db,$conn) or die("Cannot select database!".mysql_error());
?>

