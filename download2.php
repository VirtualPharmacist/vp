
<?php 
$num=$_GET['file'];
$file_code=$_GET['code'];
if($num==1)
{

	$file="upload_file/tmp_data/".$file_code.".pdf";
header('Content-Description: File Transfer'); 
header('Content-Type: application/octet-stream'); 
header('Content-Disposition: attachment; filename='.basename($file)); //IE中不用urlencode中文名会出现乱码 
header('Content-Transfer-Encoding: binary'); //二进制传输 
header('Expires: 0'); 
header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); //不加的话，IE中会提示目标主机无法访问 
header('Pragma: public'); //不加的话，IE中会提示目标主机无法访问 
header('Content-Length: ' . filesize($file)); 
ob_clean(); 
flush(); 
readfile($file); 
exit; 
		
	}
if($num==2)
{
	
	$file="ftp/test/3.fq";
	header("Content-Type: application/force-download");
	header("Content-Disposition: attchment;filename=".basename($file));
	readfile($file);
	}
?>