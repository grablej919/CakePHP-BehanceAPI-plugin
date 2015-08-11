# CakePHP-BehanceAPI-plugin
A CakePHP plugin for accessing the Behance API.


Plugin Structure
----------------
/Behance
	/Model
		Behance.php
		BehanceApi.php
	LICENSE
	README.md


Requirements
------------
[CakePHP v2.x](https://github.com/cakephp/cakephp)


Installlation
-------------
In app/plugin/ directory, run the following command:

	git clone https://github.com/grablej919/CakePHP-BehanceAPI-plugin Behance


CakePHP Behance Setup
---------------------
1. Load the plugin in app/Config/bootstrap.php

	CakePlugin::load('Behance');

2. Within app/Config/bootstrap.php or a custom config file, write a Behance config variable as follows.

	The config variable contains two values:
		a) the user's Behance username or ID
		b) the behance API key / client ID given through Behance's developer portal upon registering an application => https://www.behance.net/dev/

	// bootstrap.php
	Configure::write('Behance', array(
		'user_id' => 'XXXXXXXX',
		'api_key' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
	);	

OR

	// customConfig.php
	$config['Behance'] = array(
		'user_id' => 'XXXXXXXX',
		'api_key' => 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
	);

CakePHP Behance in Use
----------------------
1. In any controller add the Behance plugin to the $uses array.

	public $uses = array('Behance.Behance');

2. In any controller action run any of the Behance plugin actions to access the associated Behance API information.

	public function index() {
		$data = $this->Behance->getUserInfo();
	}

3. Explore Behance model in app/Plugin/Behance/Model/Behance.php for a list of all the available Behance API requests. Also refer to the Behance API Endpoints for a fuller explanation: https://www.behance.net/dev/api/endpoints/
