<?php
namespace JWTOauthSdk;
$path =  dirname(__FILE__);
$newpath = preg_replace("/\/\w+$/i","",$path);
require_once($newpath.'/vendor/autoload.php');
use Guzzle\Http\Client;
use GtyuzzleHttp\Exception\RequestException;
use GuzzleHttp\Pool;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use CommerceGuys\Guzzle\Plugin\Oauth2\Oauth2Plugin;
use CommerceGuys\Guzzle\Plugin\Oauth2\GrantType\ClientCredentials;
use CommerceGuys\Guzzle\Plugin\Oauth2\GrantType\RefreshToken;

class JwtOauthConnector {

	public $oauth2Client;
	public $config;
	public $grantType;
	public $refreshTokenGrantType;
	public $oauth2Plugin;
	public $requestclient;
	public $pagesize;
	public $pagenum;
	public $type;
	public $requeststring;
	public $request;
	public $response;
	public $responsecode;
	public $baseurl;
	public $body;

	function __construct() {
	
		$this->oauth2Client = new Client('[YOUR OAUTH TOKEN REQUEST ENDPOINT HERE]');
	
		$this->config = array(
    		'username' => '',
    		'password' => '',
    		'client_id' => '[YOUR CLIENT ID HERE]',
    		'client_secret' => '[YOUR CLIENT SECRET HERE]'
		);
	
		$this->grantType = new ClientCredentials($this->oauth2Client, $this->config);
		$this->refreshTokenGrantType = new RefreshToken($this->oauth2Client, $this->config);
		
		try {
			$this->oauth2Plugin = new Oauth2Plugin($this->grantType, $this->refreshTokenGrantType);
		}
		catch (exception $e) {
    			var_dump($e);
				//YOUR ERROR HANDLING HERE
		}
		$this->requestclient = new Client();
		$this->requestclient->addSubscriber($this->oauth2Plugin);
		$this->baseurl = "[THE BASE URL OF YOUR API HERE]";
	}
}

?>