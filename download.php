<?php 
$file_code=$_GET['code'];
$file="upload_file/tmp_data/".$file_code.".zip";
header("Content-Type: application/force-download");
header("Content-Disposition: attchment;filename=".basename($file));
readfile($file);
?>