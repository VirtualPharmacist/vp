<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>extome analysis</title>
</head>
<?php $format=$_GET['format'];
$account=$_GET['account'];
$age=$_GET['age'];
$sex=$_GET['sex'];
$race=$_GET['race'];
$kg=$_GET['kg'];
$cm=$_GET['cm'];
$enzyme=$_GET['enzyme'];
$amiodarone=$_GET['amiodarone'];
 ?>
<body>
<font size="+1" color="#000000">Choose the files that you want to analyze</font>
<hr size="2" color="#BDBDBD" width="100%" />
<?php
$i=0;
$dir1 = opendir("./ftp");
while (($file = readdir($dir1)) !== false)
  {
	  if($file !=="."&&$file !=="..")
	  {
		  //echo $file;
		  if($account==$file)
		  {
			  $i++;
		  }

  	  }
  }
//echo $i;
closedir($dir1);
if($i!=0)
{
?>
　　　　<form action="jump.php?format=<?php echo $format; ?>&account=<?php echo $account; ?>&age=<?php echo $age ?>&sex=<?php echo $sex ?>&race=<?php echo $race ?>&cm=<?php echo $cm ?>&kg=<?php echo $kg ?>&enzyme=<?php echo $enzyme ?>&amiodarone=<?php echo $amiodarone; ?>" method="post" name="">
<?php
$dir = opendir("./ftp/".$account);
while (($file1 = readdir($dir)) !== false)
  {	  
      $tmp1 = explode('.',$file1);
	  $tmp2 = end($tmp1);
	  
	  $extension1=strtolower($tmp2);	  
	  if($file1 !=="."&&$file1 !==".."&&$extension1=='fq')
	  {
?>
<input type="checkbox" name="mycheckbox[]" value="<?php echo $file1; ?>" /><?php echo $file1."<br>"; ?>
<?php
  	  }
  }
    closedir($dir);
?>
<input type="submit" onclick="document.getElementById('asd1').style.visibility='visible'" vaue="Submit" name="Continue" />
</form>
<?php
}
if($i==0)
{
echo "incorrect account! Please input the account ID again!";	
}

?>
<div class="asd1" style="visibility:hidden"><b><font color="#FF0000"></font>It may takes a few hours for analyzing the data.You can close this window and we will send you an email when the analysis is done</b></div>
</body>
</html>