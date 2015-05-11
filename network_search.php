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
<?php
$page_title="Your Drug-SNP network";
include "mysql_connect.php";

$file_code = $_GET['file_code'];
$file = "upload_file/tmp_data/".$file_code.".txt.Mybionet.xml";
$file_c = "upload_file/tmp_data/".$file_code.".txt.Cytoscape.csv";
$file_a = "upload_file/tmp_data/".$file_code.".txt.Cytoscape.Attribute.csv";
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>VP: Virtural Pharmacist</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->
<style>

.table li.software
{
	width:200px;
}
.table li.download
{
	width:250px;
}
.table li.web
{
	width:200px;
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
    <h2 class="title">The SNP-drug network</h2>

		<div class="entry">

<ul class="table">
        <li class="software"><b>Software
        </b></li>
        <li class="download"><b>Download</b>
        </li>
        <li class="web"><b>Link</b>	
        </li>
</ul>
<br />
<hr size="1" color="#FFFFFF" style="border-top:4px thin;border-color:#999" />
<ul class="table">
	<li class="software">Mybionet
	</li>
	<li class="download">
	<a href="download1.php?file_code=<?php echo $file_code ?>" target="_blank">Mybionet_network.xml</a>
	</li>
	<li class="web">
	<a href="http://bis.zju.edu.cn/mybionet/" target="_blank">http://bis.zju.edu.cn/mybionet/</a>
        </li>
</ul>
<Br />
<hr size="1" color="#FFFFFF" style="border-top:dotted 1px" />

<ul class="table">
	<li class="software">Cytoscape
  </li>
  <li class="download">
  <a href=<?php echo $file_c?> target="_blank">
	Cytoscape_network.csv</a>
	<a href=<?php echo $file_a?> target="_blank">
	Cytoscape_attributes.csv
	</a>
  </li>
  <li class="web">
	<a href="http://www.cytoscape.org/" target="_blank">http://www.cytoscape.org/</a>
        </li>
</ul>
<br />
<Br />
<Br />
<hr size="1" color="#FFFFFF" style="border-top:dotted 1px" />
<p><strong>User Guide:</strong></p>
&nbsp;&nbsp;&nbsp;<strong>(1)Mybionet Usage:</strong><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Step 1: Download file "Mybionet_network.xml" in your personal computer<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Step 2: Open the link <a href="http://bis.zju.edu.cn/mybionet/" target="_blank">http://bis.zju.edu.cn/mybionet/</a><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Step 3: Click "load new" and load "Mybionet_network.xml" file<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Step 4: Analyse the DRUG-GENE-SNP network<br/>
&nbsp;&nbsp;&nbsp;<strong>(2)Cytoscape Usage:</strong><br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Step 1: Download file "Cytoscape_network.csv" and "Cytoscape_attributes.csv" in your personal computer<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Step 2: Download and install software Cytoscape<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Step 3: Load  "Cytoscape_network.csv" and "Cytoscape_attributes.csv" and analyse the DRUG-GENE-SNP network
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
</html>