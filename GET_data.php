<!DOCTYPE html>
<html>
<?php
include "mysql_connect.php";
//$system_name=$_GET['System'];
$drug_name=$_GET['Drug'];
$file_code=$_GET['code'];
$sql="SELECT * FROM $file_code WHERE Drug LIKE '%$drug_name%'";
$res=mysql_query($sql);
$subsystem=$_GET['subsystem'];
$s=mysql_num_rows($res);	
$file = "upload_file/tmp_data/".$file_code.".txt.drug.xls";
?>
<head>
<style>

.guidance .p1
{
	font-weight:bold;
	color:#000;
	font-size:20px;
	padding-top:0px;
	padding-bottom::0px;
}
.guidance .p2
{
	color:#7D0243;
	font-weight:bold;
	font-size:18px;


}
.main b
{
	font-size:18px;
	color:#3DBCC7;

}

</style>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php include("title.php") ?>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->
<link href="styles/core.css" type="text/css" rel="stylesheet"/>

    <script src="scripts/jquery-1.10.2.min.js" type="text/javascript" language="javascript"></script>
    

    <script language="javascript">
				$(document).ready(function(){
					$(".contact").click(function(){
						<!--$(this).children(".img").attr("src","images/asasa2.png");-->
						$(this).next().show("slow");					
				
					});
					$(document).mouseup(function (e){
					var container = $(".us");
					if (!container.is(e.target) // if the target of the click isn't the container...
					&& container.has(e.target).length === 0) // ... nor a descendant of the container
					{
					//hide here
					
					$('.us').hide("slow");
					}
					});
					
					$(".contact").mouseover(function(){
						$(this).children(".img").attr("color","#2CA5CD");
											
					});

					$(".contact").mouseout(function(){
						$(this).children(".img").attr("color","#57BFDD");
											
					});
					$('.contact').hover(function() {
						$(this).css('cursor','pointer');
					});					
				})
		</script>
<style>
.post
{
	padding-top:30px;
}
.entry
{
	padding-left:30px;
	padding-right:30px;
}
#header1 {
	background-color:#FFFFFF;
	width:1290px;
	height: 120px;
	margin: 0 auto;
}
</style>

</head>
<body>
<div id="header1">
  <div id="logo1">
    <h1>Virtual pharmacist</h1>
		<p>By sustc</p>
	</div>
</div>
<!-- start header -->

<!-- end header -->


<!-- start menu -->
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
		  <h2 class="title"><?php echo $drug_name ?></h2>          
			<!--<p class="byline"><small>Posted on August 25th, 2007 by <a href="#">admin</a> | <a href="#">Edit</a></small></p>-->
            <b>Genetic data of: <?php echo $file_code ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
			<div class="">


			
				<hr size="3" color="#BDBDBD" width="100%" />
                        <ul class="table">
                        <li class="rsid" title="Your SNP ID"><font>SNPs ID</font></li>
                        <li class="level" title="This term shows the reliability for each note" ><font>Evidence level</font></li>
                        <li class="gene" title="your gene"><font>Gene</font></li>
                        <li class="genotype" title="your genotype"><font>Your genotype</font></li>
                        <li class="efficacy" title="The efficacy for each drug is influenced"><font>Efficacy</font></li>
                        <li class="dosage" title="The dosage for each drug is influenced"><font>Dosage</font></li>
                        <li class="toxicity" title="The toxicity for each drug is influenced"><font>Toxicity</font></li>
                        <li class="moreinfo" title="If your need more official information you can click the items bellow"><font>More</font></li>
                        </ul>
                        	
						<hr size="2" color="#CCCCCC" width="100%" />
                        <?php 
						$m=1;
						$i=0;
                        while($row=mysql_fetch_array($res))
						{?>
                        <?php if($i==0) {?>
                        <ul class="table">
                        <li class="rsid"><a href="http://www.pharmgkb.org/rsid/<?php echo $row['RSID']?>" target="_blank"><?php echo $row['RSID'] ?></a></li>
                        <li class="level" title="<?php
		 				if($row['Level'] == "Level 1A"){echo "Annotation for a variant-drug combination in a CPIC or medical society-endorsed PGx guideline, or implemented at a PGRN site or in another major health system."; $a=6;}
				if($row['Level'] == "Level 1B"){echo "Annotation for a variant-drug combination where the preponderance of evidence shows an association. The association must be replicated in more than one cohort with significant p-values, and preferably will have a strong effect size."; $a=5;}
				if($row['Level'] == "Level 2A"){echo "Annotation for a variant-drug combination that qualifies for level 2B where the variant is within a VIP (Very Important Pharmacogene) as defined by PharmGKB. The variants in level 2A are in known pharmacogenes, so functional significance is more likely."; $a=4;}
				if($row['Level'] == "Level 2B"){echo "Annotation for a variant-drug combination with moderate evidence of an association. The association must be replicated but there may be some studies that do not show statistical significance, and/or the effect size may be small."; $a=3;}
				if($row['Level'] == "Level 3"){echo "Annotation for a variant-drug combination based on a single significant (not yet replicated) or annotation for a variant-drug combination evaluated in multiple studies but lacking clear evidence of an association."; $a=2;}
				if($row['Level'] == "Level 4"){echo "Annotation based on a case report, non-significant study or in vitro, molecular or functional assay evidence only."; $a=1;}
				?>">				<?php if($a==1){ ?>
        <img src="images/103471.png" />	
       	<?php }?>
				<?php if($a==2){ ?>
        <img src="images/103471.png" /> <img src="images/103471.png" />
       	<?php }?>
				<?php if($a==3){ ?>
        <img src="images/103471.png" /> <img src="images/103471.png" /> <img src="images/1034711.png" />
       	<?php }?>
				<?php if($a==4){ ?>
        <img src="images/103471.png" /> <img src="images/103471.png" /> <img src="images/103471.png" />	
       	<?php }?>
				<?php if($a==5){ ?>
        <img src="images/103471.png" /> <img src="images/103471.png" /> <img src="images/103471.png" /> <img src="images/1034711.png" />
       	<?php }?>
 				<?php if($a==6){ ?>
        <img src="images/103471.png" /> <img src="images/103471.png" /> <img src="images/103471.png" /> <img src="images/103471.png" />
       	<?php }?></li>
                    	<li class="gene"> <?php echo $row['Gene'] ?></li>
                        <li class="genotype"> <?php echo $row['Genotype'] ?> </li>
                        <li class="efficacy"><?php if($row['Efficacy']=="increased"){ ?><img src="images/2.png" /><?php }?>
                        					 <?php if($row['Efficacy']=="decreased"){ ?><img src="images/1png.png" /><?php }?>
                                             <?php if($row['Efficacy']=="-"){ ?><font color="#000000">NA</font><?php }?>
                        </li>
                        <li class="dosage"><?php if($row['Dosage']=="increased"){ ?><img src="images/2.png" /><?php }?>
                        					 <?php if($row['Dosage']=="decreased"){ ?><img src="images/1png.png" /><?php }?>
                                             <?php if($row['Dosage']=="-"){ ?><font color="#000000">NA</font><?php }?>
                        </li>
                        <li class="toxicity"><?php if($row['Toxicity']=="increased"){ ?><img src="images/2.png" /><?php }?>
                        					 <?php if($row['Toxicity']=="decreased"){ ?><img src="images/1png.png" /><?php }?>
                                             <?php if($row['Toxicity']=="-"){ ?><font color="#000000">NA</font><?php }?>
						</li></UL>
<span  class="contact"><font class="img" color="#3DBCC7">What it means</font></span>
<div  class="us" style="display:none;">
       <!-- <div class="head"><div class="head-right"></div></div>-->
            <div class="main">
                <h2>Molecular genetics of  <a href="http://www.ncbi.nlm.nih.gov/projects/SNP/snp_ref.cgi?searchType=adhoc_search&type=rs&rs=<?php echo $row['RSID']; ?>"  target="_blank"><?php echo $row['RSID']; ?></a></h2>
              <p><hr color="#999999" size="1" width="95%" /></p>	
            <ul>
            <li><b>Gene:<?php echo $row['Gene']; ?></b></li>
            <li><b>Genotype:<?php echo $row['Genotype']; ?></b></li>
            <li><b>Alleles:<?php echo $row['Alleles']; ?></b></li>
            </ul>                
			<font color="#3333FF"><?php echo str_replace(array("\"","?","\'"),"",$row['Sentence']); ?><br /><font size="-1" style="font-style:italic" color="black">* data from </font><a href="http://www.pharmgkb.org/"  target="_blank">PharmGKB</a></font>
            </div>
  <!--<div class="foot"><div class="foot-right"></div></div>-->
</div>
                        </ul>
                        <?php 
						$i++;
						$m++;
						continue; } 
						?>
                        <hr size="1" color="#FFFFFF" style="border-top:dotted 1px" width="100%" />
                        <ul class="table">
                        <li  class="rsid"><a href="http://www.pharmgkb.org/rsid/<?php echo $row['RSID']?>" target="_blank"><?php echo $row['RSID'] ?></a></li>
                        <li class="level" title="<?php
		 				if($row['Level'] == "Level 1A"){echo "Annotation for a variant-drug combination in a CPIC or medical society-endorsed PGx guideline, or implemented at a PGRN site or in another major health system."; $a=6;}
				if($row['Level'] == "Level 1B"){echo "Annotation for a variant-drug combination where the preponderance of evidence shows an association. The association must be replicated in more than one cohort with significant p-values, and preferably will have a strong effect size."; $a=5;}
				if($row['Level'] == "Level 2A"){echo "Annotation for a variant-drug combination that qualifies for level 2B where the variant is within a VIP (Very Important Pharmacogene) as defined by PharmGKB. The variants in level 2A are in known pharmacogenes, so functional significance is more likely."; $a=4;}
				if($row['Level'] == "Level 2B"){echo "Annotation for a variant-drug combination with moderate evidence of an association. The association must be replicated but there may be some studies that do not show statistical significance, and/or the effect size may be small."; $a=3;}
				if($row['Level'] == "Level 3"){echo "Annotation for a variant-drug combination based on a single significant (not yet replicated) or annotation for a variant-drug combination evaluated in multiple studies but lacking clear evidence of an association."; $a=2;}
				if($row['Level'] == "Level 4"){echo "Annotation based on a case report, non-significant study or in vitro, molecular or functional assay evidence only."; $a=1;}
				?>"> 
				<?php if($a==1){ ?>
        <img src="images/103471.png" />	
       	<?php }?>
				<?php if($a==2){ ?>
        <img src="images/103471.png" /> <img src="images/103471.png" />
       	<?php }?>
				<?php if($a==3){ ?>
        <img src="images/103471.png" />	<img src="images/103471.png" /> <img src="images/1034711.png" />
       	<?php }?>
				<?php if($a==4){ ?>
        <img src="images/103471.png" /> <img src="images/103471.png" /> <img src="images/103471.png" />	
       	<?php }?>
				<?php if($a==5){ ?>
        <img src="images/103471.png" />	<img src="images/103471.png" /> <img src="images/103471.png" /> <img src="images/1034711.png" />
       	<?php }?>
 				<?php if($a==6){ ?>
        <img src="images/103471.png" />	<img src="images/103471.png" /> <img src="images/103471.png" /> <img src="images/103471.png" />
       	<?php }?>
					</li>
                    	<li class="gene"> <?php echo $row['Gene'] ?></li>
                        <li class="genotype"> <?php echo $row['Genotype'] ?> </li>
                        <li class="efficacy"><?php if($row['Efficacy']=="increased"){ ?><img src="images/2.png" /><?php }?>
                        					 <?php if($row['Efficacy']=="decreased"){ ?><img src="images/1png.png" /><?php }?>
                                             <?php if($row['Efficacy']=="-"){ ?><font color="#000000">NA</font><?php }?>
                        </li>
                        <li class="dosage"><?php if($row['Dosage']=="increased"){ ?><img src="images/2.png" /><?php }?>
                        					 <?php if($row['Dosage']=="decreased"){ ?><img src="images/1png.png" /><?php }?>
                                             <?php if($row['Dosage']=="-"){ ?><font color="#000000">NA</font><?php }?>
                        </li>
                        <li class="toxicity"><?php if($row['Toxicity']=="increased"){ ?><img src="images/2.png" /><?php }?>
                        					 <?php if($row['Toxicity']=="decreased"){ ?><img src="images/1png.png" /><?php }?>
                                             <?php if($row['Toxicity']=="-"){ ?><font color="#000000">NA</font><?php }?>
						</li>
                        </ul>
<span  class="contact"><font class="img" color="#3DBCC7">What it means</font></span>
<div  class="us" style="display:none;">
       <!-- <div class="head"><div class="head-right"></div></div>-->
            <div class="main">
                <h2>Molecular genetics of  <a href="http://www.ncbi.nlm.nih.gov/projects/SNP/snp_ref.cgi?searchType=adhoc_search&type=rs&rs=<?php echo $row['RSID']; ?>"  target="_blank"><?php echo $row['RSID']; ?></a></h2>
              <p><hr color="#999999" size="1" width="95%" /></p>	
            <ul>
            <li ><b>Gene:<?php echo $row['Gene']; ?></b></li>
            <li><b>Genotype:<?php echo $row['Genotype']; ?></b></li>
            <li><b>Alleles:<?php echo $row['Alleles']; ?></b></li>
            </ul>                
			<font color="#3333FF"><?php echo str_replace(array("\"","?","\'"),"",$row['Sentence']); ?><br /><font size="-1" style="font-style:italic" color="black">* data from </font><a href="http://www.pharmgkb.org/"  target="_blank">PharmGKB</a></font>
            </div>
  <!--<div class="foot"><div class="foot-right"></div></div>-->
</div>
                        <?php 
						$m++;
						} ?>
<Br>
<br>

            <hr size="1" color="#FFFFFF" style="border-top:dotted 1px" />
			</div>
			
			<p class="meta"> &nbsp;&nbsp;&nbsp; <a href="user_guide.php#drug_response" class="comments">Help</a></p>
		</div>
        <div class="entry" >
        <?PHP
		$sql1="SELECT * FROM $file_code WHERE Drug LIKE '%$drug_name%'";
		$res1=mysql_query($sql1);
		$row1=mysql_fetch_array($res1);
		 ?>
        <b>Description of 
        <a href="http://www.drugbank.ca/drugs/<?php echo str_replace(array("\"","?","\'"),"",$row1['drugID']); ?>"><?php 
		echo $drug_name; ?></a>:</b>
        <br />
        <?php if(str_replace(array("\"","?"),"",$row1['info'])!=""){  ?>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo str_replace(array("\"","?"),"",$row1['info']); ?></p>
        <?php  }  ?>
        <?php if(str_replace(array("\"","?"),"",$row1['info'])==""){ ?>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "There is not any information in <a href=\"http://www.drugbank.ca/drugs/\">DrugBank</a>"; ?></p>
        <?php  }  ?>
			<p class="meta"> &nbsp;&nbsp;&nbsp; <a href="http://www.drugbank.ca/drugs/<?php echo str_replace(array("\"","?","\'"),"",$row1['drugID']); ?>" class="comments">More information</a></p>        
        </div>

        <div class="guidance">
        <p class="p1">Classification of evidence level (<a href="https://www.pharmgkb.org/page/clinAnnLevels">PharmGKB standard):</a></p>
        
        <!--<img src="images/heas.png" />-->
        <p class="p2">Level 1A&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/103471.png" /><img src="images/103471.png" /><img src="images/103471.png" /><img src="images/103471.png" /></p>
        <p>Annotation for a variant-drug combination in a CPIC or medical society-endorsed PGx guideline, or implemented at a PGRN site or in another major health system.</p>
        <p class="p2">Level 1B&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/103471.png" /><img src="images/103471.png" /><img src="images/103471.png" /><img src="images/1034711.png" /></p>
        <p>Annotation for a variant-drug combination where the preponderance of evidence shows an association. The association must be replicated in more than one cohort with significant p-values, and preferably will have a strong effect size.</p>
        <p class="p2">Level 2A&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/103471.png" /><img src="images/103471.png" /><img src="images/103471.png" /></p>
        <p>Annotation for a variant-drug combination that qualifies for level 2B where the variant is within a VIP (Very Important Pharmacogene) as defined by PharmGKB. The variants in level 2A are in known pharmacogenes, so functional significance is more likely.</p>
        <p class="p2">Level 2B&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/103471.png" /><img src="images/103471.png" /><img src="images/1034711.png" /></p>
        <p>Annotation for a variant-drug combination with moderate evidence of an association. The association must be replicated but there may be some studies that do not show statistical significance, and/or the effect size may be small.</p>
        <p class="p2">Level 3&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/103471.png" /><img src="images/103471.png" /></p>
        <p>Annotation for a variant-drug combination based on a single significant (not yet replicated) or annotation for a variant-drug combination evaluated in multiple studies but lacking clear evidence of an association.</p>
        <p class="p2">Level 4&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/103471.png" /></p>
        <p>Annotation based on a case report, non-significant study or in vitro, molecular or functional assay evidence only.</p>
        
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
