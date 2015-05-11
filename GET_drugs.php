<!DOCTYPE html>																		
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php include("title.php") ?>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->

<style>


#cy {
height: 969px;
width: 969px;
position: relative;
background-color: #F2F2F2;
border-radius: 5px 10px 10px 10px;
-moz-border-radius: 5px 10px 10px 10px;
-webkit-border-radius: 5px 10px 10px 10px;
border: 2px solid #cccccc;
}
.system_block
{
	padding-bottom:0px;
	padding-right:0px;
	padding-top:0px;
	margin-bottom::0px;
	margin-top:0px;
	margin:0px;
	background:#DBEBF9;/*circle*/
	display:none;

}
.druglist
{
	padding-bottom:0px;
	padding-right:0px;
	padding-top:0px;
	margin-bottom::0px;
	margin-top:0px;
	background:#FAFBF2;
	list-style:none;		/*circle*/
	display:none;	
	padding-left:5px;
}
.drug a:hover
{
	color:#000;
	font-weight:bold;
	
}
.drug a
{
	margin 0px 0px 0px 0px;
	padding 0px 0px 0px 0px;
	padding-bottom:4px;
	color:#E8F7D2;

}
.YiJiCaiDan {
	width:850px;
	height:26px;
  color:#347598;
  padding-left:2px;
	margin:0px;
}
.drug {
	margin 0px;
	padding 0px;
	padding-bottom:4px;
	color:#E8F7D2;
	padding-left:5px;
  border-bottom:dotted 1px;
}
.p {
  color:#FFF;
	font-size:16px;
}
.post
{
	padding-top:30px;
}
.LingJiCaiDan
{
	background:#B7D8F2;
	margin-bottom:0px;
	margin-top:0px;
	height:32px;
	font-size:20px;
	font-weight:bold;
	color:#000;
	font-weight:bold;
	padding-left:5px;
	margin-bottom:1px;
	
}
</style>
<?php
include "mysql_connect.php";
$i=0;
$file_code=$_GET['file_code'];
$sql1="SELECT * FROM system_list ORDER BY System";
$res1=mysql_query($sql1);
$sql11="select * from ".$file_code;
$res11=mysql_query($sql11);
while($row11=mysql_fetch_array($res11))
{	if($row11['RSID']!='')
	{
		$i=1;
		break;
	}
}

//echo $i; 是用来判断是否用打印表格的

?>
<?php include("tree.php"); ?>
</head>
<body>
<?php
include("head.php");
?>

<!-- start menu -->
<?php include("navbar.php") ?>
<!-- end menu -->


<!-- start page -->
<div id="page">
  <!-- start content -->
  <div id="content">
    <h1 class="pagetitle">&nbsp;</h1>
    <a href="#" id="rss-posts"></a>
    
    <div class="post">
    	<h2 class="title">Your Results</h2>
      	
        
      <?php if($i!=0){ //如果搜到结果了 ?>
      <div class="entry"> 
      	<b>Network profile of the result</b>
        <hr size="3" color="#BDBDBD" width="100%" />
        <div id="cy"></div>
        <br>
        <b>Click the links below to view your drug response data</b>
        <hr size="3" color="#BDBDBD" width="100%" />

      <?php $h=0; 
			while($row1=mysql_fetch_array($res1)){ 	//一级菜单 大while循环开始		?>
      
      <?php 
				$system_name=ucfirst(strtolower($row1['System']));
				$sql="SELECT * FROM $file_code WHERE System LIKE '%$system_name%' ORDER BY subSystem, Drug";
				//echo $sql;
				$res=mysql_query($sql);
				$s=mysql_num_rows($res);	//判断搜索这种药物subsystem 有没有搜到结果		
				$mm=0;				//用来以后做标签划分 
				
			 if($s != 0) {
				?>
       <?php
					if($h==0){
					 $sql66="SELECT * FROM $file_code WHERE System LIKE '%$system_name%' ORDER BY subSystem";
					 $res66=mysql_query($sql66);
					 while($row66=mysql_fetch_array($res66))		
					 {
						 if($h==0)
						 {
							 $tmp_hehe=$row66['System'];
						 }
						 $h++;
					 }
					}
				?>
				<?php if($row1['System']!=$tmp_hehe)
				 {
					 	
						?>
        </div>
        </div>
				 			<!--以后在这个地方放置零级菜单的标签-->					
				 <?php } ?>
				
         <div class="system">
         <div class="LingJiCaiDan"><?php echo $system_name; ?><font size="-1" color="#000000">&nbsp;&nbsp;&nbsp;(<?php echo $s ?>)</font></div>
				 <div class="system_block">
         <?php
          $tmp_name="tmp";
          $tmp_system="tmp";
          $i=1;
          $q=0;   
          while ($row = mysql_fetch_array($res)) {
            $a=str_replace(array("\"","\'"),"",$row['subSystem']);
						
            if ($a != "") {		//判断亚型不为空
							$subSystem_name=$row['subSystem'];
              if($tmp_system != $a) {
                $q++;  
                $tmp_system=$a;
                $subSystem=strtolower($tmp_system);
                $subSystem1=ucfirst($subSystem);
				$drug_name3=$row['Drug'];                 //获得首字母大写的亚型
				
				if($file_code == "example"){
                	$split_drug_s = strpos(str_replace(array("\"","\'"),"",$row['Drug']),"--");              //获取drug的长度
                	$drug_name = substr(str_replace(array("\"","\'"),"",$row['Drug']),0,$split_drug_s);
				
					}				
                else{
					$drug_name = $row['Drug'];
					}
				$drug_name1= strtolower($drug_name);
                $drug_name2= ucfirst($drug_name1);
				
              if ($q != 1) {
        ?>
          </div>
        </div>											<!--结束一个div,结束上一个亚型生成的div-->
        <?php
                 }
				$sql11="SELECT * FROM $file_code WHERE System LIKE '%$system_name%' AND subSystem LIKE '%$subSystem_name%' ORDER BY Drug DESC";
				//echo $sql;
				$res11=mysql_query($sql11);
				$s11=mysql_num_rows($res11);								 
				$sql111="SELECT * FROM $file_code WHERE System LIKE '%$system_name%' AND subSystem LIKE '%$subSystem_name%' AND Drug LIKE '%$drug_name3%' ORDER BY Drug DESC";		
				$res111=mysql_query($sql111);
				$s111=mysql_num_rows($res111);						 
								 
								 
        ?>
        
        <div class="subsystem">			<!--将自己的下拉菜单放到一起-->
          <h4 class="YiJiCaiDan" id="<?php echo "pp".$q ?>"><?php echo $subSystem1 ?><font size="-1"> (<?PHP echo $s11; ?>)</font></h4>   
          <div class="druglist">
        <?php if ($tmp_name != $drug_name2) {

				
				?>
            <div class="drug"><a href="GET_data.php?Drug=<?php echo $drug_name2; ?>&code=<?php echo $file_code;?>&System=<?php echo $system_name; ?>&subsystem=<?php echo $subSystem1 ?>"><?php echo $drug_name2; ?> <font size="-1">(<?php echo $s111 ?>)</font></a></div>
        <?php
                $tmp_name = $drug_name2;
              }
            } else {
					    //如果没有新的亚型名出现

				if($file_code == "example"){
                	$split_drug_s = strpos(str_replace(array("\"","\'"),"",$row['Drug']),"--");              //获取drug的长度
                	$drug_name = substr(str_replace(array("\"","\'"),"",$row['Drug']),0,$split_drug_s);
				
					}				
                else{
					$drug_name = $row['Drug'];
					}
              $drug_name1= strtolower($drug_name);
              $drug_name2= ucfirst($drug_name1);     
              if($tmp_name != $drug_name2) {
								$drug_name4=$row['Drug'];
				$sql333="SELECT * FROM $file_code WHERE System LIKE '%$system_name%' AND subSystem LIKE '%$subSystem_name%' AND Drug LIKE '%$drug_name4%'";		
				$res333=mysql_query($sql333);
				$s333=mysql_num_rows($res333);
					
        ?>
            <div class="drug"><a href="GET_data.php?Drug=<?php echo $drug_name2; ?>&code=<?php echo $file_code;?>&System=<?php echo $system_name; ?>&subsystem=<?php echo $subSystem1 ?>"><?php echo $drug_name2; ?> <font size="-1">(<?php echo $s333 ?>)</font></a></div>
        <?php 
              $tmp_name=$drug_name2;
            }
          }					//结束没有新的亚型出现的循环语句
        } else {    //结束字符串非空筛选，开始疾病的亚型名称的筛选字符串为空的筛选
       		//这个if只会进去一次
          if ($i == 1) {
            $q++;
            $tmp_system1="Unclassified";
            if ($q != 1) {
        ?>
          </div>
        </div>
        <?php
            }
				$sql22="SELECT * FROM $file_code WHERE System LIKE '%$system_name%' AND subSystem ='' ORDER BY Drug DESC ";
				//echo $sql;
				$res22=mysql_query($sql22);
				$s22=mysql_num_rows($res22);							
						
						

        ?>
        <div class="subsystem">
          <h4 class="YiJiCaiDan" id="<?php echo "qq".$q ?>"><?php echo $tmp_system1?> <font size="-1">(<?php echo $s22 ?>)</font></h4>
          <div class="druglist">
        <?php 
            $i = 2;                        
          }
				if($file_code == "example"){
                	$split_drug_s = strpos(str_replace(array("\"","\'"),"",$row['Drug']),"--");              //获取drug的长度
                	$drug_name = substr(str_replace(array("\"","\'"),"",$row['Drug']),0,$split_drug_s);
				
					}				
                else{
					$drug_name = $row['Drug'];
					}          
		  $drug_name1= strtolower($drug_name);
          $drug_name2= ucfirst($drug_name1); 
		 //$drug_name2=$row['Drug'];
          if ($tmp_name != $drug_name2) {
						$drug_name5=$drug_name2;
					$sql444="SELECT * FROM $file_code WHERE System LIKE '%$system_name%' AND subSystem='' AND Drug LIKE '%$drug_name5%' ORDER BY Drug DESC";		
				$res444=mysql_query($sql444);
				$s444=mysql_num_rows($res444);						
					
						?>
            <div class="drug"><a href="GET_data.php?Drug=<?php echo $drug_name2; ?>&code=<?php echo $file_code;?>&System=<?php echo $system_name; ?>&subsystem=<?php echo "Unclassified" ?>"><?php echo $drug_name2; ?> <font size="-1">(<?php echo $s444 ?>)</font></a></div>
        <?php
            $tmp_name = $drug_name2;
          }
        }
          }  //结束while循环 ?>
          </div>
        </div>
        <?php }//结束字符串非空的if语句  ?>    
				<?php $mm++;
				
				
				
				
				 }  //一级菜单小while循环结束  ?>
         </div>
        </div>
			<div class="brief_c" style="margin-right:0;margin-left:0;text-align:right;">
                You can download your  user report(<a href="download_pdf.php?file_code=<?php echo $file_code ?>">User-report.pdf</a>) here.
            </div>
      </div>
      <?php }?>
      <?php if($i==0){ ?>
      <p><b>The result is empty. It is because:</b></p>
      <div>There isn't any drug response information in your exome data </div>
      <div>The exome data file is not complete</div>
	  <?php } ?>
      <p class="meta"> &nbsp;&nbsp;&nbsp; <a href="user_guide.php#drug_response" class="comments"  target="_blank">Help</a></p>
    </div>
  </div>
  <!-- end content -->
  <!-- start sidebar -->
  <?php include("sidebar.php"); ?>
  <!-- end sidebar -->
  <div style="clear: both;">&nbsp;</div>
</div>
<!-- end page -->
<?php 
include("foot.php");?>
<script src="js/jquery-1.11.0.js"></script> <!-- 以后不能再忘了 用JQuery时 一定要调用google的包！！！ -->
<script>
     $(".LingJiCaiDan").click(function () {
      $(this).next().slideToggle("slow");		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
    $(".YiJiCaiDan").click(function () {
      $(this).next().slideToggle("slow");		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
     $(".LingJiCaiDan").mouseover(function () {
      $(this).css({"background":"#91C5E8"});		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
     $(".LingJiCaiDan").mouseout(function () {
      $(this).css({"background":"#B7D8F2"});		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
     $(".subsystem").mouseover(function () {
      $(this).css({"background":"#C7E1F3"});		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });
     $(".subsystem").mouseout(function () {
      $(this).css({"background":"#DBEBF9"});		//this指的是(触发click事件	的)类或者id	//next就是紧挨着自己的下一个标签(在代码中就是ul标签)
    });	
</script>

<script src="cytoscape/build/cytoscape.min.js"></script>
<script src="cytoscape/lib/dagre.js"></script>
<script src="cytoscape/lib/springy.js"></script>
<script src="cytoscape/lib/arbor.js"></script>
<script src="cytoscape/lib/cose.js"></script>
<script src="cytoscape/lib/cola.v3.min.js"></script>
<script src="code.js"></script>
</body>
</html>
