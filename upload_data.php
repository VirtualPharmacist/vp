<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
$dirname = $_GET["project_name"];
$filename = "./upload_file/project/".$dirname."/";
$file_code = $dirname;

if(!empty($dirname)){
	if($file_code!="test"){
		if(file_exists($filename)){system("rm -rf $filename");}
		system("mkdir $filename");		
		}


	}


include("upload3_js.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style>
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
.btn {
  background: #3498db;
  background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
  background-image: -moz-linear-gradient(top, #3498db, #2980b9);
  background-image: -ms-linear-gradient(top, #3498db, #2980b9);
  background-image: -o-linear-gradient(top, #3498db, #2980b9);
  background-image: linear-gradient(to bottom, #3498db, #2980b9);
  -webkit-border-radius: 8;
  -moz-border-radius: 8;
  border-radius: 8px;
  font-family: Arial;
  color: #ffffff;
  font-size: 25px;
  padding: 10px 40px 10px 40px;
  text-decoration: none;
  alignment-adjust:central;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
  alignment-adjust:central;  
}
h2
{
	font-weight:900;
	
}
.button
{
	width:180px;
}
.caidan
{
	width:90px;
	height:35px;
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

	font-size:24px;
	width:970px;
	color:#FFF;
	background:#BADBF1;
	border-bottom:0px;
	border-top:0px;
	padding-bottom:0px;
	padding-top:0px;
	padding-left:0px;
	font-weight:900;
	
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
.caidan1
{
	width:150px;
	height:35px;
}
.chart
{
	padding-left:0px;
}
.charttitle
{
	font-weight:900;
	padding-left:19px;
	color:#FFF;
	background:#D1CEF7;
}
.hehe
{
	list-style:none;
}
.post1{
	padding-left:220px;
}
</style>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>VP: Virtural Pharmacist</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->

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


		<h4 class="pagetitle"></h4>
		<!--<a href="#" id="rss-posts">RSS Feeds</a>-->
		
		<div class="post">

		<h2 class="title">Multiple sample uploading interface</h2>
		<div class="entry">
		<p>&nbsp;&nbsp;<b>&nbsp;&nbsp;Virtual Pharmacist</b> provides the service of multiple samples analysis. It can implement a statistics of drug response of SNPs in population. Besides, we will provide the SAMPLE-DRUG relation matrix for you to do the further research.</p>
			<p class="meta">&nbsp;&nbsp;&nbsp; </p>
		</div>
		<?php
		if (file_exists($filename)&&!empty($_GET["project_name"])&&$file_code!="test") {
			#mkdir($filename, 0777);
			#echo "The directory $dirname was successfully created.";
			#exit;
			?>
			<div class="entry">
            <br />
			<strong><font color="#25939E" size="+1">Step two: upload your multiple samples data</font></strong>
<br />
<br />
           
<div class="post1">
<form  action="analysis_vcf.php" method="get" enctype="multipart/form-data" >

    <font size="3"><b style="margin-left: 0px;">Run the Virtual Pharmacist:</b></font> 

        <a target="Help" onclick="window.open(this.href,'Help')" href="user_guide.php#upload"><img border="0" alt="?" src="images/help.png"></a>
    
    <br>

	<font size="2">



	


<br />
      Please compress your variants data files in a <font color="#FF0000">*.zip</font> format and upload it
      <br>
      so as to confirm the uploading speed and save your time
            <a target="Help" href="user_guide.php#q2.1.1"><img border="0" alt="?" src="images/help.png"></a>
        </font>
        <br>


    
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
	<input type="submit" id="show" value="&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;
    
</form>  
<p>(<a href="./upload_file/test.zip">Download demo multiple sample VCF data</a> )</p>
<p class="asd">This program may take up to several minutes to process your data</p>
 
</div>
  			<div align="center" class="asd">
 				<img src ="./images/5-121204193R0-50.gif" />
 				</div> 	           
			</div>
<br /><Br /><br /><br /><br />
			<p class="meta">&nbsp;&nbsp;&nbsp; <a href="user_guide.php#drug_response" class="comments">Help</a></p>
<?php } else {
	?>
    
    <div class="entry" align="center">
    <font size="+1">The Project name <strong><?php echo $dirname ?></strong> doesn't existed. Please create a new project name</font>    
    
    <Br />
    <br />
    
    <form action="index_microarray.php" method="post"><input type="submit" class="btn" name="return" value="return" /></form>
    </div>
 	<p class="meta">&nbsp;&nbsp;&nbsp; <a href="user_guide.php#drug_response" class="comments">Help</a></p>
	<?php
	echo "<br>";
	
	
}
?>	
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
<script src="scripts/jquery-1.10.2.min.js"></script> 
<script>
		 $("#show").click(function(){
		 	$('.asd').css({'visibility':'visible'})
		 	});
     $(".LingJiCaiDan").mouseover(function () {
      $(this).css({"background":"#91C5E8"});		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
     $(".LingJiCaiDan").mouseout(function () {
      $(this).css({"background":"#B7D8F2"});		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
</script>
	
</html>

