<?php

$ch = curl_init();

$fields = array('action'=>'get');

$postArgs = array('data' => serialize($fields));

$url = "http://alumniapitest.irbbarcelona.pcb.ub.es/v2/index.php";
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS, $postArgs);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
curl_setopt($ch,CURLOPT_TIMEOUT, 20);

$response = curl_exec($ch);

$res = json_decode($response);
var_dump($res);

?>
