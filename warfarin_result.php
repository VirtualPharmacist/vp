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
//$fcount=fopen("upload_file/warfarin_data/count.xls","a+");
$c12=0;
$c13=0;
$c22=0;
$c23=0;
$c33=0;
$v1=0;
$v2=0;
$v3=0;
$v_unknown=0;
$c_unknown=0;
$extension_primary="";
if((is_dir('./upload_file/warfarin_data/'.$file_code)) !== false)
{
	$dir_primary = opendir('./upload_file/warfarin_data/'.$file_code);
	
	while (($file_primary = readdir($dir_primary)) !== false)
	  {
		$extension_primary=strtolower(end(explode('.',$file_primary)));
	  	}


	if($extension_primary=='zip')
	{
	system('unzip -d ./upload_file/warfarin_data/'.$file_code.' ./upload_file/warfarin_data/'.$file_code.'/'.$file_code.'.zip');
	
	$dir = opendir('./upload_file/warfarin_data/'.$file_code);
	$file_final="";
	//列出 images 目录中的文件
		while (($file = readdir($dir)) !== false)
		{
			$extension=strtolower(end(explode('.',$file)));
			if($extension=='txt')
			{
				$file_final=$file;
				}
			}
	
		system('mv ./upload_file/warfarin_data/'.$file_code.'/'.$file_final.' ./upload_file/warfarin_data/'.$file_code.'/'.$file_code.'.txt');
			//echo 'mv /var/www/helab/pgi/upload_file/tmp_data/'.$file_code.'/'.$file_final.' /var/www/helab/pgi/upload_file/tmp_data/'.$file_code.'/'.$file_code.'.txt';
		closedir($dir);
		
		//echo $file_final;//检验是否捕捉到了制定的扩
		}
	}
 ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$file_list="";
$file="";	
if((file_exists('./upload_file/warfarin_data/'.$file_code."/".$file_code.".txt")) !== false)
{
	$file = "upload_file/warfarin_data/".$file_code."/".$file_code.".txt";			
	// read the file
	
	$file_list = file_get_contents($file);							//用file_get_contents()获取txt文件的全部字符串
	//var_dump($file_list);
	}
if($format=="23andme"){$file_list = preg_replace("/\s\d*\s\d*\s/","t",$file_list);	//将有“空字符+任意数字+空字符+任意数字+空字符”的字符串 用t来替代
$cyp2c91="rs1799853tCT";			//*1*2		
$cyp2c92="rs1799853tTT";			//*2*2		//朱校长有
$cyp2c93="rs1057910tAC";			//*1*3		//朱校长有
$cyp2c94="rs1057910tCC";			//*3*3
$cyp2c95="rs1057910tAA";			//野生型
$cyp2c96="rs1799853tCC";			//野生型		


$vkorc1="rs9923231tTT";			//AA
$vkorc2="rs9923231tCT";
$vkorc3="rs9923231tCC";			//AG
$vkorc4="rs9923231tTC";
}	
if($format=="Affymetrix")
{
$cyp2c91="rs1799853tCT";			//*1*2		
$cyp2c92="rs1799853tTT";			//*2*2		//朱校长有
$cyp2c93="rs1057910tAC";			//*1*3		//朱校长有
$cyp2c94="rs1057910tCC";			//*3*3
$cyp2c95="rs1057910tAA";			//野生型
$cyp2c96="rs1799853tCC";			//野生型		


$vkorc1="rs9923231tTT";			//AA
$vkorc2="rs9923231tCT";
$vkorc3="rs9923231tCC";			//AG
$vkorc4="rs9923231tTC";
}
if($format=="ftdna")
{
$file_list = preg_replace("/\"\,\"\d*\"\,\"\d*\"\,\"/","t",$file_list);
$cyp2c91="rs1799853\tCT";			//*1*2		
$cyp2c92="rs1799853\tTT";			//*2*2		//朱校长有
$cyp2c93="rs1057910\tAC";			//*1*3		//朱校长有
$cyp2c94="rs1057910\tCC";			//*3*3
$cyp2c95="rs1057910\tAA";			//野生型
$cyp2c96="rs1799853\tCC";			//野生型		


$vkorc1="rs9923231\tTT";			//AA
$vkorc2="rs9923231\tCT";			//AG	
$vkorc3="rs9923231\tCC";
$vkorc4="rs9923231\tTC";
}
if($format=="deCODEme")
{
$file_list = str_replace("/","",$file_list);	
$cyp2c91="rs1799853,CT";			//*1*2		
$cyp2c92="rs1799853,TT";			//*2*2		//朱校长有
$cyp2c93="rs1057910,AC";			//*1*3		//朱校长有
$cyp2c94="rs1057910,CC";			//*3*3
$cyp2c95="rs1057910,AA";			//野生型
$cyp2c96="rs1799853,CC";			//野生型		


$vkorc1="rs9923231,TT";			//AA
$vkorc2="rs9923231,CT";			//AG
$vkorc3="rs9923231,CC";	
$vkorc4="rs9923231,TC";
}
$asian=0;
$african=0;
$un=0;
$en=0;
$am=0;


$genotype1="unknown";
$genotype2="unknown";
$flag = 0;

//mysql_close($conn);



$count=0;																			//用来判断搜索结果为2，1，0；
$cyp2c91_index = strpos($file_list,$cyp2c91);		//strpos(string,find,start) string：字典；find：要查的字符；start：开始查询的位置（默认为文件开头）.返回第一个字符串所在的位置，如果没有对应字符串，则返回false
$cyp2c92_index = strpos($file_list,$cyp2c92);	
$cyp2c93_index = strpos($file_list,$cyp2c93);	
$cyp2c94_index = strpos($file_list,$cyp2c94);	
$cyp2c95_index = strpos($file_list,$cyp2c95);
$cyp2c96_index = strpos($file_list,$cyp2c96);
$vkorc1_index = strpos($file_list,$vkorc1);	
$vkorc2_index = strpos($file_list,$vkorc2);
$vkorc3_index = strpos($file_list,$vkorc3);	

if($vkorc1_index !== false){							
        
        $v1=1;
				$genotype1="VKORC1  TT";
}
if($vkorc2_index !== false){							
        
        $v2=1;
				$genotype1="VKORC1  CT";
}

/*if($vkorc4_index !== false){							
        
        $v2=1;
				$genotype1="VKORC1  CT";
}
*/
if($vkorc3_index !== false)
{
	$genotype1="widetype";	
}
if($cyp2c91_index !== false&&$cyp2c95_index !== false){$c12=1;				$genotype2="CYP2C9  *1/*2";}
if($cyp2c92_index !== false&&$cyp2c95_index!==false){$c22=1;				$genotype2="CYP2C9  *2/*2";}
if($cyp2c93_index !== false&&$cyp2c96_index !==false){$c13=1;  			$genotype2="CYP2C9  *1/*3";}
if($cyp2c94_index !== false&&$cyp2c96_index !==false){$c33=1;				$genotype2="CYP2C9  *3/*3";}


if($cyp2c91_index !== false&&$cyp2c93_index !== false){$c23=1;				$genotype2="CYP2C9  *2/*3";}

if($cyp2c95_index !== false&&$cyp2c96_index !==false){$genotype2="CYP2C9 *1/*1";}

if($race=="Asian"){$asian=1;}
if($race=="Black"){$african=1;}
if($race=="Unknown"){$un=1;}
if($enzyme=="YES"){$en=1;}
if($amiodarone=="YES"){$am=1;}
if($genotype1=="unknown"){$v_unknown=1;}
if($genotype2=="unknown"){$c_unknown=1;}
$result=5.6044-0.2614*(floor($age/10))+0.0087*$cm+0.0128*$kg-0.8677*$v2-1.6974*$v1-0.5211*$c12-0.9357*$c13-1.0616*$c22-1.9206*$c23-2.3312*$c33-0.1092*$asian-0.2760*$african-0.1032*$un+1.1816*$en-0.5503*$am-0.4854*$v_unknown-0.2188*$c_unknown;
//fwrite($fcount,$c12."\t".$c13."\t".$c22."\t".$c23."\t".$c33."\t".$v1."\t".$v2."\n");
//fclose($fcount);

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
      <li class="font">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CYP2C9:&nbsp;&nbsp;&nbsp;<font><?php echo $genotype2 ?></font></li>
      <hr size="1" color="#FAFF8A" /> 
      <li class="font">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VKORC1:&nbsp;&nbsp;&nbsp;<font><?PHP echo $genotype1 ?></font></li>

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
