<!DOCTYPE html>


<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$page_title="PGI - Personal Genome Interpretation";
$file_code = uniqid();
include("upload_js.php");
?>
<head>

<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen" />

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php include("title.php") ?>
<link href="default.css" rel="stylesheet" type="text/css" media="screen" /><!--导入css链接-->
</head>
<style>

h2
{
	color:#000;
}
.post
{
	padding-top:30px
}
.outline ul
{
	list-style:none;
	padding:0px;
}
.one
{
	font-size:22px;
	font-weight:bold;
}
.two
{
	font-size:18px;

}
</style>
<body>
<!-- start header -->
<?php 
include("head.php");
?>
<!-- end header -->


<!-- start menu -->
<?php include("navbar.php"); ?>
<!-- end menu -->


<!-- start page -->
<div id="page">
	<!-- start content -->
	<div id="content">
		<h1 class="pagetitle">&nbsp;</h1>
		<div class="post">
<strong><font color="#25939E" size="+3">Documentation</font></strong>
<BR />
<div class="outline">
<ul>
<li><a href="documentation.php#q1" class="one">1	General process</a></li>

<li><a href="documentation.php#q2" class="one">2	Data input</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q2.1">2.1	Data input type</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q2.2">2.2	Data file name</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q2.3">2.3	Data file size</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q2.4">2.4	Data input software</a></li>

<li><a href="documentation.php#q3" class="one">3	NGS Data primary accessing</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q3.1">3.1	Bowtie -- sequence alignment</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q3.2">3.2	SamTool -- sequence sorting, duplicates removing</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q3.3">3.3	VarScan -- SNP calling</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q3.4">3.4	Post – processing of NGS data file</a></li>

<li><a href="documentation.php#q4" class="one">4	Database construction</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q4.1">4.1	dbSNP: SNP database</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q4.2">4.2	PharmGKB: Drug—SNP database</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q4.3">4.3	DrugBank: Drug information database</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q4.4">4.4 Database configuration</a></li>

<li><a href="documentation.php#q5" class="one">5	Data analysis</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q5.1">5.1	Variation – drug response association algorithm</a></li>

<li><a href="documentation.php#q6" class="one">6	Data output</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q6.1">6.1	Online data visualization</a></li>
<li style="padding-left:20px" class="two"><a href="documentation.php#q6.2">6.2	Offline result report downloading</a></li>

<li><a href="documentation.php#q7" class="one">7	Reference</a></li>
</ul>
</div>

<br />
<br />
<Br />
<Br />
<strong><font id="q1" color="#4BA4E4" size="+2">1.  General process of Virtural Pharmacist</font></strong>
<br />
<Br />
<center><img src="images/PGI workflow1.png" /></center>
<br>
<br>
<br>
<strong><font id="q2" color="#4BA4E4" size="+2">2.  Data input</font></strong>
<br />
<br />
<strong><font id="q2.1" color="#4BA4E4" size="+1">2.1 Data input type</font></strong>
<Br />
(1): Variant call data format <strong>(.vcf format)</strong>
<Br />
(2): High throughput sequencing data <strong>(.fq format)</strong>
<Br />
(3): SNP microarray data <strong>(.txt format)</strong>
 
<Br>
(For the sake of uploading speed and stability, all of the data files is required to upload with .zip format(See more in <a href='documentation.php#q2.4'>Data input software</a>))
<Br />
<center><img src="images/user_guide/fig1.png" /></center>
<br>
<center><span><strong>Fig.1</strong>: the logos of the common NGS platform companies and microarray platform companies</span></center>
<br>
<Br>
<strong><font id="q2.1.1" color="#4BA4E4" >2.1.1	Variant call format data:</font></strong>
<br>
VCF is a text file format (most likely stored in a compressed manner). It contains meta-information lines, a header line, and then data lines each containing information about a position in the genome.(<a href="http://samtools.github.io/hts-specs/VCFv4.1.pdf">see more</a>)
<center><img src="images/vcf_sample.png" /></center>
<br>
<center><span><strong>Fig.2</strong>: the sample of variant call format data</span></center>
<br>
This example shows in order a good simple SNP, a possible SNP that has been filtered out because its quality is below 10, a site at which two alternate alleles are called, with one of them (T) being ancestral (possibly a reference sequencing error), a site that is called monomorphic reference (i.e. with no alternate alleles), and a microsatellite with two alternative alleles, one a deletion of 3 bases (TCT), and the other an insertion of one base (A). Genotype data are given for three samples, two of which are phased and the third unphased, with per sample genotype quality, depth and haplotype qualities (the latter only for the phased samples) given as well as the genotypes. The microsatellite calls are unphased.

<br>
<br>
<strong><font id="q2.1.1" color="#4BA4E4" >2.1.2	Next generation sequencing data:</font></strong>
<br>
The high demand for low-cost sequencing has driven the development of high-throughput sequencing. It can produce up to hundreds of Gigabytes of sequencing data per run. However, as the quantities of sequence data increase exponentially, the analysis bottle-neck is yet to be solved. The most common sequencing platform is the Hiseq2000 and Miseq from Illumina [1]
<br>
<center><img src="images/user_guide/fig2.png" /></center>
<br>
<center><span><strong>Fig.2</strong>: the sample of NGS data file – the Human exome data file</span></center>
<br>
<br>
<strong><font id="q2.1.3" color="#4BA4E4" >2.1.3	Microarray data:</font></strong>
<br>
A DNA microarray is a collection of microscopic DNA spots attached to a solid surface. Each DNA spot contains a specific DNA sequence, known as probes. These can be a short section of a gene or other DNA element that are used to hybridize a cDNA or cRNA (also called anti-sense RNA) sample (calledtarget) under high-stringency conditions. Probe-target hybridization is usually detected and quantified by detection of fluorophore-labeled targets to determine relative abundance of nucleic acid sequences in the target. [2] The common microarray platform is from the 23andme, Affymetrix and deCODEme 
<br>
<center><img src="images/user_guide/fig3.png" /></center>
<Br>
<center><span><strong>Fig.3</strong>: the sample of NGS data file – the Human exome data file</span></center>
<br>
<Br>

<strong><font id="q2.2" color="#4BA4E4" size="+1">2.2 Data input name</font></strong>
<br>
The file name should contain only letters(A-Z,a-z), numbers(0-9) or their combinations and should not contain SPACE or dot(.) and other characters. When multiple files are uploaded, each file should have a unique name.
<br>

The high throughput NGS data file should be <strong>*.fq</strong> format(or compressed form), the microarray data should be <strong>*txt</strong> format(or compressed form), the example data file is shown below:
<center><img src="images/user_guide/fig4.png" /></center>
<br>
<br>

<strong><font id="q2.3" color="#4BA4E4" size="+1">2.3 Data file size</font></strong>
<br>
<strong><font id="q2.3.1" color="#4BA4E4" >2.3.1	NGS data file:</font></strong>
<Br>

Due to the huge size of NGS data file (several of gigabytes), you may need the ftp client (such as the FileZilla ) to upload the data to the server (for free download FileZilla, click <a href="https://filezilla-project.org/">here</a>). Our server provide enough temporary and private space for each user to store the NGS data. In order to enhance the privacy, we will send a fit account and password to e-mail box (see more in the ftp account for acquirement )\
<br>
<center><img src="images/user_guide/fig5.png" /></center>
<br>
<center><span><strong>Fig.4</strong>: the interface of data uploading: (a) interface of email acquirement. You just need to input the correct email format and press the botton “go”. We will send a email automatically containing the data ftp account and password. (b)interface of data uploading in the ftp client (Filezilla): type the www.sustc-genome.org.cn into the “host”. And input the account and password to the “account” and “password” block</span></center>
<strong><font id="q2.3.2" color="#4BA4E4" >2.3.2	Microarray data file:</font></strong>
<br>
We provide the online interface to upload the microarray data file in the browser. The only thing you need to do is just press the “Upload” button and choose the desired and correct data file. We will analyze the data file in the meantime. We will send you an email to inform you as long as the analysis is done
<br>
<center><img src="images/user_guide/fig6.png" /></center>
<br>
<center><span><strong>Fig.5</strong>: the user interface of microarray data uploading, be careful that this uploading interface is independent to the NGS uploading interface. Make sure not to mix them.</span></center>
<br>
<strong><font id="q2.3.2" color="#4BA4E4" >2.3.3	The ftp account acquirement:</font></strong>
<Br>
At first you should input the email in the homepage. Then you will receive the e-mail  that is send automatically by the server. The format of email is shown below:
<br>
<center><img src="images/user_guide/fig7.png" /></center>
<br>
<center><span><strong>Fig.6</strong>: the format of email of ftp account, be careful to the underlined information because you will input it to the ftp client to get the private space for data uploading</span></center>
<br>
<strong><font id="q2.4" color="#4BA4E4" size="+1">2.4	Data input software</font></strong>
<Br>
A ftp client should be installed in the user computer so as to transfer the huge size of NGS data. The user guide and download of FTP client can be seen <a href="https://filezilla-project.org/">here</a>
<br>
<Br>
<br>
<strong><font id="q3" color="#4BA4E4" size="+2">3.	NGS Data primary accessing</font></strong>
<br>
<Br>
<center><img src="images/user_guide/Primary data processing.bmp" /></center>

<br>
<center><span><strong>Fig.7</strong>: the flow diagram of the NGS data processing: after the data having transfer to the Server side, it will go through three stages: the sequence alignment, sequence sort, duplicates removing and indexing, and finally the SNP calling. After the primary processing, it will output the SNP final result data file for the further analysis</span></center>
<br>
The NGS data processing can be divided into three parts: the sequence data alignment, Sequence sorting, sequence removing duplicates, indexing and SNP calling. The sequences are aligned to human reference genome (hg19) by Bowtie. Virtural Pharmacist uses Samtools to sort the raw data, remove duplicates, and index the data. Then Virtural Pharmacist applies VarScan to call out the SNPs
<br>
<br>
<strong><font id="q3.1" color="#4BA4E4" size="+1">3.1	Bowtie -- sequence alignment</font></strong>
<Br>
<strong><font id="q3.1.1" color="#4BA4E4" >3.1.1	Introduction of bowtie</font></strong>
<br>
Bowtie is an ultrafast, memory-efficient short read aligner geared toward quickly aligning large sets of short DNA sequences (reads) to large genomes. It aligns 35-base-pair reads to the human genome at a rate of 25 million reads per hour on a typical workstation. Bowtie indexes the genome with a Burrows-Wheeler index to keep its memory footprint small: for the human genome, the index is typically about 2.2 GB (for unpaired alignment) or 2.9 GB (for paired-end or colorspace alignment). Multiple processors can be used simultaneously to achieve greater alignment speed. Bowtie can also output alignments in the standard SAM format, allowing Bowtie to interoperate with other tools supporting SAM, including the SAMtools consensus, SNP, and indel callers. Bowtie runs on the command line under Windows, Mac OS X, Linux, and Solaris.
<Br>
<br>
Bowtie also forms the basis for other tools, including TopHat: a fast splice junction mapper for RNA-seq reads, Cufflinks: a tool for transcriptome assembly and isoform quantitiation from RNA-seq reads, Crossbow: a cloud-computing software tool for large-scale resequencing data,and Myrna: a cloud computing tool for calculating differential gene expression in large RNA-seq datasets. [3]
<br>
<br>
<strong><font id="q3.1.2" color="#4BA4E4" >3.1.2	Data processing using bowtie</font></strong>
<br>
Bowtie build the index using the human genome data file of hg19 as the reference. The alignment of the NGS data file to the reference might need up to 5 minutes. It will output a *.SAM format temporary data file. The *.SAM data file contains both the alignment result information and 	annotation information

The annotation information contains the basic annotation of the data file. Each line in the “*.SAM” data file represents a short read of the personal genome. And alignment information has been add to the line in the meantime. And the alignment result information involves the following parts:
<Br>

	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.	<strong>QNAME:</strong> the number of the aligned sequence 
<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.	<strong>FLAG:</strong> the marker of the position of the aligned sequence
<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.	<strong>RNAME:</strong> the number of the reference sequence 
<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.	<strong>POS:</strong> the position of the position of the sequence that aligned to the reference sequence 
<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.	<strong>MAPQ:</strong> the quality of the sequence alignment 
<Br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.	<strong>CIGAR:</strong> the expression of the brief alignment information
<Br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.	<strong>RNEXT:</strong> the reference number of the next short sequence that aligned to the reference genome
<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8.	<strong>PNEXT:</strong> the position of the next short sequence that aligned to the reference genome 
<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9.	<strong>SEQ:</strong> the base pair information of the sequence 
<Br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10.	<strong>TLEN:</strong> the length of the sequence 
<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;11.	<strong>QUAL:</strong> the quality of sequence 
<br>
<br>
<strong><font id="q3.2" color="#4BA4E4" size="+1">3.2	Sequence sorting, duplicates removing and indexing – SamTool </font></strong>
<Br>
<strong><font id="q3.2.1" color="#4BA4E4" >3.2.1	Introduction of SamTool</font></strong>
<Br>
SAMtools is a set of utilities for interacting with and post-processing short DNA sequence read alignments in the SAM/BAM format, written by Heng Li. These files are generated as output by short read aligners like BWA. Both simple and advanced tools are provided, supporting complex tasks like variant calling and alignment viewing as well as sorting, indexing, data extraction and format conversion.
<br>
<br>
<strong><font id="q3.2.2" color="#4BA4E4" >3.2.2	Introduction of SamTool</font></strong>
<Br>
There are three stages that involves using SamTool 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.	The file format conversion from “*.sam” to the “.bam”, the binary file format of “*.sam” 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.	The data processing including: the sequence sorting, duplicates removing and indexing
<Br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.	The file format conversion form “*.sam” to the “*.pipeup” format which can be used by the next tool, VarScan.
<br>
<br>
<strong><font id="q3.3" color="#4BA4E4" size="+1">3.3	Sequence sorting, duplicates removing and indexing – SamTool </font></strong>
<Br>

<strong><font id="q3.3.1" color="#4BA4E4" >3.3.1	Introduction of VarScan</font></strong>
<Br>
The advent of massively parallel sequencing technologies has fundamentally changed the study of genetics. New platforms like the Illumina HiSeq2000 yield unprecedented levels of sequencing throughput. The analysis and interpretation of data from next-generation sequencing (NGS) platforms presents a substantial informatics challenge. VarScan is a platform-independent software tool developed at the Genome Institute at Washington Universityto detect variants in NGS data.[5]
<Br>
<strong><font id="q3.3.2" color="#4BA4E4" >3.3.2	Data processing using VarScan</font></strong>
<Br>
VarScan is invoked to achieve the global searching of SNP in the “*.pipeup” file. It will output another data file involving the SNPs in the NGS sequence of user (it’s a temporary data file, not the final SNP result data file ). Each lines represents a special SNP and the annotation information of SNP. The annotation information involves:
<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.	<strong>Chrom:</strong> the chromosome number containing the SNP
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.	<strong>Position:</strong> the position of SNP in the chromosome. The position in the number of the base pairs away from the beginning of the chromosome 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.	<strong>Ref:</strong> the position in the reference genome that contains SNP in the user genome 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.	<strong>Var:</strong> the variation base in the SNP of the user NGS sequence
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.	<strong>PoolCall:</strong> the detailed alignment information of the SNP
<Br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.	<strong>StandFilt:</strong> the statistic data of SNP
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.	<strong>SamplesRef:</strong> the sample number of SNP genotype that is the same with the reference genome 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8.	<strong>SamplesHom:</strong> the sample number of SNP genotype that is the homogenous SNP  (For instance, the normal genotype is AA, if the variation base pair is G , the homologous SNP should be GG, the heterologous SNP should be AG, or GA )
<Br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9.	<strong>SamplesHet:</strong> the sample number of SNP genotype that is the heterologous SNP

<Br>
(Caution: because our software just analyze one personal NGS data file , so the SamplesRef, SamplesHom, SamplesNC should just be 1 or 0 )
<Br>
<br>
<strong><font id="q3.4" color="#4BA4E4" size="+1">3.4	Post-processing of NGS data file</font></strong>
<br>
<Br>
<center><img src="images/user_guide/SNP post processing algorithm.bmp" /></center>
<br>
<center><span><strong>Fig.8</strong>: the SNP post processing algorithm (after process of the VarScan, we get the temporary SNP file, but it doesn’t have the enough useful information. We need to get enough SNP information by this algorithm )</span></center>
<br>
<br>
<br>
<strong><font id="q4" color="#4BA4E4" size="+2">4.	Data base construction</font></strong>
<Br>
<center><img src="images/user_guide/Database construction.bmp" /></center>
<Br>
<center><span><strong>Fig.8</strong>: the database construction of Virtural Pharmacist</span></center>
<br>
<br>
To construct our database containing the relationships between genetic variations and drug response, we collected data from three main sources: PharmGKB, dbSNP and DrugBank. 1195 drug-related SNP records were collected from PharmGKB, as well as their impact on dosage, toxicity, efficacy on 192 drugs [6]. The SNP list and their position on genome are retrieved from dbSNP [7]. We retrieved the detailed information for each drug from DrugBank, a database combined drug data with drug target information [8]. Finally, we integrated the three databases and constructed a SNP-drug relationship database for Virtural Pharmacist.
<br>
<br>
<strong><font id="q4.1" color="#4BA4E4" size="+1">4.1	dbSNP</font></strong>
<Br>
<strong><font id="q4.1.1" color="#4BA4E4" >4.1.1	Introduction of dbSNP</font></strong>
<br>
The Single Nucleotide Polymorphism Database[9] (dbSNP) is a free public archive for genetic variation within and across different species developed and hosted by the National Center for Biotechnology Information (NCBI) in collaboration with the National Human Genome Research Institute (NHGRI). It provides the various classes of data.
<br>
<strong><font id="q4.1.2" color="#4BA4E4" >4.1.2	Data collection from SNP</font></strong>
<br>
We collect about 1195 drug response associated SNPs from the dbSNP. Each of SNP contains:
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.	<strong>RSID:</strong> the ID number defined by dbSNP so as to classify and sort the different SNPs in the database. One single RSID represents an unique SNP in the genome.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.	<strong>Position:</strong> the SNP position occurred in the human genome
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.	<strong>Genotype:</strong> the SNP genotype
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.	<strong>Allele:</strong> the SNP base variation. For instance, if the normal base pair is AA, the SNP is GG, so the allele will be AG
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.	<strong>Gene:</strong> the Gene containing the SNP 
<br>
<br>
<strong><font id="q4.2" color="#4BA4E4" size="+1">4.2	PharmGKB</font></strong>
<br>
<strong><font id="q4.2.1" color="#4BA4E4" >4.2.1	Introduction of PharmGKB</font></strong>
<br>
The Pharmacogenetics and Pharmacogenomics Knowledge Base (PharmGKB) is an interactive tool toinvestigate how genetic variation effects drug response. The PharmGKB web site displays genotype, molecular, and clinical primary data integrated with literature, pathway representations, protocol information, and links to additional external resources. Users can search and browse the knowledge base by genes, drugs, diseases, and pathways. 
<br>
<Br>
<strong><font id="q4.2.2" color="#4BA4E4" >4.2.2	Introduction of PharmGKB</font></strong>
<br>
It has been found that the 1195 SNPs from dbSNP have the relationship to 262 drugs in pharmGKB. Each SNP in our database has the following information in the PharmGKB:
<br>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.	The drug response related genes
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.	The SNP effects on the dosage of a specific drug
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.	The SNP effects on the toxicity of a specific drug
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.	The SNP effects on the efficacy of a specific drug
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.	The clinical and experimental description of the specific Drug response associated SNP 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.	Clinical annotation levels of evidence: this annotation level represents the reliability of SNP drug response association, it have six levels in total, from Level 1a to Level 4. 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a)	<strong>Level 1A:</strong> Annotation for a variant-drug combination in a CPIC or medical society-endorsed PGx guideline, or implemented at a PGRN site or in another major health system.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b)	<strong>Level 1B:</strong> Annotation for a variant-drug combination where the preponderance of evidence shows an association. The association must be replicated in more than one cohort with significant p-values, and preferably will have a strong effect size.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c)	<strong>Level 2A:</strong> Annotation for a variant-drug combination that qualifies for level 2B where the variant is within a VIP (Very Important Pharmacogene) as defined by PharmGKB. The variants in level 2A are in known pharmacogenes, so functional significance is more likely.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d)	<strong>Level 2B:</strong> Annotation for a variant-drug combination with moderate evidence of an association. The association must be replicated but there may be some studies that do not show statistical significance, and/or the effect size may be small.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e)	<strong>Level 3:</strong> Annotation for a variant-drug combination based on a single significant (not yet replicated) or annotation for a variant-drug combination evaluated in multiple studies but lacking clear evidence of an association.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;f)	<strong>Level 4:</strong> Annotation based on a case report, non-significant study or in vitro, molecular or functional assay evidence only.
<center><img src="images/user_guide/fig8.png" /></center>
<center><span><strong>Fig.9</strong>: the clinical annotation level of evidence [10]</span></center>
<br>
<br>
<strong><font id="q4.3" color="#4BA4E4" size="+1">4.3	DrugBank</font></strong>
<br>
<strong><font id="q4.3.1" color="#4BA4E4" >4.3.1	Introduction of DrugBank</font></strong>
<br>
The DrugBank database is a unique bioinformatics and cheminformatics resource that combines detailed drug (i.e. chemical, pharmacological and pharmaceutical) data with comprehensive drug target (i.e. sequence, structure, and pathway) information. The database contains 7681 drug entries including 1545 FDA-approved small molecule drugs, 155 FDA-approved biotech (protein/peptide) drugs, 89 nutraceuticals and over 6000 experimental drugs. Additionally, 4218 non-redundant protein (i.e. drug target/enzyme/transporter/carrier) sequences are linked to these drug entries. Each DrugCard entry contains more than 200 data fields with half of the information being devoted to drug/chemical data and the other half devoted to drug target or protein data.
<br>
<Br>
<strong><font id="q4.3.2" color="#4BA4E4" >4.3.2	Data collection from DrugBank </font></strong>
<br>
We select the Basic drug information from DurgBank, including:
<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.	Drug ID of each drug in the DrugBank: it can help us to get more useful information from the website indirectly
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.	The basic description of each drug
<br>
<Br>
<strong><font id="q4.4" color="#4BA4E4" size="+1">4.4	Database configuration</font></strong>
<Br>
The local database of PGI pharm contains three parts: the reference database, the user uploading raw database, the processed user database.
<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.	<strong>Reference database:</strong> major in provide reference for sequence alignment SNP calling, etc
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.	<strong>User uploading raw database:</strong> it is the encrypted database, each of the table in the database is only known for the user. It contains the genomic data including NGS data and Microarray data. For the sake of the privacy of personal genome, the raw data file will be deleted automatically from the server.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.	<strong>Processed user database:</strong> the data output from the analysis and processing of the raw data. It is stored in terms of the user account. It is essential for the result output both online and offline 
<br>
<br>

<strong><font id="q4.4.1" color="#4BA4E4" >4.4.1	Reference database:</font></strong>
<br>
It contains five kinds of data file of data tables in the database:
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.	<strong>Drug Response SNP associated data table:</strong> it is collected from the dbSNP, PharmGKB and DrugBank. It contains 1195 lines of SNP data, each line contains:
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a)	<strong>RSID:</strong> the SNP ID from dbSNP
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b)	<strong>Position:</strong> the SNP position occurred in the human genome
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c)	<strong>Genotype:</strong> the SNP genotype
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d)	<strong>Allele:</strong> the SNP base variation. For instance, if the normal base pair is AA, the SNP is GG, so the allele will be AG
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e)	<strong>Gene:</strong> the Gene containing the SNP 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;f)	<strong>Sentence</strong> Clinical SNP description from the PharmGKB
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;g)	<strong>Drug:</strong> The Drug name of SNP affected
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;h)	<strong>Classification:</strong> The drug classification information in the DrugBank: this information is essential for the result sorting and result output
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i)	<strong>Drug description:</strong> Drug that SNP associates description 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;j)	<strong>Drug ID:</strong> The Drug number in the Drug Bank 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.	<strong>Drug response data:</strong> contains the detail information of each drug that is affected by the SNP
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.	<strong>Human genome reference data:</strong> it is the standard reference whole genome sequence data in the NCBI. The reference data file is called “hg19.fq”
<BR>
<br>
<strong><font id="q4.4.2" color="#4BA4E4" >4.4.2	User uploading raw data</font></strong>
<br>
It is a encrypted database it contains the raw data that user uploads through the website and FTP client. The file name of the raw data has been encrypted by the server encryption algorithm. Only the user can visit the data file. Even though the administrator of the server have the authorities to modify the data file, he won’t which data file belong to the specific user
<Br>
<br>
<strong><font id="q4.4.3" color="#4BA4E4" >4.4.3	Processed user data</font></strong>
<br>
It contains the tables that belong to the users respectively. Each account of Virtural Pharmacist has the right to query its own data table only. That is, each table in the processed user database represents a specific private user space to store the useful and essential drug response associated information. It is still random in the database, but we can sort the data using the sorting algorithm and represent the data user-friendly. So, although the user itself don’t need to query the database, it is essential for result presenting and result report output
<Br>
<br>
<center><img src="images/user_guide/Database Configuration.bmp" /></center>
<center><span><strong>Fig.10</strong>: the database configuration of Virtural Pharmacist</span></center>
<br>
<br>
<strong><font id="q5" color="#4BA4E4" size="+2">5.	data analysis: global searching algorithm</font></strong>
<br>
<br>
<center><img src="images/user_guide/SNP global searching algorithm.bmp" /></center>
<center><span><strong>Fig.11</strong>: SNP global searching algorithm of Virtural Pharmacist</span></center>
<br>
<br>
<strong><font id="q6" color="#4BA4E4" size="+2">6.	Result output</font></strong>
<br>
<strong><font id="q6.1" color="#4BA4E4" size="+1">6.1	Online result output</font></strong>
<br>
<strong><font id="q6.1.1" color="#4BA4E4" >6.1.1	Result output reminding email</font></strong>
<Br>
Due to the large size of human genome, we may need a long time to analyze the result, we will complete all of the analysis process at the server side. It may takes about several hours to complete the analysis process. We will send an email to the user to remind the user of the complete of analysis process. The email format is shown below: 
<br>
<center><img src="images/user_guide/fig9.png" /></center>
<center><span><strong>Fig.12</strong>: the email format that remind the user the completion of the genome data analysis. We provide the hyperlink to the online data result of user.</span></center>
<br>
<br>
<strong><font id="q6.1.1" color="#4BA4E4" >6.1.2	Result output information:</font></strong>
<Br>
<br>
Result output information:
<br>
When you enter into the hyperlink provided by the email, you will see a drug list. It shows the drug classification according to the standard from DrugBank. It is a dynamic menu. At first, you will see the rough classification of drug. If you click one of them, it will show the detailed classification of this specific class. And the you will see the specific drug name when you click one of the detailed class. The shown drug is the genetic associated drug. If you click one of them it will jump to a new page containing the exact genetic information that influence this drug.
<br>
<center><img src="images/user_guide/fig10.png" /></center>
<center><span><strong>Fig.13</strong>: the drug list of the genetic associated drug of user guide on the web page</span></center>
<br>
The genetic information report associated to the drug is shown below, it mainly contains:
<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.	<strong>SNP ID:</strong> the SNP number of each SNP 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.	<strong>Genotype</strong>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.	<strong>Allele:</strong> the variation type of the SNP
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4.	<strong>Gene:</strong> the gene location of the SNP
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5.	<strong>Toxicity:</strong> the influence of SNP on the toxicity of SNP
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6.	<strong>Efficacy:</strong> the influence of SNP on the efficacy of SNP
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7.	<strong>Dosage:</strong> the influence of SNP on the dosage of SNP
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8.	<strong>More:</strong> it contains the detailed information of the SNP
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9.	<strong>Drug description:</strong> the drug description from DrugBank 
<br>
<center><img src="images/user_guide/fig11.png" /></center>
<center><span><strong>Fig.14</strong>: the genetic information associated to the drug response of docetaxel of user guide at the web page</span></center>
<br>
<br>
<strong><font id="q6.2" color="#4BA4E4" size="+1">6.2	Offline report output</font></strong>
<br>
We provide the free download of the user report in PDF format, you can see the demo file of the user report. <a href="example.pdf">Click here</a>
<br>
<br>
<strong><font id="q7" color="#4BA4E4" size="+2">7.	Reference</font></strong>

<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[1] http://en.wikibooks.org/wiki/Next_Generation_Sequencing_(NGS)
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[2] http://en.wikipedia.org/wiki/DNA_microarray
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[3] http://bowtie-bio.sourceforge.net/manual.shtml#what-is-bowtie 
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[4]  Li, H.; Handsaker, B.; Wysoker, A.; Fennell, T.; Ruan, J.; Homer, N.; Marth, G.; Abecasis, G.; Durbin, R.; 1000 Genome Project Data Processing Subgroup (2009). "The Sequence Alignment/Map format and SAMtools". Bioinformatics
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[5]  Koboldt DC, Chen K, Wylie T, Larson DE, McLellan MD, Mardis ER, Weinstock GM, Wilson RK, & Ding L (2009). VarScan: variant detection in massively parallel sequencing of individual and pooled samples. Bioinformatics (Oxford, England), 25 (17), 2283-5 PMID: 19542151
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[6] M. Whirl-Carrillo, E.M.M., J. M. Hebert, L. Gong, K. Sangkuhl, C.F. Thorn, R.B. Altman and T.E. Klein. (2012) Pharmacogenomics Knowledge for Personalized Medicine, Clinical Pharmacology & Therapeutics, 92, 414-417
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[7] Sherry ST, W.M., Kholodov M, Baker J, Phan L, Smigielski EM, Sirotkin K (2001) dbSNP: the NCBI database of genetic variation, Nucleic Acids Res, 29, 308-311.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[8] Knox C, L.V., Jewison T, Liu P, Ly S, Frolkis A, Pon A, Banco K, Mak C, Neveu V, Djoumbou Y, Eisner R, Guo AC, Wishart DS (2011) DrugBank 3.0: a comprehensive resource for ‘omics’ research on drugs., Nucleic Acids Res, 39, D1035-D1041.
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[9] Wheeler DL, Barrett T, Benson DA, et al. (January 2007). "Database resources of the National Center for Biotechnology Information". Nucleic Acids Res. 35 (Database issue): D5–12. doi:10.1093/nar/gkl1031. PMC 1781113. PMID 17170002
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[10]Clinical annotation level of evidence in the PharmGKB https://www.pharmgkb.org/page/clinAnnLevels 

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
