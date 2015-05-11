import vcf
import os
from sys import argv
fin_path = argv[1]
fout1_path = argv[2]
fout2_path = argv[3]
frsid_path = argv[4]
sample = argv[5]

#Convert VCF file format (without rsid)

fout1 = open(fout1_path, 'w')
vcf_reader = vcf.Reader(open(fin_path, 'r'))

#fout1.write("#CHROM\tPOS")
#for sample in vcf_reader.samples:
#	fout1.write("\t")
#	fout1.write(str(sample))
#fout1.write("\n")
#for record in vcf_reader:
#	fout1.write(str(record.CHROM))
#	fout1.write("\t")
#	fout1.write(str(record.POS))
#	for sample in vcf_reader.samples:
#		call = record.genotype(str(sample))
#		fout1.write("\t")
#		fout1.write(str(call.gt_bases))
#	fout1.write("\n")

if sample == "NA":
	sample = vcf_reader.samples[0]
fout1.write("#CHROM\tPOS\t")
fout1.write(str(sample))
fout1.write("\n")
for record in vcf_reader:
	call = record.genotype(str(sample))
	genotype = str(call.gt_bases)
	if len(genotype) != 3:
		continue
	fout1.write(str(record.CHROM))
	fout1.write("\t")
	fout1.write(str(record.POS))
	fout1.write("\t")
	genotype = genotype[0]+genotype[2]
	fout1.write(genotype)
	fout1.write("\n")
fout1.close()

#Add rsid

frsid = open(frsid_path, 'r')
fout1 = open(fout1_path, 'r')
fout2 = open(fout2_path, 'w')
list = []
for line in fout1:
	if line.startswith("#"):
		fout2.write(line)
	else:
		list.append(line)
fout1.close()
for line in frsid:
	snp = line.split('\t')
	rsid = snp[0]
	chr = snp[2]
	pos = snp[3]
	for data in list:
		if data.startswith(chr + '\t' + pos):
                        fout2.write(rsid + '\t' + data)
fout2.close()
frsid.close()
