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
<link href="default.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->
<link href="table.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->
</head>
<body>
<!-- start header -->
<?php 
include("head.php");
?>
<!-- end header -->


<!-- start menu -->
<?php include("navbar.php");
			include("mysql_connect.php");
?>
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
			<?php 
				$sample = $_POST['checkbox'];
				$file_code = $_POST['file_code'];
				
				$all_sample = count($sample);
				#print $all_sample."\n";
				$sql0 = "SELECT DISTINCT b.Drug,b.Count  FROM (SELECT a.*, count(a.RSID) AS Count FROM (SELECT *, COUNT(*) AS Num FROM statistics_report GROUP BY Drug, RSID, Genotype) a GROUP BY a.RSID, a.Drug) b WHERE b.Count > 1;";
				#print "$sql0\n";
				$res0 = mysql_query($sql0) or die(mysql_error());
				while($row0=mysql_fetch_array($res0)){
					$array[] = $row0['Drug'];
					#print "test<br>";
					}
				#print_r($array);
				
				

				
				
				$count = 0;
				?><br><?php
				#print_r($array);
				if(!empty($array)){
					foreach($array as $test){
				?>
				<h3><a href="get_result.php?drug=<?php echo $test; ?>&size=<?php echo $all_sample ?>&file_code=<?php echo $file_code ?>"><?php echo ucfirst($test); ?></a></h3>
				
				<b>Description:</b>
				<?php 
					
					$sql1 ="SELECT DISTINCT Drug, info FROM test WHERE Drug = '$test'";
					$res1 = mysql_query($sql1);
					while($row1=mysql_fetch_array($res1)){
						$des = $row1['info'];
						
						}
						echo "<br>$des";
				
				?>
				<br><br>
                <p class="meta">&nbsp;&nbsp;&nbsp; <a href="get_result.php?drug=<?php echo $test; ?>&size=<?php echo $all_sample; ?>&file_code=<?php echo $file_code; ?>" class="comments">more</a></p>
                	
			<?php }　?>
				
				<?php	}
				if(empty($array)){?>
						<div align="center"><h3>There is no drug related variant in your samples</h3></div>
						<h4>Please make sure:</h4>
						<p>1: You have upload enough samples</p>
						<p>2: There are enough variant in your samples</p>
				<?php	} ?>
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

