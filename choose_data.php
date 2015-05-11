<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style>
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
</style>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php include("title.php"); ?>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->

</head>
<body>
<!-- start header -->
<?php 
$file_code = $_GET['file_code'];

include("head.php");
?>
<!-- end header -->

<p class="file_code" style="display:none"><?php echo $file_code; ?></p>
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
			<h2 class="title">Choose the type of data visualization</h2>

			<div class="entry">
			<br /><br />
            
       		
            <div style="alignment-adjust:central; padding-left:310px"><input type="button" id="btn1" class="btn" value="Online data visualization"/></div>
            
			<br /><br />
            

            <div style="alignment-adjust:central; padding-left:260px"><input type="submit" id="btn2" class="btn" value="Download user report in pdf format"/></div>
        

			</div>
<br /><Br /><br />
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
<script src="scripts/jquery-1.10.2.min.js"></script> 
<script>
     $(".click").click(function () {
      $(this).next().slideToggle("slow");		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
		$(".click").mouseenter(function(){
			$(this).css({"background":"#91C5E8"});
		});
		$(".click").mouseout(function(){
			$(this).css({"background":"#BADBF1"});
		});
		$("#btn1").click(function(){
			var file_code =$(".file_code").text();
			var url = "GET_drugs.php?file_code=" + file_code;
			
			window.open(url,"_self");
			
			});
		$("#btn2").click(function(){
			var file_code =$(".file_code").text();
			var url = "download_pdf.php?file_code=" + file_code;
			
			window.open(url,"_self");
			
			});			
</script>
</html>

