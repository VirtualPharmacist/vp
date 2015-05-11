<?php
//system('unzip -d /var/www/helab/pgi_final/upload_file/tmp_data/f6kk5rl7zfu3 /var/www/helab/pgi_final/upload_file/tmp_data/f6kk5rl7zfu3/f6kk5rl7zfu3.zip');

$dir = opendir("/var/www/helab/pgi_final/upload_file/tmp_data/f6kk5rl7zfu3");
$file_final="";
//列出 images 目录中的文件
while (($file = readdir($dir)) !== false)
  {
	$extension=strtolower(end(explode('.',$file)));
		if($extension=='txt')
		{
			$file_final=$file;
		}
  }
closedir($dir);

//echo $file_final;//检验是否捕捉到了制定的扩展名
system('mv /var/www/helab/pgi_final/upload_file/tmp_data/dongxi.txt /var/www/helab/pgi_final/upload_file/tmp_data/hehe.txt');
 ?>