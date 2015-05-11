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
<title>VP: Virtural Pharmacist</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->
<link href="table.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->

</head>
<body>
<?php
$dirname = $_GET["file_code"];
#print "$dirname\n";
$filename = "./upload_file/project/" . $dirname . "/";
$i=0;
foreach(glob($filename .'*.zip') as $f){
	#print "$f\n";
	
	?>
	<p class="hide12321" style=" display:none" ><?php system('nohup unzip -d '.$filename.' '.$f.' &'); ?></p>    
	<p class="hide12321" style=" display:none" ><?php system('nohup rm -d '.$f.' &'); ?></p>    	
	<?php
    }



?>
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

		<h2 class="title">Multiple samples uploading interface</h2>
		<?php
		if (file_exists($filename)) {
			#mkdir($filename, 0777);
			#echo "The directory $dirname was successfully created.";
			#exit;
			?>
			<div class="entry">
			<font size="+1">Your project name: <strong><?php echo $dirname  ?></strong></font>
			<br>
			<br>
<form action="analysis_vcf.php" method="post">
<input type="hidden" name="file_code" value="<?php echo $dirname ?>" />
<table class="bordered">
    <thead>

    <tr>
        <th><input id="checkall" type="checkbox" />Select all</th>        
        <th>File name</th>
        <th>size</th>
    </tr>
    </thead>
 <?php foreach(glob($filename .'*.vcf') as $f){ ?>   
    <tr>
        <td><input type="checkbox" class="checkbox1" name="checkbox[]" value="<?php echo str_replace("./upload_file/project/$dirname/",'',$f) ?>" /></td>        
        <td><?php echo str_replace("./upload_file/project/",'',$f) ?></td>

        <td><?php echo filesize($f)/1000; echo "k" ?></td>
    </tr>        
 <?php } ?>  
</table>            
<div align="center"><input type="submit" class="btn" name="Next" value="Start Analysis"/></div>
</form>
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
$(document).ready(function() {
    $('#checkall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});		
</script>

</html>

