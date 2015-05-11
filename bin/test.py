import os
emailaddress = 'chen.yy@live.com'
fed = open('done_warfarin','w')
fed.write('Dear user,\n\nThanks for using PGI. We have finished the data processing. Please now click here\nhttp://www.sustc-genome.org.cn/pgi/warfarin_result.php?f$')
fed.close()
os.system('email %s done_warfarin' % emailaddress)

