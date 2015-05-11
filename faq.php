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
<?php
$page_title="VP: Virtural Pharmacist";
$file_code = uniqid();
include("upload_js.php");
?>
<head>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.3.4.js"></script>
<!--鼠标控制滚动-->
<script type="text/javascript" src="js/jquery.mousewheel-3.0.4.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen" />

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php include("title.php") ?>
<link href="default.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->
</head>
<style>
#content1{width:410px;margin:40px auto 0 auto;padding:0 60px 30px 60px;border:solid 1px #cbcbcb;background:#fafafa;-moz-box-shadow:0px 0px 10px #cbcbcb;-webkit-box-shadow:0px 0px 10px #cbcbcb;}
hr{border:none;height:1px;line-height:1px;background:#E5E5E5;margin-bottom:20px;padding:0;}
#content1 p{margin:0;padding:7px 0;}
#content1 a img{border:1px solid #BBB;padding:2px;margin:10px 20px 10px 0;vertical-align:top;}
#content1 a img.last{margin-right:0;}
#content1 ul{margin-bottom:24px;padding-left:30px;}
h2
{
	color:#000;
}
.post
{
	padding-top:30px
}
.hehe
{
	list-style:none;
}
</style>
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
		<a href="#" id="rss-posts"></a>
		<div class="post">

<!--<embed src="http://player.youku.com/player.php/sid/XNjY4ODYyODM2/v.swf" allowfullscreen="true" quality="high" width="600" height="480" align="middle" name="cstmjx" title="点击播放" type="application/x-shockwave-flash" flashvars="winType=adshow&amp;isAutoPlay=false" style="visibility:visible;">-->
<br />


<strong><font color="#25939E" size="+2">FAQ</font></strong>
<BR />
<div class="outline">
<ol>
<li><a href="faq.php#q1">How does Virtual Pharmacist protect the privacy of user’s genome data?</a></li>
<li><a href="faq.php#q2">How long does Virtual Pharmacist take to analyze my data?</a></li>
<li><a href="faq.php#q3">Which types of data does Virtual Pharmacist support?</a></li>
<li><a href="faq.php#q4">How does Virtual Pharmacist call out SNPs in my high throughput sequencing data?</a></li>
<li><a href="faq.php#q5">What web browsers does Virtual Pharmacist support?</a></li>
<li><a href="faq.php#q6">How can I upload genome sequencing data?</a></li>
<li><a href="faq.php#q7">Where do the drug-SNP relationship data come from?</a></li>
</ol>
</div>
<strong><font id="q1" color="#25939E" size="+1">1.	How does Virtual Pharmacist protect the privacy of user’s genome data?</font></strong>
<br />
<Br />
VCF data or microarray SNP genotyping data: once a file is uploaded to the server, an encrypted and unique access code will be generated and replace the original file name. Only with the access code can the user view the drug response results.
<Br />
High-throughput sequencing data: after providing email address, an encrypted and unique FTP account and password will be generated for the user. Only with the FTP account can the user view the drug response results.
<br />
<br />
<Br />
<Br />

<strong><font id="q2" color="#25939E" size="+1">2.	How long does Virtual Pharmacist take to analyze my data?</font></strong>
<br />
<Br />
VCF data or microarray SNP genotyping data: Virtual Pharmacist takes about 15 seconds on average to analyze a normal VCF data file or a normal microarray sequencing data file.
<br />
High-throughput sequencing data: Virtual Pharmacist takes about 2 hours on average to analyze a normal high-throughput sequencing data file, with 20 CPU cores.
<br />
<br />
<Br />
<Br />

<strong><font id="q3" color="#25939E" size="+1">3.	Which types of data does Virtual Pharmacist support?</font></strong>
<br />
<Br />
Virtual Pharmacist takes high-throughput sequencing data, VCF data (version 4.0 or 4.1) and microarray SNP genotyping data as input. So far it accepts microarray SNP data in various formats, including 23andme format, Affymetrix format, Illumine format, deCODEme format and Family Tree format.
<br />
<br />
<Br />
<Br />

<strong><font id="q4" color="#25939E" size="+1">4.	How does Virtual Pharmacist call out SNPs in my high throughput sequencing data?</font></strong>
<br />
<Br />
Once a high-throughput sequencing data file is uploaded to the server, the sequences are aligned to human reference genome (hg19) by Bowtie. Samtools is then used to sort the raw alignment data, remove duplicates, and index the data. Virtual Pharmacist applies VarScan to call out the SNPs. After that, the SNP data is rearranged and indexed with dbSNP database RS number for following analysis.
<br />
<br />
<Br />
<Br />

<strong><font id="q5" color="#25939E" size="+1">5.	What web browsers does Virtual Pharmacist support?</font></strong>
<br />
<Br />
Virtual Pharmacist supports various web browsers, including Chrome, Safari and IE. For a better performance, Chrome is recommended.
<br />
<br />
<Br />
<Br />

<strong><font id="q6" color="#25939E" size="+1">6.	How can I upload genome sequencing data?</font></strong>
<br />
<Br />
VCF data or microarray SNP genotyping data: please upload your VCF data file or microarray sequencing data file via the web browser directly on the home page. Click "Upload" button to choose a file for uploading, and then click "Submit" to submit the file and initiate the analysis.
<br />
High-throughput sequencing data: due to the large size of high-throughput sequencing data, we built a FTP for you to upload your genome data to our server for analysis. Please provide your email address first and check the email for your ftp account and password. After that, please upload your high-throughput sequencing data through a FTP client. There are many options available for FTP clients, such as Filezilla, Xmanager and SecureCRT.
<br />
<br />
<Br />
<Br />

<strong><font id="q7" color="#25939E" size="+1">7.	Where do the drug-SNP relationship data come from?</font></strong>
<br />
<Br />
More than 1195 drug-related SNP relationship records were collected from PharmGKB, as well as their effects of dosage, toxicity, efficacy on drugs. Then, we downloaded the SNP list from dbSNP and used it to remove the redundancy in PharmGKB database. We also discarded those records with incomplete data. We collected the detailed description of drugs from DrugBank. For quality control, we discarded those records with low evidence PharmGKB level. Finally, we integrated two data sets into our database. One data set has 1195 drug-related SNP relationship records, with each record containing a SNP, its basic information (genotype, allele, SNP id, the related genes, the evidence level according to PharmGKB, the clinical description of SNP), and the drugs it influences. The other data set contains some related information for each drug (drug description, drug id according to the DrugBank, classification of drugs).		</div>
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
