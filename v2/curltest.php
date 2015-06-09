<?php

$fields = Array
(
    "action" => "save",
    "alumni_personalcode" => "",
    "titles" => "0000000000003",
    "firstname" => "prueba3",
    "surname" => "Magan",
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
            0 => Array
                (
                    "start_date" => "2015-03-10",
                    "end_date" => "2015-06-25",
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

$url = "http://alumniapitest.irbbarcelona.pcb.ub.es/v2/index.php";
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST, 1);  
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
//curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
//echo $response;

json_decode($response);

?>