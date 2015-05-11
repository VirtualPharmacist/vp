<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style>
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
			<h2 class="title">Retrieve your results</h2>

			<div class="entry" style="margin-left:70px">
			<h3>Part I: visualize individual sample demo result</h3>
       <form action="choose_data.php" name="search" method="GET">
            <font size="3.5">
      
            <b>Input your access code:</b>
            <a target="Help" onclick="window.open(this.href,'Help','width=1100,height=600,left=20,top=100,directories=no,menubar=yes,toolbar=yes,status=no,scrollbars=yes,resizable=no')" href="user_guide.php#search"><img border="0" alt="?" src="images/help.png"></a>
            </font>
            <input type="text" value="sample1" maxlength="30" size="20" name="file_code"/>
            <input type="submit" value="Submit" name="submit"/>
            </form>
            This link demostrates the indivdual demo result. The access code of individual sample demo result is <strong>'example'</strong>.
            <br>
            <a href="download3.php">Click here</a> to download the demo individual raw data (VCF data format).
			<br><br>
			<h3>Part II: visualize multiple sample demo result</h3>
       <form action="analysis_vcf.php" name="search" method="GET">
            <font size="3.5">
      			
            <b>Input your access code:</b>
            <a target="Help" onclick="window.open(this.href,'Help','width=1100,height=600,left=20,top=100,directories=no,menubar=yes,toolbar=yes,status=no,scrollbars=yes,resizable=no')" href="user_guide.php#search"><img border="0" alt="?" src="images/help.png"></a>
            </font>
            <input type="text" value="test" maxlength="30" size="20" name="file_code"/>
            <input type="submit" value="Submit" name="submit"/>
            </form>
            This link demostrates the multiple sample demo result. The access code of individual sample demo result is <strong>'test'</strong>.
            <br>
            <a href="./upload_file/test.zip">Click here</a> to download the demo multiple demo sample (there are ten samples in total) raw data (VCF data format).
			</div>
<br /><Br />
			<p class="meta">&nbsp;&nbsp;&nbsp; <a href="user_guide.php#drug_response" class="comments">Help</a></p>
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


</html>

