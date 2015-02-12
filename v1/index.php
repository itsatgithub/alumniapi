<?php
/**
 * Receives messages from the client
 * @author R. Bartolome
 * @version 2015-02-06 First version
 * @return JSON messages with the format:
 * {
 * 	"code": mandatory, string '0' for correct, '1' for error
 * 	"message": empty or string message
 * 	"data": empty or JSON data
 * }
 *
 * This file can be tested from the browser:
 * http://localhost/irbpeople-api/v1/service_test.php
 * 
 * Based on
 * http://www.raywenderlich.com/2941/how-to-write-a-simple-phpmysql-web-service-for-an-ios-app
 */

// API file
require_once 'irbpeople_api.php';

// Creates a new instance of the irbpeople_api class
$api = new irbpeople_api();

// return message
$message = array();

// unserialize
$_POST = unserialize($_POST["data"]);

switch($_POST["action"])
{
	case 'save':
		$params = array();
		$params['alumni_personalcode'] = isset($_POST["alumni_personalcode"]) ? $_POST["alumni_personalcode"] : '';
		$params['titles'] = isset($_POST["titles"]) ? $_POST["titles"] : '';
		$params['firstname'] = isset($_POST["firstname"]) ? $_POST["firstname"] : '';
		$params['surname'] = isset($_POST["surname"]) ? $_POST["surname"] : '';
		$params['irb_surname'] = isset($_POST["irb_surname"]) ? $_POST["irb_surname"] : '';
		$params['gender'] = isset($_POST["gender"]) ? $_POST["gender"] : '';
		$params['nationality'] = isset($_POST["nationality"]) ? $_POST["nationality"] : '';
		$params['nationality_2'] = isset($_POST["nationality_2"]) ? $_POST["nationality_2"] : '';
		$params['birth'] = isset($_POST["birth"]) ? $_POST["birth"] : '';
		$params['email'] = isset($_POST["email"]) ? $_POST["email"] : '';
		$params['url'] = isset($_POST["url"]) ? $_POST["url"] : '';
		$params['facebook'] = isset($_POST["facebook"]) ? $_POST["facebook"] : '';
		$params['linkedin'] = isset($_POST["linkedin"]) ? $_POST["linkedin"] : '';
		$params['twitter'] = isset($_POST["twitter"]) ? $_POST["twitter"] : '';
		$params['keywords'] = isset($_POST["keywords"]) ? $_POST["keywords"] : '';
		$params['biography'] = isset($_POST["biography"]) ? $_POST["biography"] : '';
		$params['awards'] = isset($_POST["awards"]) ? $_POST["awards"] : '';
		$params['ORCIDID'] = isset($_POST["ORCIDID"]) ? $_POST["ORCIDID"] : '';
		$params['researcherid'] = isset($_POST["researcherid"]) ? $_POST["researcherid"] : '';
		$params['pubmedid'] = isset($_POST["pubmedid"]) ? $_POST["pubmedid"] : '';
		$params['show_data'] = isset($_POST["show_data"]) ? $_POST["show_data"] : '';
		$params['external_jobs'] = isset($_POST["external_jobs"]) ? $_POST["external_jobs"] : '';

		if ($api->save($params)) {
			$message["code"] = "0";
		} else {
			$message["code"] = "1";
			$message["message"] = "Error on save method";		
		}
		break;
		
	case 'get':
		$params = array();
		$params['alumni_personalcode'] = isset($_POST["alumni_personalcode"]) ? $_POST["alumni_personalcode"] : '';
		if ($data = $api->get($params)) {
			$message["code"] = "0";
			$message["data"] = $data;
		} else {
			$message["code"] = "1";
			$message["message"] = "Error on get method";
		}
		break;
	
	case 'get_titles':
		if ($data = $api->get_titles()) {
			$message["code"] = "0";
			$message["data"] = $data;
		} else {
			$message["code"] = "1";
			$message["message"] = "Error on get_titles method";		
		}
		break;
		
	case 'get_nationalities':
		if ($data = $api->get_nationalities()) {
			$message["code"] = "0";
			$message["data"] = $data;
		} else {
			$message["code"] = "1";
			$message["message"] = "Error on get_nationalities method";
		}
		break;
		
	case 'get_genders':
		if ($data = $api->get_genders()) {
			$message["code"] = "0";
			$message["data"] = $data;
		} else {
			$message["code"] = "1";
			$message["message"] = "Error on get_genders method";
		}
		break;
		
	case 'get_countries':
		if ($data = $api->get_countries()) {
			$message["code"] = "0";
			$message["data"] = $data;
		} else {
			$message["code"] = "1";
			$message["message"] = "Error on get_countries method";
		}
		break;

	case 'get_communications':
		if ($data = $api->get_communications()) {
			$message["code"] = "0";
			$message["data"] = $data;
		} else {
			$message["code"] = "1";
			$message["message"] = "Error on get_communications method";
		}
		break;
				
	case 'get_external_jobs_positions':
		if ($data = $api->get_external_jobs_positions()) {
			$message["code"] = "0";
			$message["data"] = $data;
		} else {
			$message["code"] = "1";
			$message["message"] = "Error on get_external_jobs_positions method";
		}
		break;
				
	case 'get_external_jobs_sectors':
		if ($data = $api->get_external_jobs_sectors()) {
			$message["code"] = "0";
			$message["data"] = $data;
		} else {
			$message["code"] = "1";
			$message["message"] = "Error on get_external_jobs_sectors method";
		}
		break;
	
	default:
		$message["code"] = "1";
		$message["message"] = "Unknown method";
		break;
}

// echo the JSON message
echo json_encode($message);
?>