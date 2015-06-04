<?php

$ch = curl_init();

//$fields = array('action'=>'get');
$fields = array('action'=>'get', 'alumni_personalcode' => '00034');

//$postArgs = array('data' => serialize($fields));

//$url = "http://alumniapitest.irbbarcelona.pcb.ub.es/v2/index.php";
$url = "http://localhost/alumniapi/v2/index.php";
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
curl_setopt($ch,CURLOPT_TIMEOUT, 20);

$response = curl_exec($ch);
//print_r($response);
$res = json_decode($response);
var_dump($res);

?>
