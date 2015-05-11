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
h2
{
	color:#000;
}
.post
{
	padding-top:30px
}
li{
	padding-bottom:10px;
	}
.outline ul
{
	list-style:none;
	padding:0px;
	
}
.one
{
	font-size:22px;
	font-weight:bold;
}
.two
{
	font-size:18px;

}
</st
</style>
<body>
<!-- start header -->
<?php 
include("head.php");
?>
<!-- end header -->


<!-- start menu -->
<?php include("navbar.php") ?>
<!-- end menu -->


<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<h1 class="pagetitle">&nbsp;</h1>
		<a href="#" id="rss-posts"></a>
		<div class="post">
<Br /> 
<strong><font color="#25939E" size="+2">Video tutorial of user guide(Youtube)</font></strong>
<br />
<br />
<iframe width="853" height="480" src="//www.youtube.com/embed/lOAOum9dgMg?rel=0&amp;vq=hd1080" frameborder="0" allowfullscreen></iframe><br />
<br />
<Br />
<br />
<!--<strong><font color="#25939E" size="+2">Genoeral process of Virtural Pharmacist</font></strong>
<br />
<Br />
<img src="images/sdfapng.png" />
<br />        
<br />
<br />-->
<strong><font color="#25939E" size="+2">Step-by-step user guide of Virtual Pharmacist</font></strong>
<div class="outline">
<ul>
<li><a href="user_guide.php#vcf_analysis" class="one">1	Analysis of VCF data</a></li>
<li style="padding-left:20px" class="two"><a href="user_guide.php#step_10">Step 0	Download the sample file for analysis</a></li>
<li style="padding-left:20px" class="two"><a href="user_guide.php#step_11">Step 1	Data uploading</a></li>
<li style="padding-left:20px" class="two"><a href="user_guide.php#step_12">Step 2	Begin anlaysis process</a></li>
<li style="padding-left:20px" class="two"><a href="user_guide.php#step_13">Step 3	Result</a></li>
<li><a href="user_guide.php#snp_analysis" class="one">2	Analysis of SNP microarray</a></li>
<li style="padding-left:20px" class="two"><a href="user_guide.php#step_20">Step 0	Download the sample file for analysis</a></li>
<li style="padding-left:20px" class="two"><a href="user_guide.php#step_21">Step 1	Data uploading</a></li>
<li style="padding-left:20px" class="two"><a href="user_guide.php#step_22">Step 2	Begin anlaysis process</a></li>
<li style="padding-left:20px" class="two"><a href="user_guide.php#step_23">Step 3	Result</a></li>

<li><a href="user_guide.php#exome_analysis" class="one">3	Analysis of high throughput sequence data</a></li>
<li style="padding-left:20px" class="two"><a href="user_guide.php#step_30">Step 0	Download the sample file for analysis</a></li>
<li style="padding-left:20px" class="two"><a href="user_guide.php#step_31">Step 1	Data uploading</a></li>
<li style="padding-left:20px" class="two"><a href="user_guide.php#step_32">Step 2	Begin anlaysis process</a></li>
<li style="padding-left:20px" class="two"><a href="user_guide.php#step_33">Step 3	Result</a></li>
</ul>
</div>


<br />
<strong><font id="vcf_analysis" color="#4BA4E4" size="+2">1	Analysis of VCF data</font></strong>
<br />
<br />
<strong><font id="step_10" color="#4BA4E4" size="+1">Step 0:  Download the sample file for analysis</font></strong>
<Br />
<Br />
If you don't have the VCF file containing personal SNP data, you can download the sample VCF file below:
<br />

Variant Call Format(VCF) sample file: <a href="download3.php">sample_vcf.zip</a>
<br />
<Br />

<strong><font id="step_11" color="#4BA4E4" size="+1">Step 1:  Data uploading</font></strong>
<br />  
<br />
(1) Switch to the <a href="index.php">homepage</a> of Virtural Pharmacist, click the dropdown menu of VCF data analysis:
<br />
<br />
<img src="images/step/vcf_step0.png"/>
<br />
(2.1) Upload the data file with uplaod plugin (<font color="#FF0000"><strong>Attention: Only the zip format of VCF data is allowed! Otherwise, it will cause fetal error to the server and you won't get the correct result!</strong></font>)
<Br />
<img src="images/step/vcf_step1_1.png"/>
<br />
<br />
<span id="2_2">(2.2) Only one zip file is allowed to the server at a time, you will get warning of Error 500 if you upload more than one file to the server:</span>
<br />
<img src="images/step/vcf_step1_2.png"/>
<br />
<Br />

<strong><font id="step_12" color="#4BA4E4" size="+1">Step 2:  Begin anlaysis process</font></strong>
<br />  
<br />
Submit the data by clicking the submit button (<strong>It may take several minutes if you upload the data with big size</strong>)
<br />
<img src="images/step/vcf_step2.png"/>
<br />
<br />
<strong><font id="step_13" color="#4BA4E4" size="+1">Step3:  Result</font></strong>
<br />  
<br />
The web page will switch to another page, An access code will be generated for you. (<strong>Please remember this code and it can be used to visualized the analysis result again in <a href="search.php">Drug response</a> page</strong>)
<br />
<img src="images/step/vcf_step3_1.png"/>
<br />
<br />
It will switch to data visualization page in three minutes, there are two types of data visualization. Especially, a pdf format user report will be generated for you automatically, click <a href="download2.php?code=example&file=1">here</a> to download pdf sample file
<br />
<img src="images/step/vcf_step3_2.png"/>
<br />
<br />
The interface of online visualization
<Br />
<img src="images/step/vcf_step3_5.png"/>
<Br />
<br />
<br />
<strong><font id="snp_analysis" color="#4BA4E4" size="+2">2	Analysis of SNP microarray data</font></strong>
<br />
<br />
<strong><font id="step_21" color="#4BA4E4" size="+1">Step 0:  Download the sample file for analysis</font></strong>
If you don't have the SNP microarray data file, you can download the sample file below:
<br />
<br />
SNP microarray sample file(23andMe format): <a href="download.php?code=example">example_for_23andme.zip</a><br />
SNP microarray sample file(Affymetrix format): <a href="download.php?code=example2">example_for_affy.zip</a><br />
SNP microarray sample file(deCODEme format): <a href="download.php?code=example3">example_for_deCODEme.zip</a><br />
SNP microarray sample file(Family tree format): <a href="download.php?code=example4">example_for_ftdna.zip</a><br />
<br />
<Br />
<strong><font id="step_20" color="#4BA4E4" size="+1">Step 1:  Data uploading</font></strong>
<br />
<br />
(1) Switch to the <a href="index.php">homepage</a> of Virtural Pharmacist, click the dropdown menu of Microarray data analysis:
<br />
<img src="images/step/snp_step1_1.png"/>
<br />
<br />

(2.1) Carefully choose the data format that is consistent to you data file(<font color="#FF0000"><strong>Attention: Only the zip format of VCF data is allowed! Otherwise, it will cause fetal error to the server and you won't get the correct result!</strong></font>)
<img src="images/step/snp_step1_2.png"/>
<br />
<br />
(2.2) <b>Only one zip file</b> is allowed to the server at a time, you will get warning of Error 500 if you upload more than one file to the server:
<br />
<img src="images/step/vcf_step1_2.png"/>
<br />
<Br />
<br />
<strong><font id="step_22" color="#4BA4E4" size="+1">Step 2:  Begin anlaysis process</font></strong>
<br />  
<br />
Submit the data by clicking the submit button (<strong>It may take several minutes if you upload the data with big size</strong>)
<br />
<img src="images/step/snp_step2.png"/>
<br />
<Br />
<br />
<strong><font id="step_13" color="#4BA4E4" size="+1">Step3:  Result</font></strong>
<br />  
<br />
Data visualization of the SNP microarray analysis result is the same with the data analysis of VCF data result. Click <a href="user_guide.php#step_13">here</a> to see the data visualization interface
<br />
<br />
<br />

<strong><font id="exome_analysis" color="#4BA4E4" size="+2">3	Analysis of high throughput sequence data</font></strong>
<br />
<br />
<strong><font id="step_30" color="#4BA4E4" size="+1">Step 0:  Download the sample file for analysis</font></strong>
<Br />
<Br />
If you don't have the High throughput sequence data file containing personal SNP data, you can download the sample exome file below:
<br />

Exome(fastq format) sample file: <a href="download2.php?code=example&file=2">exome_sample.zip</a>
<br />
<Br />
<br />


<strong><font id="step_31" color="#4BA4E4" size="+1">Step 1:  Data uploading</font></strong>
<Br />
<Br />
(1)Data uploading process is a little different. The first step is to input your valid Email address and press the button 'Go' (<font color="#FF0000"><strong>A valid email address must be provided so as to get the FTP account and password for data upload.</strong></font>)
<img src="images/step/exome_step1_1.png" />
<br />
<br />
<br />
(2)An email containing FTP account and password will be sent to you. The format of email is shown bellow.
<img src="images/step/exome_step1_2.png" />
<br />
<br />
<br />
(3)Log in the FTP site with the common FTP client software (If you don't have one previously, click <a href="https://filezilla-project.org/">here</a> to download the Filezilla).<strong>The data can be uploaded by fastq format or zip format. However, in order to save time, zip format is encouraged.</strong> The uploading interface is shown below

<img src="images/step/exome_step1_3.png"/>
<br />
<br />
<br />
<strong><font id="step_32" color="#4BA4E4" size="+1">Step 2:  Begin anlaysis process</font></strong>
<Br />
<Br />
Go to the <a href="index.php">homepage</a> of Virtural Pharmacist after the finish of the FTP uploading. Choose the analysis module of high throughput analysis
<img src="images/step/exome_step2_1.png"/>
<br />
<br />
Input your ftp account to access the folder with the high throughput data and press the 'Browse' button to choose the data that is to be analyzed.
<img src="images/step/exome_step2_3.png"/>
<br />
<br />
Click the submit button to begin the analysis, after that the analysis pipeline will start in the server side, it make take couple of hours due to the huge size of data, you can close the window and we will sent an email to inform you the analysis is done. 
<img src="images/step/exome_step2_2.png"/>

<br />
<br />
<br />
<strong><font id="step_33" color="#4BA4E4" size="+1">Step 3:  Result</font></strong>
<Br />
<br />
Data visualization of the SNP microarray analysis result is the same with the data analysis of VCF data result. Click <a href="user_guide.php#step_13">here</a> to see the data visualization interface

<br />








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
