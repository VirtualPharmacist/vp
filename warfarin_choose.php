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
$genotype1=$_GET['genotype1'];
$genotype2=$_GET['genotype2'];
//$fcount=fopen("upload_file/warfarin_data/count.xls","a+");
$c12=0;
$c13=0;
$c22=0;
$c23=0;
$c33=0;
$v1=0;
$v2=0;

$v_unknown=0;
$c_unknown=0;

 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php

if($genotype2=="VKORC1 TT"){							
        
        $v1=1;
				
}
if($genotype2=="VKORC1 CT"){							
        
        $v2=1;
				
}



if($genotype1=="CYP2C9 *1*2"){$c12=1;				}
if($genotype1=="CYP2C9 *2*2"){$c22=1;				}
if($genotype1=="CYP2C9 *1*3"){$c13=1;  			}
if($genotype1=="CYP2C9 *3*3"){$c33=1;				}


if($genotype1=="CYP2C9 *2*3"){$c23=1;				}



if($race=="Asian"){$asian=1;}
if($race=="Black"){$african=1;}
if($race=="Unknown"){$un=1;}
if($enzyme=="YES"){$en=1;}
if($amiodarone=="YES"){$am=1;}
if($genotype2=="unknown"){$v_unknown=1;}
if($genotype1=="unknown"){$c_unknown=1;}
$result=5.6044-0.2614*(floor($age/10))+0.0087*$cm+0.0128*$kg-0.8677*$v2-1.6974*$v1-0.5211*$c12-0.9357*$c13-1.0616*$c22-1.9206*$c23-2.3312*$c33-0.1092*$asian-0.2760*$african-0.1032*$un+1.1816*$en-0.5503*$am-0.4854*$v_unknown-0.2188*$c_unknown;

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
.button
{
	font-family:Verdana, Geneva, sans-serif;
	padding:10px;
	height:40px;
	width:130px;
	background:#7DBBE3;
	font-size:18px;
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
      <p class="font">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your file code is:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font><?php echo $file_code ?></font></p>     
      <div class="meta"></div>
			</div>
</body>
<script src="./scripts/jquery-1.10.2.min.js"></script> 
<script language="javascript">
		$(".button").mouseover(function(){
			$(this).css({"font-weight":"bold"});
			$(this).css({"background":"#91C5E8"});
		});
		$(".button").mouseout(function(){
			$(this).css({"font-weight":"lighter"});
			$(this).css({"background":"#7DBBE3"});
		});
</script>
</html>
