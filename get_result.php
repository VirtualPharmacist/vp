<?php 

/*if(!empty($_POST['checkbox'])) {
    foreach($_POST['checkbox'] as $check) {
            echo $check; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }
}*/
include("mysql_connect.php");
/*$sql = "TRUNCATE TABLE statistics_report;";
mysql_query($sql) or die(mysql_error());

for($i=1;$i<=50;$i++){
	$tmp ="result".$i;
	$sql = "INSERT INTO statistics_report (RSID,Genotype,Drug) SELECT DISTINCT RSID,Genotype,Drug FROM $tmp";
	mysql_query($sql) or die(mysql_error());
	}
*/
$all_sample = $_GET['size'];
$drug = $_GET['drug'];
$file_code = $_GET['file_code'];

#$array = [];
$array[] = $drug;


foreach($array as $test){
	#print $test."\n";


$rs = "";


	
		$sql1 = "SELECT * FROM (SELECT *, COUNT(*) AS Num FROM statistics_report GROUP BY Drug, RSID, Genotype) a,
        (SELECT b.RSID,b.Drug  FROM     
       (SELECT a.*, count(a.RSID) AS Count FROM
               (SELECT *, COUNT(*) AS Num FROM statistics_report GROUP BY Drug, RSID, Genotype) a
               GROUP BY a.RSID, a.Drug) b
        WHERE b.Count > 1    ) b
        WHERE a.Drug = b.Drug AND a.RSID = b.RSID AND a.Drug = '$test'";
		$res1 = mysql_query($sql1) or die(mysql_error());

		$sql2 = "SELECT a.RSID, SUM(a.Num) AS sum FROM (SELECT *, COUNT(*) AS Num FROM statistics_report GROUP BY Drug, RSID, Genotype) a,
        (SELECT b.RSID,b.Drug  FROM     
       (SELECT a.*, count(a.RSID) AS Count FROM
               (SELECT *, COUNT(*) AS Num FROM statistics_report GROUP BY Drug, RSID, Genotype) a
               GROUP BY a.RSID, a.Drug) b
        WHERE b.Count > 1    ) b
        WHERE a.Drug = b.Drug AND a.RSID = b.RSID AND a.Drug = '$test' GROUP BY  a.RSID";	#������������������SNP��
		$res2 = mysql_query($sql2) or die(mysql_error());
		
		while($row2 = mysql_fetch_array($res2)){
			
			$hash[$row2['RSID']] = $row2['sum'];	#��¼ÿ��ҩ���SNP��ͻ����Ŀ
			
			}

		while($row1 = mysql_fetch_array($res1)){
			#$t_rsid = $row1['RSID'];
			#$t_drug = $row1['Drug'];
			$t_genotype = str_split($row1['Genotype']);
			if($t_genotype[0] == $t_genotype[1]){$homo[] = $row1['Num'];} 
			if($t_genotype[0] != $t_genotype[1]){$hetero[] = $row1['Num'];}			
			#$hash1[$t_rsid."_".$t_genotype] = $row1['Num'];
			#$num += $row1['Num'];
			if($rs != $row1['RSID']){
					$rs = $row1['RSID'];
					$wild_type[] = $all_sample - $hash[$rs];
					#$hash1[$rs."_wild type"] = $all_sample - $hash[$rs];
					$snp[] = "$rs";				
				
				
				}
			}
		//echo count($wild_type);	
	 
	 for($tmp_i=0;$tmp_i<count($wild_type);$tmp_i++){
	 		while($wild_type[$tmp_i]<=0){
	 			$wild_type[$tmp_i] = $wild_type[$tmp_i] + 2;
	 			$homo[$tmp_i]--;
	 			$hetero[$tmp_i]--;
	 			
	 			}
	 	}
	 #print_r($homo);
	 		
	 $path = "./upload_file/project/$file_code/$test.png";
	 if(!empty($wild_type)){
		 if(!file_exists($path)){
	
			 include("pChart/pData.class");
			 include("pChart/pChart.class");
				
			 // Dataset definition 
			 $DataSet = new pData;
			 $DataSet->AddPoint($wild_type,"Serie1");
			 $DataSet->AddPoint($hetero,"Serie2");
			 $DataSet->AddPoint($homo,"Serie3");
			 $DataSet->AddPoint($snp,"Labels");
			 
			 $DataSet->AddAllSeries();
			 $DataSet->RemoveSerie("Labels"); 
			 $DataSet->SetAbsciseLabelSerie("Labels");
			 $DataSet->SetSerieName("Wild type","Serie1");
			 $DataSet->SetSerieName("Heterozygous variant","Serie2");
			 $DataSet->SetSerieName("Homozygous variant","Serie3");
			 $DataSet->SetYAxisName("Samples");
			 $DataSet->SetXAxisName("Drug related SNPs");
			 // Initialise the graph
			 $Test = new pChart(910,400);	#���û�����С
			 $Test->setFontProperties("Fonts/tahoma.ttf",8);	
			 $Test->setGraphArea(60,30,750,350);	#���������ͼ���С��
			 $Test->drawFilledRoundedRectangle(7,7,903,393,5,240,240,240);	#���ñ߿��С
			 #Test->drawRoundedRectangle(5,5,853,393,5,230,230,230);		
			 $Test->drawGraphArea(255,255,255,TRUE);
			 $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_ADDALLSTART0,150,150,150,TRUE,0,2,TRUE);
			 $Test->drawGrid(4,TRUE,230,230,230,50);
			 
			 // Draw the 0 line
			 $Test->setFontProperties("Fonts/tahoma.ttf",6);
			 #$Test->drawTreshold(2,143,55,72,TRUE,TRUE);
			
			 // Draw the bar graph
			 $Test->drawBarGraph($DataSet->GetData(),$DataSet->GetDataDescription(),TRUE,80);
			
			
			 // Finish the graph
			 $Test->setFontProperties("Fonts/tahoma.ttf",8);
			 $Test->drawLegend(756,30,$DataSet->GetDataDescription(),255,255,255);
			 $Test->setFontProperties("Fonts/tahoma.ttf",10);
			 #$Test->drawTitle(250,22,"Example 12",50,50,50,585);
			 $path = "./upload_file/project/$file_code/$test.png";
			 $Test->Render($path);	 	
			 	
		 }	 	
	 	}
	
	
	
	?>
<!DOCTYPE>

<html>
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
<link href="default.css" rel="stylesheet" type="text/css" media="screen" />
<link href="table.css" rel="stylesheet" type="text/css" media="screen" />
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
			<h2 class="title">Multiple samples analysis report</h2>

			<div class="entry">
			<h3>Drug response of <b><?php echo $drug ?></b> in population</h2>
			<div align="center"><img src="<?php echo $path; ?>"></div>
			<br>
			<h3>Legend</h3>
            
			<?php
			foreach($snp as $s){
			
				$sql3 = "SELECT DISTINCT Drug, Gene, RSID, info, Alleles, Toxicity, Efficacy, Level, Dosage 
		   FROM test WHERE Drug ='$drug' AND RSID='$s'
		   GROUP BY RSID";
				$res3 = mysql_query($sql3);
				while($row3=mysql_fetch_array($res3)){
					$drug = $row3['Drug'];
					$gene = $row3['Gene'];
					$rsid = $row3['RSID'];
					$info = $row3['info'];
					$allele = $row3['Alleles'];
					$t = $row3['Toxicity'];
					$d = $row3['Dosage'];
					$e = $row3['Efficacy'];
					
					}
				$a = str_split($allele);
				
				

			
			?>
            <div style="float:none">
            	<h4>Clinical annotation of variant allele in <?php echo $rsid ?></h4>
                <table style="margin-top:20px"  class="bordered">
                	<thead>
                    <th>Item</th>
                    <th>Clinical annotation</th>
                    </thead>
                	<tr>
                    <td>Toxicity</td>
                    <td><?php 
						if($t == 'increased'){?> <font size="+1" color="#F4575B"><?php echo $t ?></font> <?php }
						if($t == 'decreased'){?><font size="+1" color="#67F367"><?php echo $t ?></font> <?php }
						if($t == '-'){?><font size="+1">NA</font> <?php } ?></td>
                    </tr>
                	<tr>
                    <td>Dosage</td>
                    <td><?php 
						if($d == 'increased'){?><font size="+1" color="#F4575B"><?php echo $d ?></font> <?php }
						if($d == 'decreased'){?><font color="#67F367"><?php echo $d ?></font> <?php }
						if($d == '-'){?><font size="+1">NA</font> <?php } ?></td>
                    </tr>
                	<tr>
                    <td>Efficacy</td>
                    <td><?php 
						if($e == 'increased'){?><font size="+1" color="#67F367"><?php echo $e ?></font> <?php }
						if($e == 'decreased'){?><font size="+1" color="#F4575B" ><?php echo $e ?></font> <?php }
						if($e == '-'){?><font size="+1">NA</font> <?php } ?></td>
                    </tr>                                        
                </table>
                
            </div>
            <div style="float:left;width:45%; height:300px;padding-right:20px">
            	<h4><font>Allele information</font></h4>
                Gene: <?php echo $gene ?><br>
                <table style="margin-top:20px"  class="bordered">
                	<thead>
                    <th>Allele type</th>
                    <th>Genotype</th>
                    </thead>
                	<tr>
                    <td>Wild type allele:</td>
                    <td><?php echo $a[0] ?></td>
                    </tr>
                	<tr>
                    <td>Variant type allele:</td>
                    <td><?php echo $a[4] ?></td>
                    </tr>                    
                </table>
            </div>
            <div style="float:left; width:50%; height:300px">
            	<h4>Drug information</h4>
                <?php echo $info; ?>
            </div>
            <hr style="border:1px dotted #999999" />
            <?php } ?>
			</div>
<br /><Br /><br /><br /><br />
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
	
	
	<?php 
	}		
#print_r($snp);

#$array['rs12050217'] = 10;
#echo($array['rs12050217']);
/*	*/
?>