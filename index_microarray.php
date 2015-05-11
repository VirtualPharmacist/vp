<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>


<style>
#asd1
{
	font-size:18px;
	color:#F00;
	visibility:hidden;
	
}
.LingJiCaiDan,.LingJiCaiDan1
{
	background:#B7D8F2;
	margin-bottom:0px;
	margin-top:0px;
	height:32px;
	font-size:20px;
	font-weight:bold;
	color:#000;
	font-weight:bold;
	padding-left:5px;
	margin-bottom:1px;
	
}
#hide
{
	
	margin:0px;
	padding:0px;
	border-left-style:dotted;
	border-right-style:dotted;
	border-bottom-style:dotted;
	border-width:thin;
	
}
.click
{
	width:970px;
	color:#FFF;
	background:#BADBF1;
	border-bottom:0px;
	border-top:0px;
	padding-bottom:0px;
	padding-top:0px;
	padding-left:0px;
	
	margin:0px;
}
.textfield
{
	width:90px;
	height:30px;
}
.textfield1
{
	width:250px;
	height:35px;
}
.format
{
	font-size:16px;
}
.post1{
	padding-left:220px;
}
</style>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php include("title.php") ?>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->
<link rel="stylesheet" href="css/components/jquery.fancybox-1.3.1.css" type="text/css" media="screen" />
<?php
$page_title="VP - Virtual Pharmacist";
function generate_password($length) {  
// 密码字符集，可任意添加你需要的字符  
$chars = 'abcdfghijklmnopqrstuvwxyz0123456789';  
$password ="";  
for ( $i = 0; $i < $length; $i++ )  
{  
// 这里提供两种字符获取方式  
// 第一种是使用 substr 截取$chars中的任意一位字符;  
// 第二种是取字符数组 $chars 的任意元素  
// $password .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);  
$password .= $chars[ mt_rand(0, strlen($chars) - 1) ];  
}

return $password;  
}
$file_code = generate_password(12);
include("upload_js.php");
?>
<script>

function tijiao()
{
	var stage='create';
	//if(document.getElementById("r31").checked){stage="create";}
	//if(document.getElementById("r32").checked){stage="done";}
	var mail="mail="+document.form11.mail.value;
	window.open("email.php?"+mail+"&stage="+stage, "Choose your extrome file", "height=300, width=500, top=200, left=470, toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, status=0",false);

	
}
function tijiao1()
{
	var format="";
	if(document.getElementById("r11").checked){format="one";}
	if(document.getElementById("r22").checked){format="two";}
	//document.getElementById('asd1').style.visibility='visible';
	var account="account="+document.form22.account.value+"&format="+format;
	window.open("unzip.php?"+account, "Choose your extrome file", "height=300, width=500, top=200, left=470, toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, status=0",false);
	
}
</script>
</head>

<body>
<!-- start header -->
<?php 
include("head.php");
?>
<!-- end header -->


<!-- start menu -->
<?php include("navbar.php"); ?>
<!-- end menu -->


<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<h1 class="pagetitle"> </h1>
		
		
		<div class="post">
			<h2 class="title"><font color="#000000">	VP: Virtual Pharmacist</font></h2>

			<div class="entry">
			  <p><b>&nbsp;&nbsp;Virtual Pharmacist</b> is a web tool that interprets personal genome for the impact of genetic variation on drug response. It can take variants data (VCF format),  microarray SNP genotyping data  and high-throughput sequencing data as input, and report to the users how the variants in their personal genomes impact their drug response, including drug efficacy, dosage and toxicity. <p class="meta">&nbsp;&nbsp;&nbsp; <a href="user_guide.php" class="comments"  target="_blank">More information</a></p>
                </p>

			</div>
		</div>

 <div class="post" align="left">


<?php include('multiple.php') ?>
<p class="LingJiCaiDan1">Variants data analysis (VCF format)
</p>
   <p class="LingJiCaiDan">Microarray data analysis</p>
<div class="post1">
<form  action="upload_jump.php" method="get" enctype="multipart/form-data" >

    <font size="3"><b style="margin-left: 0px;">Run the Virtual Pharmacist:</b></font> 

        <a target="Help" onclick="window.open(this.href,'Help')" href="user_guide.php#upload"><img border="0" alt="?" src="images/help.png"></a>
    
    <br>
		<br />
	<font size="2">



	<font size="3">Email(optional):&nbsp;</font>

	<font size="2">
        <input type="text" value="" maxlength="50" size="30" name="email">   </font>
        <font size="2" style="color:rgb(200,50,50);"></font>
	</font>
<br />
      Please upload your genotype file:
            <a target="Help" href="user_guide.php#q2.1.3"><img border="0" alt="?" src="images/help.png"></a>
        </font>

    <font size="-1"> please upload <font color="#FF0000">*.zip</font> format of SNP data(*.zip will be much faster)</font>
    <br />
<div class="format">Choose your file format:
<br />
<input type="radio" name="format" value="23andme" checked>
23andme(<a href="download.php?code=example" target="_blank" >example_for_23andme.zip</a>)
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
<input type="radio" name="format" value="Affymetrix">Affymetrix(<a href="download.php?code=example2" target="_blank" >example_for_affy.zip</a>)
<Br />
<input type="radio" name="format" value="deCODEme">
deCODEme(<a href="download.php?code=example3" target="_blank" >example_for_deCODEme.zip</a>)
<input type="radio" name="format" value="ftdna">Family Tree(<a href="download.php?code=example4" target="_blank" >example_for_ftdna.zip</a>)
 </div>
    (<a href="user_guide.php#2_2">What is the meaning of "Upload Error:500"?</a>)
<br />
<br /> 
	<div class="fieldset flash" id="fsUploadProgress">
    
	<span class="legend">Upload file</span>
	</div>
	<div id="divStatus"><p></p></div>
	<div>
    <br />
	<span id="spanButtonPlaceHolder"></span>&nbsp;&nbsp;
	<input id="btnCancel" type="button" value="&nbsp;&nbsp;Cancel&nbsp;&nbsp;" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
	</div>
        <font size="2" style="color:rgb(200,50,50);">&nbsp;
        </font>

	<input type="hidden" name="file_code" id="file_code" value="<?php echo $file_code;?>" />
<!-- fileid get form the upload.php-->
  <br>
	<input type="submit" onclick="document.getElementById('asd').style.visibility='visible'" value="&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;
    <br />
(<a href="download2.php?code=example">Click here to find an example of output</a>)	
	<br><br>
 <p id="asd">This program may take up to 2 minutes to process your data</p>   
 
</form>  

 </div>
 <p class="LingJiCaiDan">High-throughput sequencing data analysis</p>
 <div class="post1">
 <strong><font color="#25939E" size="+1">Step one: Upload your High-throughput sequencing data through FTP</font></strong> 
 <br />

	
<form name="form11" action="" method="get">
<font size="3">Email:&nbsp;&nbsp;<font color="#FF0000" size="+3">*&nbsp;&nbsp;</font> &nbsp;&nbsp;&nbsp;</font>
        <input type="text" value="" maxlength="50" size="30" name="mail">   
  
  <!--<input type="radio" id="r31" name="stage"  value="create" checked/>Get FTP account --> 
 		<input type="button" onclick="tijiao()" value="&nbsp;&nbsp;&nbsp;&nbsp;Go&nbsp;&nbsp;&nbsp;&nbsp;" name="Go">
</form>

 <font size="-1">Please provide your email, a ftp account will be generated for you</font>
 <br />
 <br />
  <strong><font color="#25939E" size="+1">Step two: choose your data for analysis</font></strong> 
 <br />
  please indicate the type of data
  <Br />
<form name="form22" action="" method="get">
<input type="radio" name="format1" value="one" id="r11" checked>
Single end data
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
<input type="radio" name="format1" value="two" id="r22">Pair end data
<BR />
<font size="3">FTP account<font color="#FF0000" size="+3">*&nbsp;&nbsp;</font></font>
        <input type="text" value="test" maxlength="50" size="30" name="account"> 
        <font size="-1">(Provide your FTP account to find your data in our server)</font><br>
        <input type="button" onclick="tijiao1()" value="&nbsp;&nbsp;&nbsp;Browse&nbsp;&nbsp;&nbsp;" name="Browse">  
<Br />

</form> 
(First time user? click here to download a <a href="download2.php?code=example&file=2">sample of input file</a> and <a href="download2.php?code=example&file=1">output result</a>)
<!--<p id="asd1">Upload the data file to the microarray pattern to see the final result!</p>   -->
 </div>

        </div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
		<?php include 'sidebar.php'; ?>
	<!-- end sidebar -->
  
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<?php 
include("foot.php");?>
</body>
<script src="./scripts/jquery-1.10.2.min.js"></script> <!-- 以后不能再忘了 用JQuery时 一定要调用google的包！！！ -->
<script>
     $(".LingJiCaiDan").click(function () {
      $(this).next().slideToggle("slow");		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
     $(".LingJiCaiDan").mouseover(function () {
      $(this).css({"background":"#91C5E8"});		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
     $(".LingJiCaiDan").mouseout(function () {
      $(this).css({"background":"#B7D8F2"});		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
     $(".LingJiCaiDan1").mouseover(function () {
      $(this).css({"background":"#91C5E8"});		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
     $(".LingJiCaiDan1").mouseout(function () {
      $(this).css({"background":"#B7D8F2"});		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
     $(".LingJiCaiDan1").click(function () {
      window.open("index.php","_self");		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });		
</script>
</html>
