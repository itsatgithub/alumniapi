<?php

$fields = Array
(
    "action" => "save",
    "alumni_personalcode" => "",
    "titles" => "0000000000003",
    "firstname" => "Test3",
    "surname" => "Test1",
    "irb_surname" => "",
    "gender" => "00001",
    "nationality" => "AFG",
    "nationality_2" => "AUT",
    "birth" => "1961-11-18",
    "email" => "fermon+123456789112221@gmail.com",
    "url" => "http://www.google.com",
    "facebook" => "http://www.facebook.com",
    "linkedin" => "http://www.linkedin.com",
    "twitter" => "fermon83",
    "keywords" => "",
    "biography" => "bio",
    "awards" => "awa",
    "ORCIDID" => "342432",
    "researcherid" => "423432",
    "pubmedid" => "342432",
    "show_data" => "1",
    "external_jobs" => Array
        (
        		Array
                (
                    "start_date" => "2015-01-01",
                    "end_date" => "2015-12-31",
                    "external_job_positions" => "0000000000005",
                    "comments" => "",
                    "external_job_sectors" => "0000000000003",
                    "institution" => "",
                    "address" => "",
                    "postcode" => "",
                    "city" => "",
                    "country" => "AT",
                    "current" => "1"
                ),
        		Array
        		(
        				"start_date" => "2014-01-01",
        				"end_date" => "2014-12-31",
        				"external_job_positions" => "0000000000005",
        				"comments" => "",
        				"external_job_sectors" => "0000000000003",
        				"institution" => "",
        				"address" => "",
        				"postcode" => "",
        				"city" => "",
        				"country" => "AT",
        				"current" => "1"
        		)
        		
        )

);

//print_r($fields);
//break;

$ch = curl_init();

$headers = array('Content-Type: application/x-www-form-urlencoded');
$url = "http://alumniapitest.irbbarcelona.pcb.ub.es/v2/index.php";
//$url = "http://localhost/alumniapi/v2/index.php";
curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
//curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

json_decode($response);

?>