import vcf
import os
from sys import argv
prefix = argv[1]
fq1 = argv[2]
fq2 = argv[3]
ref = argv[4]
database = argv[5]
ftp = argv[6]
user = argv[7]
path = ftp + '/' + prefix


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
                os.system('email %s done %s %s' % (emailaddress,prefix, prefix))
fu.close()
