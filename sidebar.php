<div id="sidebar">
		<ul>
			<li>
				<h2>Recent visitors</h2>
                     <!--<p>&nbsp;&nbsp;&nbsp;<a href="http://www.SUSTC.edu.cn"><img src="images/h2.gif" /></a><br />
					 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.SUSTC.edu.cn/"> SUSTC</a></p>-->
					
 <!--                     <div style=" margin-left:20px; margin-right:10px; font-size:12px; font-style:italic">
</div>

<Br />				
		      <div style="margin-left:20px; margin-right:10px; font-size:12px; font-style:italic">"This tool is very useful especially when a large amount of NGS data is available which requires comphrehensive interpertation."
</div>
<div style="margin-left:20px; margin-right:10px; font-size:12px"><strong>Yu Xue</strong> from Huazhong University of Science and Technology


</div>-->







 <pre>
   <?php
    $fp = fopen('iprecord.txt','ar+');
    $i = 1;
    if(filesize('./iprecord.txt') > 0)
    {
        $t = array();
        $content = fread($fp,filesize('./iprecord.txt'));
        $t = split("\n",$content);
       $i = sizeof($t);
    }   
    $record = $i.' ip: '.$_SERVER['REMOTE_ADDR']."\n";
    fwrite($fp,$record);
    fclose($fp);
    ?>
  </pre>




      <table>
	  <tr>
	  <td>&nbsp;&nbsp;&nbsp;&nbsp; </td>
	  <td>

<div style="font-size:7px;">	
     

	   <a href="http://www2.clustrmaps.com/user/37c1158e1"><img src="http://www2.clustrmaps.com/stats/maps-no_clusters/www.sustc-genome.org.cn-pgi--thumb.jpg" alt="Locations of visitors to this page" />
</a>
</div>

	 

	
	
	

       </td></tr></table>

			</li>
		</ul>
	</div>