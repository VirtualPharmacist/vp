<!DOCTYPE>



<html>
<?php
$file_code = $_GET["file_code"];

$filename = "./upload_file/project/".$file_code."/";
$i=0;
foreach(glob($filename .'*.zip') as $f){
	#print "$f\n";
	
	?>
	<p class="hide12321" style=" display:none" ><?php system('nohup unzip -d '.$filename.' '.$f.' &'); ?></p>    
	<p class="hide12321" style=" display:none" ><?php system('nohup rm -d '.$f.' &'); ?></p>    	
	<?php
    }



?>
<?php


										//记录上传文件的格式
#$to = $_GET["email"];
$count=0;
$project_dir = './upload_file/project/'.$file_code.'/';
#$dir = opendir('./VCF_data/'.$file_code) or die("please upload at least one file in zip format!");


#$tmp_dir = glob('/var/www/helab/pgi/upload_file/VCF_data/'.$file_code."/*");

			
?>
 <!--<script language="javascript" type="text/javascript">
setTimeout("javascript:location.href='choose_data.php?file_code=<?php echo $file_code ?>'", 3000); 
</script>-->
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php include("title.php") ?>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->
<link rel="stylesheet" href="css/components/style.css" />
<link rel="stylesheet" href="css/components/jquery.fancybox-1.3.1.css" type="text/css" media="screen" />
<link href="table.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->
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
		<a href="#" id="rss-posts"></a>
		
		<div class="post">
        <bR>
			<h2 class="title">Multiple samples analysis is finished</h2>
			<!--<p class="byline"><small>Posted on August 25th, 2007 by <a href="#">admin</a> | <a href="#">Edit</a></small></p>-->


			<div class="entry">
     

<?php
		include "mysql_connect.php";
		$tmp_folder = glob($filename .'*.xls');
		foreach(glob($filename .'*.vcf') as $check){
			$new_check = strtolower($check);
			
			system("mv $check ".$new_check);
			$check = $new_check;
			$check = str_replace("./upload_file/project/$file_code/",'',$check);
			$check = str_replace(".vcf",'',$check);
			#
			$array[] = $check;
			#$check_sql = strtolower($check);	
			#echo  count($tmp_folder)."<br>";
			#echo $check."<br>";
			$val = mysql_query("select 1 from $check") or die(mysql_error());
			#echo "$val"."<br>";
			if($val!==FALSE&&count($tmp_folder) <= 0){	#如果以前创建的表格存在的话，就把以前的表格删除了，
				mysql_query("drop table $check");
				#echo "$check";
				}
			
			}
			#print "$filename\n";
		#$tmp_folder = glob($filename .'*.xls');
		#	echo  count($tmp_folder);				 
		include "mysql_connect.php";	
		#print "asd";
		
		if(count($tmp_folder)<= 0){

			#print "drop\n";
			$delete = "TRUNCATE TABLE statistics_report";
			mysql_query($delete);				
			
			}
	
		$count = 0;
		if(!empty($array)){ ?>
		<h3>Part 1: Individual summary</h3>
    In this summary table, you can download the analysis report in both excel and pdf format, or you can also browse the analysis result online.        
    
			<form action="analysis_report.php" method="post">
	            <table style="margin-top:10px" class="bordered">
                <thead>
            
                <tr>
                    <th>File No.</th>        
                    <th>File name</th>
                    <th>Excel table</th>
                    <th>PDF report</th>
                    <th>Gene-drug-target network</th>
                </tr>
                </thead>
			
	<?php
		
	foreach($array as $file_name){	#start of multiple sample VCF analysis 
			$count++;
			#echo $file_path;
			$file_path = "./upload_file/project/".$file_code.'/'.$file_name."vcf";
			#$file_name = str_replace("./upload_file/project/".$file_code.'/','',$file_path);
			$file_name = str_replace(".vcf",'',$file_name);
			
			
			$vcf_file = $project_dir.$file_name.'.vcf';
			$tmp_output = $project_dir.$file_name.'_tmp.txt';
			$out_put = $project_dir.$file_name.'.txt';
			$file_drug = $out_put.".drug.xls";
			#print $file_drug;
			if(!file_exists($out_put)){
				system("python ./bin/PyVCF/vcf.py ".$vcf_file." ".$tmp_output." ".$out_put." ./bin/rsid_chr_pos.txt NA");
				}
			

			if(!file_exists($file_drug)){

						
			
					
			//$fcount=fopen("upload_file/VCF_data/count.xls","a+");		//打开统计文件
			//$SNP_count=0;
			//$drug_count=0;
			$tmp="";
			// read the file
			
			$file_list = file_get_contents($out_put);							//用file_get_contents()获取txt文件的全部字符串
			#print $file_list;
			//var_dump($file_list);
			////////////////////////////////////////////////////////////////////////////
			$file_list = preg_replace("/\s\d*\s\d*\s/","t",$file_list);		//将有“空字符+任意数字+空字符+任意数字+空字符”的字符串 用t来替代
			
			
			
			
			$file_drug = $out_put.".drug.xls";
			$fh = fopen($file_drug, "a");			//写入方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之。
			$str_header_xls = "SNP_ID\tAllele\tGene\tDrug\tEvidence_level\tEfficacy\tDosage\tToxicity\tGenotype\tDescription\n";		
			fwrite($fh,$str_header_xls);
			$file_mybionet = $out_put.".Mybionet.xml";
			$fm = fopen($file_mybionet,"a");
			$file_Cytoscape = $out_put.".Cytoscape.csv";	//csv逗号分隔文件
			$fc = fopen($file_Cytoscape,"a");
			$file_Attribute = $out_put.".Cytoscape.Attribute.csv";
			$fa = fopen($file_Attribute,"a");
			
			$sql = "CREATE TABLE $file_name(
			RSID VARCHAR(20),
			Alleles VARCHAR(7),
			Gene VARCHAR(50),
			Drug VARCHAR(60),
			System VARCHAR(60),
			subSystem TEXT,
			drugID VARCHAR(60),
			info TEXT,
			Level VARCHAR(10),
			Efficacy VARCHAR(20),
			Dosage VARCHAR(20),
			Toxicity VARCHAR(20),
			Genotype VARCHAR(10),
			Sentence TEXT)";
			$result = mysql_query($sql);// or die (mysql_error());
			
			$sql1 = "select * from test";
			$result1 = mysql_query($sql1);
			
			$flag = 0;
			
			//mysql_close($conn);
			$head_my = '<graph name="Mybionet Network" type="directed">';//用于在xml文档中划出图片头和图片尾，将设计好的船到另一个网站，就可以画出关系图
			$tail_my = "\n</graph>";
			fwrite($fm, $head_my);
			
			while($row = mysql_fetch_array($result1))		//获取Drug_Response_Drugs 数据表中的每一个字段
			{
			$rs_flag=0;
			$RSID = $row['RSID'];
			$Gene = $row['Gene'];
			$Drug = $row['Drug'];
			$Alleles = $row['Alleles'];
			$Level = $row['Level'];
			$Efficacy = $row['Efficacy'];
			$Dosage = $row['Dosage'];
			$Toxicity = $row['Toxicity'];
			$Genotype = $row['Genotype'];
			$Notes = $row['Sentence'];
			$System=$row['System'];
			$subSystem=$row['subSystem'];
			$drugID=$row['drugID'];
			$info=$row['info'];
			
			$RSID_search = $RSID."t".$Genotype;
			$RSID_index = strpos($file_list,$RSID_search);		//strpos(string,find,start) string：字典；find：要查的字符；start：开始查询的位置（默认为文件开头）.返回第一个字符串所在的位置，如果没有对应字符串，则返回false
			//echo $file_list;
			if($RSID_index !== false){							//只有当检索到字符串时才能执行if语句
					$RSID_ok = $RSID;
					$rs_flag = 1;
					//		$SNP_count++;
					if($tmp!=$Drug)
					{
					//	$drug_count++;
						$tmp=$Drug;
					}
			#	echo "$RSID<br/>";
			}
			
			#echo "$RSID<br/>";
			if($rs_flag == 1){
			
			$stri = $RSID."\t".$Alleles."\t".$Gene."\t".$Drug."\t".$Level."\t".$Efficacy."\t".$Dosage."\t".$Toxicity."\t".$Genotype."\t".$Notes."\n";	
			$s_1="INSERT INTO $file_name (RSID,Alleles,Gene,Drug,System,subSystem,drugID,info,Level,Efficacy,Dosage,Toxicity,Genotype,Sentence) VALUES 
			('$RSID',
			'$Alleles',
			'$Gene',
			'$Drug',
			'$System',
			'$subSystem',
			'$drugID',
			'$info',
			'$Level',
			'$Efficacy',
			'$Dosage',
			'$Toxicity',
			'$Genotype',
			'$Notes')";
			$result_1=mysql_query($s_1);//  or die ("错误：$s_1");	//把从数据库中找到的信息，直接复制到用制表符\t 放入到excel 表格中
			fwrite($fh, $stri);
			$Drug1=str_replace(array("\""),"",$Drug);
			$Gene1=str_replace(array("\""),"",$Gene);
			$RSID1=str_replace(array("\""),"",$RSID);
			$str_node_drug = "\n<Node id=\"$Drug1\" type=\"complex\" name=\"$Drug1\" desc=\"\" subcellular=\"Extracellular\" link=\"\"/>";		//编写xml文件信息(编写xml文件的目的是什么啊)
			$str_node_gene = "\n<Node id=\"$Gene1\" type=\"DNA\" name=\"$Gene1\" desc=\"\" subcellular=\"Innercellular\" link=\"\"/>";			
			$str_node_rs   = "\n<Node id=\"$RSID1\" type=\"SNP\" name=\"$RSID1\" desc=\"\" subcellular=\"\" link=\"\"/>";
			$str_edge_rs   = "\n<Edge fromID=\"$RSID1\" toID=\"$Gene1\" type=\"positive\" size=\"\" desc=\"\"/>";
			$str_edge_gene   = "\n<Edge fromID=\"$Gene1\" toID=\"$Drug1\" type=\"positive\" size=\"\" desc=\"\"/>";
			
			
			fwrite($fm, $str_node_drug);
			fwrite($fm, $str_node_gene);
			fwrite($fm, $str_node_rs);
			fwrite($fm, $str_edge_rs);
			fwrite($fm, $str_edge_gene);
			
			
			
			$strc_gene = $Gene."\t".$Drug."\t"."pp\n"; 
			$strc_rs = $RSID."\t".$Gene."\tpp\n";
			fwrite($fc,$strc_rs);
			fwrite($fc,$strc_gene);
			
			$str_rs_a = $RSID."\t0\n";
			$str_gene_a = $Gene."\t1\n";
			$str_drug_a = $Drug."\t2\n";
			fwrite($fa,$str_rs_a);
			fwrite($fa,$str_gene_a);
			fwrite($fa,$str_drug_a);
			
			
			
			
			
			}
					
			#sleep(5);
			#echo $vcf_file;
			}			
	

			$new_sql = "INSERT INTO statistics_report (RSID,Genotype,Drug,Gene) SELECT DISTINCT RSID,Genotype,Drug, Gene FROM $file_name";	#把所有用户的数据添加到一个数据表里面，方便统计
			mysql_query($new_sql) or die(mysql_error());
				
				}
			else{
				
				}			
			#sleep(5);
			#echo $vcf_file;
			?>

            <tr>
                <td><?php echo $count; ?><div style="display:none"><input type="checkbox" name="checkbox[]" checked value="<?php echo $file_name ?>" /></div></td>        
                <td><?php echo $file_name ?></td>
        				<td><a href="./upload_file/project/<?php echo $file_code ?>/<?php echo $file_name ?>.txt.drug.xls">Open</a></td>
                        <td><a href="download_pdf.php?file_code=<?php echo $file_name ?>">Open</a></td>
                <td><a href="GET_drugs.php?file_code=<?php echo $file_name ?>">Open</a></td>
            </tr>             
            
            <?php 
			} 
			?>
            </table>
            <p class="meta"></p>
            <h3>Part 2: Group result</h3>  
            <h4>(a): Get the statistics bar charts for multiple samples</h4>
            <input type="hidden" name="file_code" value="<?php echo $file_code ?>"/>  
            <div align="center"><input class="btn" type="submit" value="Get multiple samples analysis report" /></div>            
			</form>
            <div class="entry">
            <h4>(b): Get the sample-drug count table</h4>
            You can generate a sample-drug count table by clicking the 'Download' button below
            
            <form action='download_drug_matrix.php' method = "get" >
            <input type="hidden" name="file_code" value="<?php echo $file_code ?>"/>	
            
             Data format for sample-drug count table:<br>
             (i): Each column represents gene symbols<br>
             (ii): Each row represents sample names<br>
             (iii): The number of each cell means that how many SNPs in a genes are invovled in pharmacogenomics of each sample.<br>
             (iv): This tabular data is extracted for further reseach such as data mining, clustering and correlation analysis
              <table>
            	<tr>
            		<td>Sample_name</td>
            		<td>Warfarin</td>
            		<td>Clopidogrel</td>
            		<td>Cisplatin</td>
            		<td>Phenytoin</td>
            		<td>...</td>
            	</tr>
            	<tr>
            		<td>SAMPLE1</td>
            		<td>1</td>
            		<td>2</td>
            		<td>4</td>
            		<td>0</td>
            		<td>...</td>
            	</tr>	
            	<tr>
            		<td>SAMPLE2</td>
            		<td>0</td>
            		<td>2</td>
            		<td>4</td>
            		<td>1</td>
            		<td>...</td>
            	</tr>	    
            	<tr>
            		<td>SAMPLE3</td>
            		<td>1</td>
            		<td>3</td>
            		<td>4</td>
            		<td>5</td>
            		<td>...</td>
            	</tr>
            	<tr>
            		<td>SAMPLE4</td>
            		<td>1</td>
            		<td>3</td>
            		<td>4</td>
            		<td>5</td>
            		<td>...</td>
            	</tr>	
            	<tr>
            		<td>...</td>
            		<td>...</td>
            		<td>...</td>
            		<td>...</td>
            		<td>...</td>
            		<td>...</td>
            	</tr>	            	            		            	            	        	
            </table>
						<div align="center" style="margin-top:10px"><input class="btn" type="submit" value="Download" /></div>  
            </form>
           
            </div>

            <div class="entry">
            <h4>(c): Get the sample-gene count table</h4>
            You can generate a sample-gene count table by clicking the 'Download' button below
            
            <form action="download_gene_matrix.php" method = "get" >
            <input type="hidden" name="file_code" value="<?php echo $file_code ?>"/>		
             Data format for sample-drug count table:<br>
             (i): Each column represents gene symbols<br>
             (ii): Each row represents sample names<br>
             (iii): The number of each cell means that how many SNPs in a genes are invovled in pharmacogenomics of each sample.<br>
             (iv): This tabular data is extracted for further reseach such as data mining, clustering and correlation analysis
              <table>
            	<tr>
            		<td>Sample_name</td>
            		<td>ABCB6</td>
            		<td>TP53</td>
            		<td>EGFR</td>
            		<td>COMT</td>
            		<td>...</td>
            	</tr>
            	<tr>
            		<td>SAMPLE1</td>
            		<td>1</td>
            		<td>2</td>
            		<td>4</td>
            		<td>0</td>
            		<td>...</td>
            	</tr>	
            	<tr>
            		<td>SAMPLE2</td>
            		<td>0</td>
            		<td>2</td>
            		<td>4</td>
            		<td>1</td>
            		<td>...</td>
            	</tr>	    
            	<tr>
            		<td>SAMPLE3</td>
            		<td>1</td>
            		<td>3</td>
            		<td>4</td>
            		<td>5</td>
            		<td>...</td>
            	</tr>
            	<tr>
            		<td>SAMPLE4</td>
            		<td>1</td>
            		<td>3</td>
            		<td>4</td>
            		<td>5</td>
            		<td>...</td>
            	</tr>	
            	<tr>
            		<td>...</td>
            		<td>...</td>
            		<td>...</td>
            		<td>...</td>
            		<td>...</td>
            		<td>...</td>
            	</tr>	            	            		            	            	        	
            </table>

            </form>
            <div align="center" style="margin-top:10px"><input class="btn" type="submit" value="Download" /></div>  
            </div>
					
		<?php	} ?>
		<?php if(empty($array)){ ?>
			
			<div align="center"><h3>Please select at least one sample!</h3></div>
			
				<div align="center"><h4><a href="upload_data.php?file_code=<?php echo $file_code ?>">Return</a></h4></div> 
			
		<?php	} ?>
 		
            

			






			</div>

                       

			<p class="meta"> &nbsp;&nbsp;&nbsp; <a href="#" class="comments">More Help </a></p>
		</div>
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<?php include("sidebar.php") ?>
	<!-- end sidebar -->
	<div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<?php 
include("foot.php");?>
</body>
</html>
		


