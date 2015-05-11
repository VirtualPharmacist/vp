<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script  LANGUAGE="javascript">

function tijiao_SNP()
{
	var format="";
	if(document.getElementById("r1").checked){format="23andme";}
	if(document.getElementById("r2").checked){format="Affymetrix";}
	if(document.getElementById("r3").checked){format="deCODEme";}
	if(document.getElementById("r4").checked){format="ftdna";}
if(document.form1.age.value!=''&&document.form1.kg.value!=''&&document.form1.cm.value!='')
{
		var s='age='+document.form1.age.value+'&Race='+document.form1.Race.value+'&file_code='+document.form1.file_code.value+'&kg='+document.form1.kg.value+'&cm='+document.form1.cm.value+'&Enzyme='+document.form1.Enzyme.value+'&Amiodarone='+document.form1.Amiodarone.value+'&format='+format;
		window.open("warfarin_result.php?"+s, "Dosage of warfarin", "height=300, width=500, top=200, left=470, toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, status=0",false);
}
else
{
		window.open("warfarin_fail.php?", "Invalid information", "height=300, width=500, top=200, left=470, toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, status=0",false);	
}
}
function tijiao_email()
{
	var stage='create';
	//if(document.getElementById("r31").checked){stage="create";}
	//if(document.getElementById("r32").checked){stage="done";}
	var mail="mail="+document.form2.mail.value;
	window.open("email.php?"+mail+"&stage="+stage, "Choose your extrome file", "height=300, width=500, top=200, left=470, toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, status=0",false);

	
}
function tijiao_exome()
{
	var format="";
	if(document.getElementById("r11").checked){format="one";}
	if(document.getElementById("r22").checked){format="two";}
if(document.form3.age.value!=''&&document.form3.kg.value!=''&&document.form3.cm.value!='')
{
	var s='age='+document.form3.age.value+'&Race='+document.form3.Race.value+'&kg='+document.form3.kg.value+'&cm='+document.form3.cm.value+'&Enzyme='+document.form3.Enzyme.value+'&Amiodarone='+document.form3.Amiodarone.value+'&format='+format+"&account="+document.form3.account.value;
	window.open("unzip.php?"+s, "Choose your extrome file", "height=300, width=500, top=200, left=470, toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, status=0",false);
}
else
{
	window.open("warfarin_fail.php?", "Invalid information", "height=300, width=500, top=200, left=470, toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, status=0",false);
	
}
}



function tijiao_choose()
{


if(document.form4.age.value!=''&&document.form4.kg.value!=''&&document.form4.cm.value!='')
{
	var s='age='+document.form4.age.value+'&Race='+document.form4.Race.value+'&kg='+document.form4.kg.value+'&cm='+document.form4.cm.value+'&Enzyme='+document.form4.Enzyme.value+'&Amiodarone='+document.form4.Amiodarone.value+'&genotype1='+document.form4.CYP2C9.value+'&genotype2='+document.form4.VKORC1.value;
	window.open("warfarin_choose.php?"+s, "Choose your extrome file", "height=300, width=500, top=200, left=470, toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, status=0",false);
}
else
{
	window.open("warfarin_fail.php?", "Invalid information", "height=300, width=500, top=200, left=470, toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, status=0",false);
	
}
}

function tijiao_tranditional()
{


if(document.form5.age.value!=''&&document.form5.kg.value!=''&&document.form5.cm.value!='')
{
	var s='age='+document.form5.age.value+'&Race='+document.form5.Race.value+'&kg='+document.form5.kg.value+'&cm='+document.form5.cm.value+'&Enzyme='+document.form5.Enzyme.value+'&Amiodarone='+document.form5.Amiodarone.value;
	window.open("warfarin_tranditional.php?"+s, "Choose your extrome file", "height=300, width=500, top=200, left=470, toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, status=0",false);
}
else
{
	window.open("warfarin_fail.php?", "Invalid information", "height=300, width=500, top=200, left=470, toolbar=0, menubar=0, scrollbars=0, resizable=0,location=0, status=0",false);
	
}
}
</script>
<style>
h2
{
	font-weight:900;
	
}
.button
{
	padding-top:0px;
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
	
}

.post1{
	padding-left:150px;
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
.chartitle
{
	border:15px;
	border-color:#D1CEF7;
}
.charttitle
{

	height:30px;
	font-family:Georgia, "Times New Roman", Times, serif;
	padding-left:15px;
	background:#D1CEF7;
}
.upload1
{

	padding-top:0px;
	margin-top:0px;
	padding-left:170px;
	padding-bottom:20px;
	
}
.LingJiCaiDan
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
#fsUploadProgress
{
	position:relative;
	left:160px;
		width:300px;
	padding-right:200px;
	padding-bottom:10px;
}
#hide1
{
	font-family:Verdana, Geneva, sans-serif;
	display:none;
	font-size:16px;
	margin:0px;
	padding:0px;
	border-left-style:dotted;
	border-right-style:dotted;
	border-bottom-style:dotted;
	border-width:thin;
	
}
#divStatus
{
	padding-top:10px;
	position:relative;
	left:165px;
	padding-bottom:0px;

}
</style>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Personal Genome Interpretation</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->
<link rel="stylesheet" href="css/components/jquery.fancybox-1.3.1.css" type="text/css" media="screen" />
<style type="text/css">
.LingJiCaiDan1 {	background:#B7D8F2;
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
</style>
<?php
$page_title="VP: Virtural Pharmacist";
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
include("upload1_js.php");
?>

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
			<h2 class="title"><font color="#000000">PGWD: Intergrating personal genome for warfarin dosing</font></h2>

			<div class="entry">
			  <p><b>&nbsp;&nbsp;Warfarin</b> is a drug normally used in the prevention of thrombosis and the formation of blood clots. The dosage of warfarin is strongly affected by the variations of personal genome such as genetic variants of CYP2C9 and VKORC1 genes. PGWD can analyze both microarray SNP data and exome sequencing raw data, call out the allele variants of CYP2C9 and VKORC1, integrate with clinical information of patients and calculate the proper warfarin dosage。
 <p class="meta">&nbsp;&nbsp;&nbsp; <a href="user_guide.php" class="comments"  target="_blank">More information</a></p>
                </p>
			</div>
		</div>
		
		<div class="post">
        <p class="LingJiCaiDan">Option 1: Clinical information only</p> 
<div class="post1" style="display:none">

    <br />
<form name="form5" action="" method="get">
   <span>Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textfield" type="text" name="age"  />
			
    </span>
    <br />
    <br />
   
    Race:&nbsp;&nbsp;&nbsp;
        <select class="textfield1" name="Race">
        <option value="Asian" selected="selected">Asian</option>
        <option value="Black">Black or African American</option>
        <option value="Caucasian">Caucasian or White</option>
        <option value="Unknown">Unknown or Mixed Race</option>
        </select>
    
    <br />
    <br />
		Weight:&nbsp;&nbsp;<input type="text" class="textfield" name="kg" />&nbsp;kg

    <br />
    <br />
  	Height:&nbsp;&nbsp;<input type="text" class="textfield" name="cm" />&nbsp;cm

    <br />
    <br />
    Taking enzyme inducer:&nbsp;
        <select class="caidan1" name="Enzyme">
        <option value="YES">YES</option>
        <option selected="selected" value="NO">No or Unknown</option>
        </select>    
   
    <Br />
    <br>
Taking amiodarone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select class="caidan1" name="Amiodarone">
        <option value="YES">YES</option>
        <option selected="selected" value="NO">No or Unknown</option>
        </select>   
<br />
        <input type="button" onclick="tijiao_tranditional()" value="&nbsp;&nbsp;&nbsp;Browse&nbsp;&nbsp;&nbsp;" name="Browse">  
<Br />
<bR />
    </form>
Reference:
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[1] The International Warfarin Pharmacogenetics Consortium, “Estimation of the Warfarin Dose with Clinical and Pharmacogenetic Data”, N Engl J Med 2009;360:753-64 (<a href="upload_file/Estimation of the Warfarin Dose with Clinical  and Pharmacogenetic Data.pdf">PDF</a>)            
    </div>        
	     <p class="LingJiCaiDan">Option 2: Clinical information and genotype </p> 
<div class="post1" style="display:none">

    <br />

<form name="form4" action="" method="get">
   <span>Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textfield" type="text" name="age"  />
			
    </span>
    <br />
    <br />
   
    Race:&nbsp;&nbsp;&nbsp;
        <select class="textfield1" name="Race">
        <option value="Asian" selected="selected">Asian</option>
        <option value="Black">Black or African American</option>
        <option value="Caucasian">Caucasian or White</option>
        <option value="Unknown">Unknown or Mixed Race</option>
        </select>
    
    <br />
    <br />
		Weight:&nbsp;&nbsp;<input type="text" class="textfield" name="kg" />&nbsp;kg

    <br />
    <br />
  	Height:&nbsp;&nbsp;<input type="text" class="textfield" name="cm" />&nbsp;cm

    <br />
    <br />
    Taking enzyme inducer:&nbsp;
        <select class="caidan1" name="Enzyme">
        <option value="YES">YES</option>
        <option selected="selected" value="NO">No or Unknown</option>
        </select>    
   
    <Br />
    <br>
Taking amiodarone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select class="caidan1" name="Amiodarone">
        <option value="YES">YES</option>
        <option selected="selected" value="NO">No or Unknown</option>
        </select>   
<br />
 <strong><font color="#25939E" size="+1">Select genotype mannually</font></strong>
<br />
<BR />
Genotype of CYP2C9:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select class="caidan1" name="CYP2C9">
        <option selected="selected" value="Unknown">Unknown</option>
        <option value="CYP2C9 *1*1">CYP2C9 *1*1</option>
        <option value="CYP2C9 *1*2">CYP2C9 *1*2</option>
        <option value="CYP2C9 *2*2">CYP2C9 *2*2</option>
		<option value="CYP2C9 *1*3">CYP2C9 *1*3</option>
		<option value="CYP2C9 *2*3">CYP2C9 *2*3</option>
		<option value="CYP2C9 *3*3">CYP2C9 *3*3</option>
        </select> 
<br />
<bR />
Genotype of VKORC1:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select class="caidan1" name="VKORC1">
        <option selected="selected" value="Unknown">Unknown</option>        
        <option value="VKORC1 TT">TT</option>
        <option value="VKORC1 CT">CT</option>
        <option value="VKORC1 CC">CC</option>        
        </select> 
<bR />
        <input type="button" onclick="tijiao_choose()" value="&nbsp;&nbsp;&nbsp;Browse&nbsp;&nbsp;&nbsp;" name="Browse">  
<Br />
<bR />
    </form>
Reference:
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[1] The International Warfarin Pharmacogenetics Consortium, “Estimation of the Warfarin Dose with Clinical and Pharmacogenetic Data”, N Engl J Med 2009;360:753-64 (<a href="upload_file/Estimation of the Warfarin Dose with Clinical  and Pharmacogenetic Data.pdf">PDF</a>)            
    </div>                 
	     <p class="LingJiCaiDan">Option 3: Clinical information and microarray SNP data</p>      
			<div class="entry" style="display:none">        
    <strong><font color="#25939E" size="+2">Clinical data:</font></strong>
    <div class="chart">

    <br />

		<form name="form1" action="" method="get">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textfield" type="text" name="age"  />			
    </span>
    <br />
    <br />
   
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Race:&nbsp;&nbsp;&nbsp;
        <select class="textfield1" name="Race">
        <option value="Asian" selected="selected">Asian</option>
        <option value="Black or African American">Black or African American</option>
        <option value="Caucasian or White">Caucasian or White</option>
        <option value="Unknown or Mixed Race">Unknown or Mixed Race</option>
        </select>
    
    <br />
    <br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Weight:&nbsp;<input type="text" class="textfield" name="kg"/>&nbsp;kg

    <br />
    <br />
  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Height:&nbsp;&nbsp;<input type="text" class="textfield" name="cm"/>&nbsp;cm

   
    <br />
    <br />
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Taking enzyme inducer:&nbsp;
        <select class="caidan1" name="Enzyme">
        <option value="YES">YES</option>
        <option selected="selected" value="NO or Unknown">No or Unknown</option>
        </select>    
   
    <Br />
    <br>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Taking amiodarone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select class="caidan1" name="Amiodarone">
        <option value="YES">YES</option>
        <option selected="selected" value="NO or Unknown">No or Unknown</option>
        </select>    
    
    <br />
		<br />
		<div class="charttitle1">    
    <strong><font color="#25939E" size="+2">Genomic data:</font></strong>
    </div>
    <br />
	<div style="padding:5px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Upload your genotype file</strong></div>
  <div class="format">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choose your file format: &nbsp;&nbsp;&nbsp;&nbsp;    <font size="-1"> please upload <font color="#FF0000">*.zip</font> or <font color="#FF0000">*.txt</font> format of SNP data(*.zip will be much faster)</font>
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="format" id="r1" value="23andme" checked>
23andme(<a href="download.php?code=example" target="_blank" >example_for_23andme.zip</a>)
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" id="r2" name="format" value="Affymetrix">Affymetrix(<a href="download.php?code=example2" target="_blank" >example_for_affy.zip</a>)
<Br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" id="r3" name="format" value="deCODEme">
deCODEme(<a href="download.php?code=example3" target="_blank" >example_for_deCODEme.zip</a>)
&nbsp;&nbsp;&nbsp;
<input type="radio" id="r4" name="format" value="ftdna">
Family Tree(<a href="download.php?code=example4" target="_blank" >example_for_ftdna.zip</a>)
 </div>
  <div class="fieldset flash" id="fsUploadProgress"> <span class="legend">Upload file</span> </div>
  <div id="divStatus"><p></p></div>


	<div class="upload1">

	<span id="spanButtonPlaceHolder"></span>&nbsp;&nbsp;
	<input id="btnCancel" type="button" value="&nbsp;&nbsp;Cancel&nbsp;&nbsp;" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
	</div>
        <font size="2" style="color:rgb(200,50,50);">&nbsp;
        </font>
		
	<input type="hidden" name="file_code" id="file_code" value="<?php echo $file_code;?>" />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input onclick="tijiao_SNP()"  type="button" value="Submit" class="button" name="submit"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="button" class="button" value="Reset" />
<br />
Reference:
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[1] The International Warfarin Pharmacogenetics Consortium, “Estimation of the Warfarin Dose with Clinical and Pharmacogenetic Data”, N Engl J Med 2009;360:753-64 (<a href="upload_file/Estimation of the Warfarin Dose with Clinical  and Pharmacogenetic Data.pdf">PDF</a>) 

    </form>
   
    </div>
			</div>
     <p class="LingJiCaiDan">Option 4: Clinical information and high throughput sequencing data</p>
<div class="post1">
<strong><font color="#25939E" size="+1">Step one: Upload your High-throughput sequencing data through FTP</font></strong> 
<br />	
<form name="form2" action="" method="get">
<font size="3">Email:&nbsp;&nbsp;<font color="#FF0000" size="+3">*&nbsp;&nbsp;</font> &nbsp;&nbsp;&nbsp;</font>
        <input type="text" value="" maxlength="50" size="30" name="mail">   
  
  <!--<input type="radio" id="r31" name="stage"  value="create" checked/>Get FTP account --> 
 		<input type="button" onclick="tijiao_email()" value="&nbsp;&nbsp;&nbsp;&nbsp;Go&nbsp;&nbsp;&nbsp;&nbsp;" name="Go">
</form>

 <font size="-1">Please provide your email, a ftp account will be generated for you</font>
    <br />
    <br />
 <strong><font color="#25939E" size="+1">Step two: choose your data for analysis </font></strong>
 <br />
 <br />
<form name="form3" action="" method="get">
   <span>Age:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textfield" type="text" name="age"  />
			
    </span>
    <br />
    <br />
   
    Race:&nbsp;&nbsp;&nbsp;
        <select class="textfield1" name="Race">
        <option value="Asian" selected="selected">Asian</option>
        <option value="Black">Black or African American</option>
        <option value="Caucasian">Caucasian or White</option>
        <option value="Unknown">Unknown or Mixed Race</option>
        </select>
    
    <br />
    <br />
		Weight:&nbsp;&nbsp;<input type="text" class="textfield" name="kg" />&nbsp;kg

    <br />
    <br />
  	Height:&nbsp;&nbsp;<input type="text" class="textfield" name="cm" />&nbsp;cm

    <br />
    <br />
    Taking enzyme inducer:&nbsp;
        <select class="caidan1" name="Enzyme">
        <option value="YES">YES</option>
        <option selected="selected" value="NO">No or Unknown</option>
        </select>    
   
    <Br />
    <br>
Taking amiodarone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select class="caidan1" name="Amiodarone">
        <option value="YES">YES</option>
        <option selected="selected" value="NO">No or Unknown</option>
        </select>   
<br />
 <strong><font color="#25939E" size="+1">Please indicate the type of data</font></strong>
<br />
<br />
<input type="radio" name="format1" value="one" id="r11" checked>
Single end data
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
<input type="radio" name="format1" value="two" id="r22">Pair end data
<BR />
<!--<font size="3">Email:&nbsp;&nbsp;&nbsp;<font color="#FF0000" size="+3">*&nbsp;&nbsp;</font> &nbsp;&nbsp;&nbsp;</font>
        <input type="text" value="" maxlength="50" size="30" name="email1"><font size="-1">(we will email you once the result is available)</font> -->  
<font size="3">FTP account<font color="#FF0000" size="+3">*&nbsp;&nbsp;</font></font>
        <input type="text" value="test" maxlength="50" size="30" name="account"> 
        <font size="-1">(Provide your FTP account to find your data in our server)</font><br>
        <input type="button" onclick="tijiao_exome()" value="&nbsp;&nbsp;&nbsp;Browse&nbsp;&nbsp;&nbsp;" name="Browse">  
<Br />
    </form>
Reference:
<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[1] The International Warfarin Pharmacogenetics Consortium, “Estimation of the Warfarin Dose with Clinical and Pharmacogenetic Data”, N Engl J Med 2009;360:753-64 (<a href="upload_file/Estimation of the Warfarin Dose with Clinical  and Pharmacogenetic Data.pdf">PDF</a>)            
    </div> 
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

</script>
</html>

