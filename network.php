<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.mb5us.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Extended
Description: A two-column, fixed-width, Web 2.0 design.
Version    : 1.0
Released   : 20070915

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php include("title.php") ?>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->


<style>
.step
{
	font-size:18px;
	text-align:center;
	padding-left:50px;
}
.step1
{
	padding:0px;
	margin:0px;
	display:none;
}
.step2
{
	padding:0px;
	margin:0px;
	display:none;
}
</style>
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
		<h1 class="pagetitle">&nbsp;</h1>
		<!--<a href="#" id="rss-posts">RSS Feeds</a>-->
		
		<div class="post">
    <h2 class="title">SNP-drug-gene interaction network visualization</h2>

		<div class="entry">
			<strong><font color="#25939E" size="+2">In the page, you can visualize the complex network of SNPs, drugs and genes.</font></strong>
				<strong></strong>
      <Br />
       <Br />
       
       <span class="step">Step 1: Generate interaction data from your uploaded genotype file.</span>
       <br />
       <br />
            <font size="3.5">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Input your access code:</b>
            <a target="Help" onclick="window.open(this.href,'Help','width=1100,height=600,left=20,top=100,directories=no,menubar=yes,toolbar=yes,status=no,scrollbars=yes,resizable=no')" href="user_guide.php#search"><img border="0" alt="?" src="images/help.png"></a>
            </font>
            <input type="text" id="text" value="example" maxlength="30" size="20" name="file_code"/>
            <input class="btn1" type="button" value="Get it!" name="submit"/>
            <div class="step1">
            <br />
       <span class="step">Step2: Please download the file to your local hard drive: </span>
       <br />
 			 <br />  
       			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="xml" href="">Mybionet_network.xml</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn" type="button" value="Continue" name="submit" />
            <div class="step2">
            <Br />
           	<span class="step">Step3:Go to <a href="http://bis.zju.edu.cn/mybionet/" target="_blank">http://bis.zju.edu.cn/mybionet</a> Click "load new" and load "Mybionet_network.xml" file
and Enjoy!</span> 
            </div> 

      
            </div>
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
<script src="scripts/jquery.1.3.2.js"></script>
<script>
     $(".btn1").click(function () {
      $(this).next().slideToggle("slow");	
			var h=$("#text").val();
			$(".xml").attr("href","download1.php?file_code="+h);					
				//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
     $(".btn").click(function () {
      $(this).next().slideToggle("slow");
			});		
</script>
<script>



</script>
</html>