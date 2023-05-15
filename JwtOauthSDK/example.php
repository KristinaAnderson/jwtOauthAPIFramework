<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
define("ABS_PATH", dirname(__FILE__));
include(ABS_PATH."/src/JwtOauthConnector.php");
include(ABS_PATH."/src/yourEndpointClass.php");
$connector = new JWTOauthSdk\JwtOauthConnector();
$getdata = new JWTOauthSdk\yourEndpoint();
//to use:  Pass in the $connector along with your query parameters and go!
var_dump($getdata->getgetEndpointData("2020-01-01T12:00:00","2023-06-01T12:00:00","0","500",$connector));

?>