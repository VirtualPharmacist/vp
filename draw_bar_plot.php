<?php
 /*
     Example12 : A true bar graph
 */

 // Standard inclusions   
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
 $Test = new pChart(910,400);	#设置画布大小
 $Test->setFontProperties("Fonts/tahoma.ttf",8);	
 $Test->setGraphArea(60,30,750,350);	#这个是设置图像大小的
 $Test->drawFilledRoundedRectangle(7,7,903,393,5,240,240,240);	#设置边框大小
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
 $Test->Render("$test.png");
?>


<div align="center"><img src="<?php echo $test; ?>.png"></div>
