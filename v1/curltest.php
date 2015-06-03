<?php

$ch = curl_init();

$fields = array('action'=>'get');

$postArgs = array('data' => serialize($fields));

$url = "http://alumniapitest.irbbarcelona.pcb.ub.es/v1/index.php";
//$url = "http://localhost/alumniapi/v1/index.php";
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST, 1);
curl_setopt($ch,CURLOPT_POSTFIELDS, $postArgs);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
curl_setopt($ch,CURLOPT_TIMEOUT, 20);

$response = curl_exec($ch);
//var_dump(unserialize($response));

$res = json_decode($response);
var_dump($res);
//break;


/*
$conf = json_decode(file_get_contents('configuration.json'), TRUE);
$db = new mysqli($conf["host"], $conf["user"], $conf["password"], $conf["database"]); // development

foreach ($res->data as $params)
{
	$query = 'INSERT INTO alumni_personal_test ('
	. 'titles'
	. ', firstname'
	. ', surname'
	. ', irb_surname'
	. ' )'
	. ' VALUES ('
	. '\'' . $params->titles .'\''
	. ', \'' . $params->firstname .'\''
	. ', \'' . $params->surname .'\''
	. ', \'' . $params->irb_surname .'\''
	. ' )'
	;
	$result = $db->query($query);
}
*/


?>
