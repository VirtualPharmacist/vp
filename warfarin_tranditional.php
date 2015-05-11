<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
$format=$_GET['format'];
$file_code =  $_GET["file_code"];		//获取到文件名（来自index的form标签）
$age=$_GET['age'];
//$sex=$_GET['Sex'];
$race=$_GET['Race'];
$kg=$_GET['kg'];
$cm=$_GET['cm'];
$enzyme=$_GET['Enzyme'];
$amiodarone=$_GET['Amiodarone'];
$african=0;
$asian=0;
$un=0;
$en=0;
$am=0;
$genotype1="unknown";
$genotype2="unknown";
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php


if($race=="Asian"){$asian=1;}
if($race=="Black"){$african=1;}
if($race=="Unknown"){$un=1;}
if($enzyme=="YES"){$en=1;}
if($amiodarone=="YES"){$am=1;}

$result=4.0376-0.2546*(floor($age/10))+0.00118*$cm+0.0134*$kg-0.6752*$asian+0.4060*$african+0.443*$un+1.2799*$en-0.5695*$am;

?>
<style>
ul
{
	list-style:none;
}
body
{
	overflow:none;
	color:#FFF;
}
h3
{
	font-family:Verdana, Geneva, sans-serif;

}
.font
{
	color:;
	font-size:16px;
	font-family:Verdana, Geneva, sans-serif;
	
	padding-bottom:3px;
	border-bottom-color:#76B7E2;
	border-bottom-width:thin;

}
.meta
{
	height:5px;
	border-bottom: 1px dotted #66F; 	
}
body
{
	background:url(images/20101002201059574.jpg)
}

</style>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php include("title.php") ?>
<meta name="keywords" content="" />
<meta name="description" content="" />

</head>
<body>	
			<div class="entry">
			
			<b><p class="font" align="left">Your dosage of warfarin<font color="#FF4242" style="font-weight:bolder"> <?php echo round($result*$result, 0);	?>mg/week</font></p></b>			
<br />
      <p class="font">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your genotype related to warfarin:</p> 
      <ul>
      <li class="font">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CYP2C9:&nbsp;&nbsp;&nbsp;<font><?php echo $genotype1 ?></font></li>
      <hr size="1" color="#FAFF8A" /> 
      <li class="font">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VKORC1:&nbsp;&nbsp;&nbsp;<font><?PHP echo $genotype2 ?></font></li>

      <hr size="1" color="#FAFF8A" />      
      </ul>
      <br />
     
      <div class="meta"></div>
			</div>
</body>

</html>
