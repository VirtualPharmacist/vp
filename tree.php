<?php 
#include("mysql_connect.php");

$response = array();
$node = array();
$edge = array();


		
$res_0=mysql_query("SELECT System from $file_code GROUP BY System");
#$node[] = (object)array("data" => (object)array('id'=> "user", 'foo'=> 1, 'bar' => 4, 'baz' => 3, 'type'=>'user')) ;

while($row_0=mysql_fetch_array($res_0)){
	$id_0 = $row_0["System"];
	$node[] = (object)array("data" => (object)array('id'=> $id_0, 'foo'=> 1, 'bar' => 4, 'baz' => 3, 'type'=>'system'));
	#$edge[] = (object)array("data" => (object)array('id'=> "user".$id_0, 'weight'=> 1, 'source' => "user", 'target' => $id_0));
	
	$res_1 = mysql_query("SELECT Drug FROM $file_code WHERE System = '$id_0' GROUP BY Drug");
	while($row_1=mysql_fetch_array($res_1)){
		$id_1 = $row_1["Drug"];
		#print "$id_1<br>";
		$node[] = (object)array("data" => (object)array('id'=> $id_1, 'foo'=> 1, 'bar' => 4, 'baz' => 3, 'type'=>'drug'));;
		$edge[] = (object)array("data" => (object)array('id'=> $id_0.$id_1, 'weight'=> 1, 'source' => $id_1, 'target' => $id_0));
		#$res_1 = mysql_query("SELECT Gene FROM $file_code WHERE System = '$id_0' AND Gene <> 'Not available' GROUP BY Gene");
		$res_2 = mysql_query("SELECT Gene FROM $file_code WHERE System = '$id_0' AND Gene <> 'Not available' AND Drug='$id_1' GROUP BY Gene");
		while($row_2=mysql_fetch_array($res_2)){
			$id_2 = $row_2['Gene'];
			$node[] = (object)array("data" => (object)array('id'=> $id_2, 'foo'=> 1, 'bar' => 4, 'baz' => 3, 'type'=>'gene'));;
			$edge[] = (object)array("data" => (object)array('id'=> $id_1.$id_2, 'weight'=> 1, 'source' => $id_2, 'target' => $id_1));				
			
			}
		}
	}


$response['nodes'] = $node;
$response['edges'] = $edge;
$fp = fopen('json/results.json', 'w'); 
fwrite($fp, json_encode($response));
fclose($fp);
?> 