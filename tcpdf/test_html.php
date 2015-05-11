<?php

// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');
require_once('config/eng.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 061');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

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

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

// define some HTML content with style
// add a page
$s=11;
$html = '
<hr size="590" color="#CCCCCC">
<div style="padding-left:100"><font style="font-size:8pt;" color="#999999">For a list of references for each variant, please see the freely available PGIpharm on the Internet https://www.sustc-genome.org.cn/pgi</font></div>
<hr size="590" color="#66FF66">
';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$ss='sdfsdf';
$html = '
<table class="first" cellpadding="4" cellspacing="6">
 <tr>
  <td width="110" align="center"><b>SNPs ID</b></td>
  <td width="110" align="center"><img src="images/2.gif" alt="test alt attribute" /></td>
  <td width="90" align="center"><img src="images/level1A.png" /></td>
  <td width="100" align="center"> <b>'.$s.'</b></td>
  <td width="60" align="center"><b>Efficacy</b></td>
  <td width="60" align="center"><b>Dosage</b></td>
  <td width="60" align="center"><b>Toxicity</b></td>  
 </tr>
</table>';
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_061.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>
<font  color="#999999"></font>