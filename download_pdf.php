<?php

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');
require_once('tcpdf/config/eng.php');
require_once('mysql_connect.php');
/**
 * TCPDF class extension with custom header and footer for TOC page
 */
class TOC_TCPDF extends TCPDF {

	/**
 	 * Overwrite Header() method.
	 * @public
	 */

} // end of class
$file_code=$_GET['file_code'];
// create new PDF document
$pdf = new TOC_TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('VP');
$pdf->SetTitle('VP drug response report');
$pdf->SetSubject('VP PDF');
$pdf->SetKeywords('VP, PDF, research, test, report');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING.' '.$file_code);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)


// set font
$pdf->SetFont('helvetica', '', 10);

$drug_info='';
$tmp_system_name="tmp";
$tmp_subsystem_name="tmp";
$tmp_drug_name="tmp";
$sql1="select * from $file_code order by System";
$res1=mysql_query($sql1) or die(mysql_error());
$pdf->AddPage();
$i=0;
while($row1=mysql_fetch_array($res1))	//开始大循环了
{
	if($tmp_system_name!=$row1['System'])
	{
		$tmp_system_name=$row1['System'];
		//$pdf->AddPage();
		$pdf->Bookmark(ucfirst(strtolower($tmp_system_name)), 0, 0, '', 'B', array(0,64,128));
		//$pdf->writeHTML('<h1>'.ucfirst(strtolower($tmp_system_name)).'</h1>', true, false, true, false, '');
		$sql2="select * from $file_code where System like '%$tmp_system_name%' order by subSystem";
		$res2=mysql_query($sql2);
		while($row2=mysql_fetch_array($res2))
		{
			if($tmp_subsystem_name!=$row2['subSystem'])
			{
				$tmp_subsystem_name1=$row2['subSystem'];
				if($row2['subSystem']=="")
				{
					$tmp_subsystem_name1="Unclassified";
					}
				
				//$pdf->AddPage();
				$tmp_subsystem_name=$row2['subSystem'];
				$pdf->Bookmark(ucfirst(strtolower($tmp_subsystem_name1)), 1, 0, '', '', array(128,0,0));
				//$pdf->writeHTML('<h2>'.ucfirst(strtolower($tmp_subsystem_name1)).'</h2>', true, false, true, false, '');
				$sql3="select * from $file_code where System like '%$tmp_system_name%' and subSystem like '%$tmp_subsystem_name%' order by Drug";
				$res3=mysql_query($sql3);
				while($row3=mysql_fetch_array($res3))
				{
					if($tmp_drug_name!=$row3['Drug'])
					{	
						if($i!=0)
						{
							$pdf->AddPage();
							}
						$i=1;
						$drug_info="";
						$fda_label = "";	
						$tmp_drug_name=$row3['Drug'];
						$drug_name3=$row3['Drug'];                 //获得首字母大写的亚型
						$sql_fda = "select distinct Drug from fda_drug where Drug = '$tmp_drug_name'";
						$res_fda = mysql_query($sql_fda) or die(mysql_error());
						$fda_num = mysql_num_rows($res_fda);
						if($fda_num != 0){
							$fda_label = "(FDA pharmacogenomic biomarker)";
							}
						
							$drug_info=$row3['info'];
						if($file_code == "example"){
							$split_drug_s = strpos(str_replace(array("\"","\'"),"",$row3['Drug']),"--");              //获取drug的长度
							$drug_name = substr(str_replace(array("\"","\'"),"",$row3['Drug']),0,$split_drug_s);							
							}
						else{
							$drug_name = $row3['Drug'];
							}
						$drug_name1= strtolower($drug_name);
						$drug_name2= ucfirst($drug_name1);
						
						//$pdf->AddPage();
						$pdf->Bookmark($drug_name2.$fda_label, 2, 0, '', 'I', array(0,128,0)); 						
						$pdf->writeHTML('<h1>'.$drug_name2.$fda_label.'</h1>', true, false, true, false, '');
						$pdf->writeHTML(''.'<br>'.$drug_info.'<br>', true, false, true, false, '');
						$sql4="select * from $file_code where System like '%$tmp_system_name%' and subSystem like '%$tmp_subsystem_name%' and Drug LIKE '%$tmp_drug_name%'";
						$res4=mysql_query($sql4);

						$pdf->writeHTML('
<h3>Your genetic data</h3>
<table cellpadding="0" cellspacing="0">
<hr size="590" color="#999999">
 <tr>
  <td width="80" align="center">SNPs ID</td>
  <td width="110" align="center">Evidence level</td>
  <td width="80" align="center">Gene</td>
  <td width="110" align="center">Your genotype</td>
  <td width="70" align="center">Efficacy</td>
  <td width="70" align="center">Dosage</td>
  <td width="70" align="center">Toxicity</td>
 </tr>
 </table>
', true, false, true, false, '');

						$sentence='<Br>';
						while($row4=mysql_fetch_array($res4))
						{
							$dosage='<font color="#999999">NA</font>';
							$efficacy='<font color="#999999">NA</font>';
							$toxicity='<font color="#999999">NA</font>';
							$sentence .= 'The description of <b>'.$row4['RSID'].'</b><br>'.$row4['Sentence'].'<br><br>';
	
							if($row4['Efficacy']=='increased')
							{
								$efficacy='<font color="#7ED10E">'.$row4['Efficacy'].'</font>';
								}
							if($row4['Efficacy']=='decreased')
							{
								$efficacy='<font color="#FF3300">'.$row4['Efficacy'].'</font>';
								}
							if($row4['Efficacy']=='-')
							{
								$efficacy='<font color="#999999">NA</font>';
								}
							if($row4['Dosage']=='increased')
							{
								$dosage='<font color="#FF3300">'.$row4['Dosage'].'</font>';
								}
							if($row4['Dosage']=='decreased')
							{
								$dosage='<font color="#7ED10E">'.$row4['Dosage'].'</font>';
								}
							if($row4['Dosage']=='-')
							{
								$dosage='<font color="#999999">NA</font>';
								}
							if($row4['Toxicity']=='increased')
							{
								$toxicity='<font color="#FF3300">'.$row4['Toxicity'].'</font>';
								}
							if($row4['Toxicity']=='decreased')
							{
								$toxicity='<font color="#7ED10E">'.$row4['Toxicity'].'</font>';
								}
							if($row4['Toxicity']=='-')
							{
								$toxicity='<font color="#999999">NA</font>';
								}
							if($row4['Level']=='Level 1A')
							{
								$level='<img src="tcpdf/images/level1A.png" />';
								}
							if($row4['Level']=='Level 1B')
							{
								$level='<img src="tcpdf/images/level1B.png" />';
								}
							if($row4['Level']=='Level 2A')
							{
								$level='<img src="tcpdf/images/level2A.png" />';
								}
							if($row4['Level']=='Level 2B')
							{
								$level='<img src="tcpdf/images/level2B.png" />';
								}
							if($row4['Level']=='Level 3')
							{
								$level='<img src="tcpdf/images/level3.png" />';
								}
							if($row4['Level']=='Level 4')
							{
								$level='<img src="tcpdf/images/level4.png" />';
								}
								$rsid=$row4['RSID'];
								$genotype=$row4['Genotype'];
								$gene=$row4['Gene'];

							$html='
<table cellpadding="0" cellspacing="0">
 <tr>
  <td width="80" align="center"><font color="#999999">'.$rsid.'</font></td>
  <td width="110" align="center"><font color="#999999">'.$level.'</font></td>
  <td width="80" align="center"><font color="#999999">'.$gene.'</font></td>
  <td width="110" align="center"><font color="#999999">'.$genotype.'</font></td>
  <td width="70" align="center">'.$efficacy.'</td>
  <td width="70" align="center">'.$dosage.'</td>
  <td width="70" align="center">'.$toxicity.'</td>
 </tr>
 </table>
';
							$pdf->writeHTML($html, true, false, true, false, '');
							  																	
							}
						$pdf->writeHTML('<hr size="590" color="#7ACF78">', true, false, true, false, '');
						$pdf->writeHTML('<div style="padding-left:100"><font style="font-size:8pt;" color="#999999">For a list of references for each variant, please see the freely available VP on the Internet https://www.sustc-genome.org.cn/vp</font></div>', true, false, true, false, '');
						
						$pdf->writeHTML($sentence, true, false, true, false, '');				
						}
					}
				}
			}
		}
		
	}

$pdf->AddPage();
$pdf->writeHTML('<br><Br><br><h1>The overview of VP</h1><br><br><div align="left"><b>VP</b> which is developed by He lab in the South University of Science and Technology of China is an online tool that interprets personal genome for the impact of genetic variation on drug response. Base on the carefully selected data from international and authoritative includinig PharmGKB, dbSNP and DrugBank，we can take high-throughput sequencing raw data or microarray SNP genotyping data as inputs, and reports to the users how the variants in their personal genomes impact the response to 193 drugs, including efficacy, dosage and toxicity. </div>', true, false, true, false, '');
	

if (count($pdf->PageNo()) === 1) { // Do this only on the first page


$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);
}

$pdf->addTOCPage();
$pdf->writeHTML('<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><div align="center"><font size="25px" ><b>VP Genetic Results</b></font></div>
<br><br><br><br><div align="center">Prepared for: '.$file_code.'</div>
<div align="center">'.date('M j, Y').'</div>
<br><br><br><br><div align="center"></div> 
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>', true, false, true, false, '');

// write the TOC title and/or other elements on the TOC page
$pdf->SetFont('', 'B', 16);
//$pdf->writeHTML('<br><br><br><br><div align="center">Table content of User report</div>', true, false, true, false, '');
$pdf->Ln();
$pdf->SetFont('helvetica', '', 10);

// define styles for various bookmark levels
$bookmark_templates = array();


// A monospaced font for the page number is mandatory to get the right alignment
$bookmark_templates[0] = '<table border="0" cellpadding="0" cellspacing="0" ><tr><td width="155mm"><span style="font-weight:bold;font-size:12pt;color:black;">#TOC_DESCRIPTION#</span></td><td width="25mm"><span style="font-family:courier;font-weight:bold;font-size:12pt;color:black;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';
$bookmark_templates[1] = '<table border="0" cellpadding="0" cellspacing="0"><tr><td width="5mm">&nbsp;</td><td width="150mm"><span style="font-size:11pt;color:green;">#TOC_DESCRIPTION#</span></td><td width="25mm"><span style="font-family:courier;font-weight:bold;font-size:11pt;color:green;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';
$bookmark_templates[2] = '<table border="0" cellpadding="0" cellspacing="0"><tr><td width="10mm">&nbsp;</td><td width="145mm"><span style="font-size:10pt;color:#666666;"><i>#TOC_DESCRIPTION#</i></span></td><td width="25mm"><span style="font-family:courier;font-weight:bold;font-size:10pt;color:#666666;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';
// add other bookmark level templates here ...

// add table of content at page 1
// (check the $file_code n. 45 for a text-only TOC
$pdf->addHTMLTOC(1, 'INDEX', $bookmark_templates, true, 'B', array(128,0,0));

// end of TOC page
$pdf->endTOCPage();
//Change To Avoid the PDF Error
 ob_end_clean();
$pdf->Output('user-report.pdf', 'D');
?>
<!--<tr bgcolor="#CCCCCC" style="background-color:#CCC #FFFFFF">
