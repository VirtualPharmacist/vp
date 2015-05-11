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

// create new PDF document
$pdf = new TOC_TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PGIpharm');
$pdf->SetTitle('PGIpharm drug response report');
$pdf->SetSubject('PGIpharm PDF');
$pdf->SetKeywords('PGI, PDF, research, test, report');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

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


$tmp_system_name="tmp";
$tmp_subsystem_name="tmp";
$tmp_drug_name="tmp";

$sql1="select * from example order by System";
$res1=mysql_query($sql1) or die(mysql_error());

while($row1=mysql_fetch_array($res1))	//开始大循环了
{
	if($tmp_system_name!=$row1['System'])
	{
		$tmp_system_name=$row1['System'];
		$pdf->AddPage();
		$pdf->Bookmark(ucfirst(strtolower($tmp_system_name)), 0, 0, '', 'B', array(0,64,128));
		$pdf->writeHTML('<h1>'.ucfirst(strtolower($tmp_system_name)).'</h1>', true, false, true, false, '');
		$sql2="select * from example where System like '%$tmp_system_name%' order by subSystem";
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
				$pdf->writeHTML('<h2>'.ucfirst(strtolower($tmp_subsystem_name1)).'</h2>', true, false, true, false, '');
				$sql3="select * from example where System like '%$tmp_system_name%' and subSystem like '%$tmp_subsystem_name%' order by Drug";
				$res3=mysql_query($sql3);
				while($row3=mysql_fetch_array($res3))
				{
					if($tmp_drug_name!=$row3['Drug'])
					{
						$drug_info="";	
						$tmp_drug_name=$row3['Drug'];
						$drug_name3=$row3['Drug'];                 //获得首字母大写的亚型
						if($row3['info']!='')
						{
							$drug_info=$row3['info'];
							}
						else
						{
							$drug_info='There is not any information of this kind of drug at present';
							}
						$split_drug_s = strpos(str_replace(array("\"","\'"),"",$row3['Drug']),"--");              //获取drug的长度
						$drug_name = substr(str_replace(array("\"","\'"),"",$row3['Drug']),0,$split_drug_s);
						$drug_name1= strtolower($drug_name);
						$drug_name2= ucfirst($drug_name1);
						
						//$pdf->AddPage();
						$pdf->Bookmark($drug_name2, 2, 0, '', 'I', array(0,128,0)); 						
						$pdf->writeHTML('<h3>'.$drug_name2.'</h3>', true, false, true, false, '');
						$pdf->writeHTML('<br><br>The basic information of '.'<b>'.$drug_name2.'</b>'.'<br>'.$drug_info.'<br><br><br>', true, false, true, false, '');
						$sql4="select * from example where System like '%$tmp_system_name%' and subSystem like '%$tmp_subsystem_name%' and Drug LIKE '%$tmp_drug_name%'";
						$res4=mysql_query($sql4);

						$pdf->writeHTML('
<h3>Your genetic data</h3>
<table cellpadding="0" cellspacing="0">
<hr size="590" color="#999999">
 <tr>
  <td width="80" align="left">SNPs ID</td>
  <td width="110" align="left">Evidence level</td>
  <td width="80" align="left">Gene</td>
  <td width="110" align="left">Your genotype</td>
  <td width="70" align="left">Efficacy</td>
  <td width="70" align="left">Dosage</td>
  <td width="70" align="left">Toxicity</td>
 </tr>
 </table>
', true, false, true, false, '');

						$sentence='<Br>';
						while($row4=mysql_fetch_array($res4))
						{

							$sentence .= 'The description of <b>'.$row4['RSID'].'</b><br>'.$row4['Sentence'].'<br><br><br>';
	
							/*if($row4['Efficacy']=='increased')
							{
								$efficacy='<img src="images/2.gif" />';
								}
							if($row4['Efficacy']=='decreased')
							{
								$efficacy='<img src="images/1png.png" />';
								}
							if($row4['Efficacy']=='-')
							{
								$efficacy='<img src="images/3.png" />';
								}
							if($row4['Dosage']=='increased')
							{
								$dosage='<img src="images/2.gif" />';
								}
							if($row4['Dosage']=='decreased')
							{
								$dosage='<img src="images/1png.png" />';
								}
							if($row4['Dosage']=='-')
							{
								$dosage='<img src="images/3.png" />';
								}
							if($row4['Toxicity']=='increased')
							{
								$toxicity='<img src="images/2.gif" />';
								}
							if($row4['Toxicity']=='decreased')
							{
								$toxicity='<img src="images/1png.png" />';
								}
							if($row4['Toxicity']=='-')
							{
								$toxicity='<img src="images/3.png" />';
								}*/
							if($row4['Level']=='Level 1A')
							{
								$level='<img src="images/level1A.png" />';
								}
							if($row4['Level']=='Level 1B')
							{
								$level='<img src="images/level1B.png" />';
								}
							if($row4['Level']=='Level 2A')
							{
								$level='<img src="images/level2A.png" />';
								}
							if($row4['Level']=='Level 2B')
							{
								$level='<img src="images/level2B.png" />';
								}
							if($row4['Level']=='Level 3')
							{
								$level='<img src="images/level3.png" />';
								}
							if($row4['Level']=='Level 4')
							{
								$level='<img src="images/level4.png" />';
								}
								$rsid=$row4['RSID'];
								$genotype=$row4['Genotype'];
								$gene=$row4['Gene'];
								//$level=$row4['Level'];	
								$efficacy=$row4['Efficacy'];
								$dosage=$row4['Dosage'];
								$toxicity=$row4['Toxicity'];
							$html='
<table cellpadding="0" cellspacing="0">
 <tr>
  <td width="80" align="left"><font color="#999999">'.$rsid.'</font></td>
  <td width="110" align="left"><font color="#999999">'.$level.'</font></td>
  <td width="80" align="left"><font color="#999999">'.$gene.'</font></td>
  <td width="110" align="left"><font color="#999999">'.$genotype.'</font></td>
  <td width="70" align="left"><font color="#999999">'.$efficacy.'</font></td>
  <td width="70" align="left"><font color="#999999">'.$dosage.'</font></td>
  <td width="70" align="left"><font color="#999999">'.$toxicity.'</font></td>
 </tr>
 </table>
';
							$pdf->writeHTML($html, true, false, true, false, '');
							  																	
							}
						$pdf->writeHTML('<hr size="590" color="#7ACF78">', true, false, true, false, '');
						$pdf->writeHTML('<div style="padding-left:100"><font style="font-size:8pt;" color="#999999">For a list of references for each variant, please see the freely available PGIpharm on the Internet https://www.sustc-genome.org.cn/pgi</font></div>', true, false, true, false, '');
						
						$pdf->writeHTML($sentence, true, false, true, false, '');				
						}
					}
				}
			}
		}
		
	}

	



$pdf->addTOCPage();
// write the TOC title and/or other elements on the TOC page
$pdf->SetFont('', 'B', 16);
$pdf->MultiCell(0, 0, 'User report', 0, 'C', 0, 1, '', '', true, 0);
$pdf->Ln();
$pdf->SetFont('helvetica', '', 10);

// define styles for various bookmark levels
$bookmark_templates = array();


// A monospaced font for the page number is mandatory to get the right alignment
$bookmark_templates[0] = '<table border="0" cellpadding="0" cellspacing="0" style="background-color:#EEFAFF"><tr><td width="155mm"><span style="font-weight:bold;font-size:12pt;color:black;">#TOC_DESCRIPTION#</span></td><td width="25mm"><span style="font-family:courier;font-weight:bold;font-size:12pt;color:black;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';
$bookmark_templates[1] = '<table border="0" cellpadding="0" cellspacing="0"><tr><td width="5mm">&nbsp;</td><td width="150mm"><span style="font-size:11pt;color:green;">#TOC_DESCRIPTION#</span></td><td width="25mm"><span style="font-family:courier;font-weight:bold;font-size:11pt;color:green;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';
$bookmark_templates[2] = '<table border="0" cellpadding="0" cellspacing="0"><tr><td width="10mm">&nbsp;</td><td width="145mm"><span style="font-size:10pt;color:#666666;"><i>#TOC_DESCRIPTION#</i></span></td><td width="25mm"><span style="font-family:courier;font-weight:bold;font-size:10pt;color:#666666;" align="right">#TOC_PAGE_NUMBER#</span></td></tr></table>';
// add other bookmark level templates here ...

// add table of content at page 1
// (check the example n. 45 for a text-only TOC
$pdf->addHTMLTOC(1, 'INDEX', $bookmark_templates, true, 'B', array(128,0,0));

// end of TOC page
$pdf->endTOCPage();
//Change To Avoid the PDF Error
 ob_end_clean();
$pdf->Output('user_report.pdf', 'D');
?>
<!--<tr bgcolor="#CCCCCC" style="background-color:#CCC #FFFFFF">
