<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//make header return PRETTY JSON objects
header("Content-Type: application/json; charset=UTF-8");
// Enable CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
include("controller/Controller.php");
$view = "";
if (!isset($_GET["view"]))
	print "view is not set";
if (isset($_GET["view"]))
	$view = $_GET["view"];

$api = new PropertiesController();

/*
		controls the RESTful services
		URL mapping
	*/
switch ($view) {
case "users":
		$api->getUsersList();
		break;
	case "properties":
		$api->getPropertiesList();
		break;
	case "recent":
		$api->getRecentPropertiesList();
		break;
	case "recommended":
		$api->getRecommendedPropertiesList();
		break;
	case "property_id":
		$api->getPropertiesListByID();
		break;
	case "property_title":
		$api->getPropertiesListByTitle(); 
		break;
	case "property_by_bedrooms":
		$api->getPropertiesListByBedrooms();
		break;
	case "property_by_garages":
		$api->getPropertiesListByGarages();
		break;
	case "property_by_location":
		$api->getPropertiesListByLocationID();
		break;
	case "property_by_location_name":
		$api->getPropertiesListByLocationName();
		break;
	case "property_price":
		$api->getPropertiesListByPrice();
		break;
	case "register":
		$api->registerUser();
		break;
	case "login":
		$api->login();
		break;
	case "reset":
		$api->resetPassword();
	case "":
		$api->index();
		break; 
}
