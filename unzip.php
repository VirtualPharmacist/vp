<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
.hide1231
{
	visibility:hidden;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>extome analysis</title>
</head>
<?php $format=$_GET['format'];
$account=$_GET['account'];
$age=$_GET['age'];
$sex=$_GET['Sex'];
$race=$_GET['Race'];
$kg=$_GET['kg'];
$cm=$_GET['cm'];
$enzyme=$_GET['Enzyme'];
$amiodarone=$_GET['Amiodarone'];
?>
<body>
<font size="+1" color="#000000">We are unzipping your data please wait...</font>
<?php
$i=0;
$zip_name="";
$dir1 = opendir("./ftp/".$account);
if(is_dir("./ftp/".$account))
{
        //echo '目录不存在！';

while (($file = readdir($dir1)) !== false)
  {
	$extension=strtolower(end(explode('.',$file)));
	  if($file !=="."&&$file !=="..")

	  if($extension=="zip")
	  {
		  $zip_name=$file;
		  system('nohup unzip -d ./ftp/'.$account.' ./ftp/'.$account.'/'.$zip_name.' &');
	  }
  }
}
else
{
	echo "The ftp account doesn't exist, please input the valid account!";
}
//echo $i;
closedir($dir1); ?>
<p class="hide1231">
<?php

?>
</p> 
<script language="javascript" type="text/javascript">
setTimeout("javascript:location.href='extrome_analysis.php?account=<?php echo $account ?>&format=<?php echo $format ?>&age=<?php echo $age ?>&sex=<?php echo $sex ?>&race=<?php echo $race ?>&cm=<?php echo $cm ?>&kg=<?php echo $kg ?>&enzyme=<?php echo $enzyme ?>&amiodarone=<?php echo $amiodarone; ?>'", 100); 
</script> 
<?php
/*if($i!=0)
{
?>
　　　　<form action="post.php?format=<?php echo $format; ?>&account=<?php echo $account; ?>&email=<?php echo $email; ?>" method="post" name="">
<?php
$dir = opendir("/var/www/helab/pgi/ftp/".$account);
while (($file1 = readdir($dir)) !== false)
  {
	  $extension1=strtolower(end(explode('.',$file1)));
	  if($file1 !=="."&&$file1 !==".."&&$extension1=='zip')
	  {
?>
<input type="checkbox" name="mycheckbox[]" value="<?php echo $file1; ?>" /><?php echo $file1."<br>"; ?>
<?php
  	  }
  }
    closedir($dir);
?>
<input type="submit" vaue="hheheeh" name="Continue" />
</form>

<?php
}
if($i==0)
{
echo "incorrect account! Please input the account ID again!";	
}
*/
?>

</body>
</html>