<?php
namespace JWTOauthSdk;;
use JWTOauthSdk\JwtOauthConnector;
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

class yourEndpoint {
 	
    function __construct() {
		
    }
     
     public function getEndpointData($param1,$param2,$param3,$pagenum,$resultsize,$mq) {
		//if your API has a max number of results that can be returned and accepts this as an open parameter
     	$maxpagesize = 500;
		if($resultsize > $maxpagesize) { 
			$resultsize = $maxpagesize; 
		}
		$type = "GET";  //guzzleHTTP request types "GET" "POST" "PUT" etc
     	$requesturl = "[E.G. endpointname/".$param1."?from-date=".$param2."&to-date=".$param3."&page=".$pagenum."&size=".$resultsize;
        $mq->request = $mq->requestclient->createRequest($type, $mq->baseurl.$requesturl);
		$mq->response = $mq->requestclient->send($mq->request); 
		$mq->responsecode = $mq->response->getStatusCode();
		if($body = $mq->response->getBody()) {
			echo $body; 
			//IMPORTANT:  guzzleHTTP responses are STREAMS so just returning the object will appear as an empty resultset
			} else {
				return "HTTP Status ".$mq->responsecode." - empty resultset";
				}
     }
}
?>		
