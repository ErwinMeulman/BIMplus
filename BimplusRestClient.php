<?php

class BimplusRestClient{

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var string
	 */
	protected $verb;

	/**
	 * @var array
	 */
	protected $requestBody;

	/**
	 * @var string
	 */
	protected $token;

	/**
	 * @var string
	 */
	protected $response;

	/**
	 * @var string
	 */
	protected $response_http_code;

	/**
	 * @return string
	 */
	public function getResponse (){
		return $this->response;
	}

	/**
	 * Constructor
	 * @param string $url Resource
	 * @param string $verb
	 * @param string $accessToken
	 * @param array $requestBody
	 */
	public function __construct($url = null, $verb = 'GET', $accessToken = '', $requestBody = null){
		$this->url         = $url;
		$this->accessToken = $accessToken;
		$this->verb        = $verb;
		$this->requestBody = $requestBody;
	}

	/**
	 * Execute the request
	 * @author Peter Benke <pbenke@allplan.com>
	 * @return void
	 */
	public function execute(){

		$headers = array();

		$headers[] = 'Content-Type: application/json';
		if(!empty($this->accessToken)){
			$headers[] = 'Authorization: BimPlus ' . $this->accessToken;
		}

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, $this->url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);

		switch($this->verb){

			case 'GET':
				break;

			case 'POST':
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($this->requestBody));
				break;

			case 'PUT':
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($this->requestBody));
				break;

			case 'DELETE':
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
				break;

		}

		$this->response = curl_exec($curl);
		$this->responseHttpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		$curlError = curl_error($curl);
		if(!empty($curlError)){
			echo $curlError;
		}

		curl_close($curl);

	}

}

