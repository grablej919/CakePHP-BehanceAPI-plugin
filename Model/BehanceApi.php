<?php
App::uses('AppModel', 'Model');
App::uses('CakeSession', 'Model/Datasource');
App::uses('Hash', 'Utility');
App::uses('HttpSocket', 'Network/Http');
App::uses('Set', 'Utility');
class BehanceApi extends AppModel {
	// use table
	public $useTable = false;
	// request init
	protected $_request = array(
		'method' => 'GET',
		'uri' => array(
			'scheme' => 'https',
			'host' => 'www.behance.net',
		)
	);
	// Behance username
	private $user = null;
	// Behance API key
	private $ApiKey = null;
	// URI to Behance API
	private $uri = null;
	// GET request conditions
	private $httpGet = array();
	// construct
	public function __construct() {
		// preparing request
		$this->uri = $this->_request['uri']['scheme'].'://'.$this->_request['uri']['host'].$this->_request['uri']['path'];
		// load config
		$OpauthConfig = Configure::read('Behance');
		// check Behance configured
		if (!isset($OpauthConfig['user_id']) OR !isset($OpauthConfig['api_key'])) {
			# please config your Behance username and API key
			return false;
		}
		// set username and API key
		$this->user = $OpauthConfig['user_id'];
		$this->ApiKey = $OpauthConfig['api_key'];
	}
	// parse response
	protected function _parseResponse($response) {
		$results = json_decode($response->body);
		if (is_object($results)) {
			$results = Set::reverse($results);
		}
		return $results;
	}
	// request
	protected function _request($path = null, $page = null, $params = array()) {
		// createding http socket object for later use
		$HttpSocket = new HttpSocket(array('ssl_verify_host' => false));
		// check path set
		if (isset($path)) { $this->uri .= $path . $this->user; }
		// check page set
		if (isset($page)) { $this->uri .= $page; }
		// apend api_key
		$this->httpGet['api_key'] = $this->ApiKey;
		// apend aditional params
		foreach ($params as $key => $keyValue) { $this->httpGet[$key] = $keyValue; }
		// issuing request
		$response = $HttpSocket->get($this->uri, $this->httpGet);
		// olny valid response is going to be parsed
		if (substr($response->code, 0, 1) != 2) {
			if (Configure::read('debugApis')) {
				debug($request);
				debug($response->body);
				die;
			}
			return false;
		}
		// debug
		$debug = Configure::read('debugApis');
		if ($debug && $debug > 1) {
			debug($request);
			debug($response->body);
			die;
		}
		// parsing response
		$results = $this->_parseResponse($response);
		// return results
		return $results;
	}
}
