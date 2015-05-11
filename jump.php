<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$format=$_GET["format"];
$account=$_GET['account'];
$value = $_POST['mycheckbox'];
$age=$_GET['age'];
$race=$_GET['race'];
$kg=$_GET['kg'];
$cm=$_GET['cm'];
$enzyme=$_GET['enzyme'];
$amiodarone=$_GET['amiodarone'];
//$email=$_GET['email'];
$num=0;
$num=count($value);
echo $num;
//echo $num;
if($num!==1&&$format=='one')
{
	echo 'You can just choose one file because you select single end analysis';
}
if($num!==2&&$format=='two')
{
	echo 'You can just choose two files because you select pair ends analysis';
}
if($num>2)
{
	echo 'You can just choose one or two files at a time';
}

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Analysis page</title>
</head>
<?php if(($format=='one'&&$num==1)||($format=='two'&&$num==2)) {?>
<p>We are analyzing your data, you can close the window after 3 seconds. We will inform your when the analysis has been done</p>
<script language="javascript" type="text/javascript">
setTimeout("javascript:location.href='post.php?format=<?php echo $format; ?>&account=<?php echo $account; ?>&mycheckbox1=<?php echo $value[0] ?>&mycheckbox2=<?php echo $value[1] ?>&age=<?php echo $age ?>&race=<?php echo $race ?>&cm=<?php echo $cm ?>&kg=<?php echo $kg ?>&enzyme=<?php echo $enzyme ?>&amiodarone=<?php echo $amiodarone; ?>'", 2000); 
</script
><?php }?>
<body>
</body>
</html>