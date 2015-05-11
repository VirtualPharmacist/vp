<?php 
$format=$_GET["format"];
$account=$_GET['account'];
$value1 = $_GET['mycheckbox1'];
$value2 = $_GET['mycheckbox2'];
$age=$_GET['age'];
$race=$_GET['race'];
$kg=$_GET['kg'];
$cm=$_GET['cm'];
$enzyme=$_GET['enzyme'];
$amiodarone=$_GET['amiodarone'];

//$email=$_GET['email'];
//$num=count($value); 
//echo $num;
//echo "<br>";
//echo $account;
//echo "<br>";
//echo $format;

if($age==''&&$sex==''&&$race==''&&$cm==''&&$enzyme==''&&$amiodarone==''&&$kg=='')
{
	if($format=="one")
	{
		//echo "I am exome1";	
		echo "We have analyzing your data<br>";
		
		system('nohup python ./bin/single.py '.$account.' '.$value1.' ./bin/hg19 ./bin/rsid_chr_pos.txt ./ftp ./bin/ftpuser &');
	
	}
	if($format=="two")
	{
		//echo "I am exome2";	
		echo "We have analyzing your data<br>";

		system('nohup python ./bin/pair.py '.$account.' '.$value1.' '.$value2.' ./bin/hg19 ./bin/rsid_chr_pos.txt ./ftp ./bin/ftpuser &');	
		
	}

}
else
{
	if($format=="one")
	{
		//echo "I am warfarin1";	
		echo "We have analyzing your data<br>";
		system('nohup python /var/www/helab/pgi/bin/single_warfarin.py '.$account.' '.$value1.' '.$age.' '.$race.' '.$cm.' '.$kg.' '.$enzyme.' '.$amiodarone.' /var/www/helab/pgi/bin/hg19 /var/www/helab/pgi/bin/rsid_chr_pos.txt /var/www/helab/pgi/ftp /var/www/helab/pgi/bin/ftpuser &');
		//echo "You entered the first channel<br>";
	}
	if($format=="two")
	{
		
		//echo "I am warfarin2";	
		echo "We have analyzing your data<br>";
		
		system('nohup python /var/www/helab/pgi/bin/pair_warfarin.py '.$account.' '.$value1.' '.$value2.' '.$age.' '.$race.' '.$cm.' '.$kg.' '.$enzyme.' '.$amiodarone.' /var/www/helab/pgi/bin/hg19 /var/www/helab/pgi/bin/rsid_chr_pos.txt /var/www/helab/pgi/ftp /var/www/helab/pgi/bin/ftpuser &');
		
	}	
}

?> 
