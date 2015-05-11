import os
from sys import argv
prefix = argv[1]
fq1 = argv[2]
fq2 = argv[3]
age = argv[4]
race = argv[5]
cm = argv[6]
kg = argv[7]   
enzyme = argv[8]
amiodarone = argv[9] 
ref = argv[10]
database = argv[11]
ftp = argv[12]
user = argv[13]
path = ftp + '/' + prefix

#Calling SNP

os.system('../software/bowtie2 -p 20 -t -x %s/hg19 -1 %s/%s -2 %s/%s -S %s/%s.sam' % (ref,path,fq1,path,fq2,path,prefix))
os.system('../software/samtools view -Sb -o %s/%s.bam %s/%s.sam' % (path,prefix,path,prefix))
os.system('../software/samtools sort %s/%s.bam %s/%s.sorted' % (path,prefix,path,prefix))
os.system('../software/samtools rmdup -s %s/%s.sorted.bam %s/%s.rmdup.bam' % (path,prefix,path,prefix))
os.system('../software/samtools index %s/%s.rmdup.bam' % (path,prefix))
#os.system('/bin/bioexe/samtools view -o %s/%s.rmdup.sam %s/%s.rmdup.bam' % (path,prefix,path,prefix)) 
os.system('../software/samtools mpileup -B -f %s/hg19.fa %s/%s.rmdup.bam | java -jar ../software/VarScan.v2.3.6.jar mpileup2snp > %s/varscan_%s' % (ref,path,prefix,path,prefix))

#Convert to 23andme format (without rsid)

exome = path + '/varscan_' + prefix
convert = path + '/' + prefix + '_convert'
fe = open(exome, 'r')
fc = open(convert, 'w')
for line in fe:
        lineSplit = line.split('\t')
        chr = lineSplit[0][3:]
        if chr == 'om':
                fc.write('chromosome\tposition\tgenotype\n')
        else:
                pos = lineSplit[1]
                ref = lineSplit[2]
                var = lineSplit[3]
                het = lineSplit[7]
                hom = lineSplit[8]
                if het == '1' and hom == '0':
                        genotype = ref + var
                elif het == '0' and hom == '1':
                        genotype = var * 2
                else:
                        genotype = ''
                fc.write(chr + '\t' + pos + '\t' + genotype + '\n')
fe.close()
fc.close()

#Add rsid

convert_rsid = path + '/' +prefix + '.txt'
fc = open(convert, 'r')
fd = open(database, 'r')
fcr = open(convert_rsid, 'w')
elist = []
fcr.write('# rsid\tchromosome\tposition\tgenotype\n')
for line in fc:
        elist.append(line)
fc.close()
for line in fd:
        snp = line.split('\t')
        rsid = snp[0]
        chr = snp[2]
        pos = snp[3]
        for data in elist:
                if data.startswith(chr + '\t' + pos):
                        fcr.write(rsid + '\t' + data)
fc.close()
fd.close()
fcr.close()

#Send email

fu = open(user, 'r')
for line in fu:
        lineSplit = line.split('\t')
        username = lineSplit[0]
        if username == prefix:
                emailaddress = lineSplit[3]
                emailaddress = emailaddress.strip('\n')
                fed = open('/var/www/helab/pgi/bin/done_warfarin','w')
                fed.write('Dear user,\n\nThanks for using PGI. We have finished the data processing. Please now click here\nhttp://www.sustc-genome.org.cn/pgi/warfarin_result.php?file_code=%s&age=%s&race=%s&cm=%s&kg=%s&enzyme=%s&amiodarone=%s\nfor your drug response information.\n\nBest regards,\nPGI developing team' % (prefix, age, race, cm, kg, enzyme, amiodarone))
                fed.close()
                os.system('email %s done_warfarin' % emailaddress)
fu.close()
