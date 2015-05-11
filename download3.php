<?php 
//$file_code=$_GET['code'];
$file="upload_file/VCF_data/SAMPLE.zip";
header("Content-Type: application/force-download");
header("Content-Disposition: attchment;filename=".basename($file));
readfile($file);
?>