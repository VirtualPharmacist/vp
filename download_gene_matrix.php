<?php 

include("mysql_connect.php");

$res = mysql_query("SELECT DISTINCT Gene FROM statistics_report");
#$row = mysql_fetch_array($res);
$all = array();

$path = "./upload_file/project/$file_code/";
$file_code = $_GET['file_code'];
#print "$file_code";
#$file_code = "test12";
$str="Sample_name";

while($row = mysql_fetch_array($res)){	#获取样本中的所有drug的数目
	#print $row['gene']."<br>";
	#echo $row['gene']."<br>";
	$all[] = $row['Gene'];
	$str .= "\t".$row['Gene'];
}
#print "$str<br><br>";
#print_r($all);	

$file_path = $path."gene_matrix.xls";
#echo "$file_path\n";
$file = fopen($file_path,"w+");
#$file_path = "matrix123.txt";
fwrite($file,$str."\n");		

$file_name = glob("./upload_file/project/$file_code/*.vcf");	
if(count($file_name)>0){

	foreach($file_name as $value){
		$value = str_replace(".vcf","",$value);
		$value = str_replace("./upload_file/project/$file_code/","",$value);
		#echo $value."<br>";
		$str = $value;
		foreach($all as $gene){
			#$num = 0;
			$sql1 = "SELECT COUNT(t.RSID) AS count FROM (SELECT DISTINCT RSID, Gene FROM $value WHERE Gene = '$gene') t";
			$res1 = mysql_query($sql1);
			while($row1 = mysql_fetch_array($res1)){
				$num = $row1['count'];
				}
			$str .= "\t".$num;
			}	
		fwrite($file,$str."\n");
		#print "$str<br>";
		}
fclose($file);
	
}else{
	
	echo "Please upload at least one VCF file to your folder!";
	
	}

	
		
header('Content-Description: File Transfer'); 
header('Content-Type: application/octet-stream'); 
header('Content-Disposition: attachment; filename='.basename($file_path)); //IE中不用urlencode中文名会出现乱码 
header('Content-Transfer-Encoding: binary'); //二进制传输 
header('Expires: 0'); 
header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); //不加的话，IE中会提示目标主机无法访问 
header('Pragma: public'); //不加的话，IE中会提示目标主机无法访问 
header('Content-Length: ' . filesize($file_path)); 
ob_clean(); 
flush(); 
readfile($file_path); 
exit; 

fclose($file);

?>
