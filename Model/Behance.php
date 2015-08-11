<?php
App::uses('BehanceApi', 'Behance.Model');
class Behance extends BehanceApi {

	// request init
	protected $_request = array(
		'method' => 'GET',
		'uri' => array(
			'scheme' => 'http',
			'host' => 'www.behance.net',
			'path' => '/v2',
		)
	);

/**
 * For Behance's Endpoint reference, refer to:
 * https://www.behance.net/dev/api/endpoints/
 */

/**
 * getUserInfo
 * 
 * Get basic information about a user.
 * The user argument can be an ID or username.
 */
	public function getUserInfo() {
		return $this->_request('/users/');
	}

/**
 * getUserProjects
 * 
 * Get the projects published by a user.
 * The user argument can be an ID or username.
 */
	public function getUserProjects($conditions = array()) {
		return $this->_request('/users/', '/projects', $conditions);
	}

/**
 * getUserWips
 * 
 * Get the works-in-progress published by a user.
 * The user argument can be an ID or username.
 */
	public function getUserWips($conditions = array()) {
		return $this->_request('/users/', '/wips', $conditions);
	}

/**
 * getUserRecentAppreciations
 * 
 * Get a list of user's recently appreciated
 * projects. The user argument can be an ID
 * or username.
 */
	public function getUserRecentAppreciations($conditions = array()) {
		return $this->_request('/users/', '/appreciations', $conditions);
	}

/**
 * getUserCollections
 * 
 * Get a list of a user's collections. The user
 * argument can be an ID or username.
 */
	public function getUserCollections($conditions = array()) {
		return $this->_request('/users/', '/collections', $conditions);
	}

/**
 * getUserStats
 * 
 * Get statistics (all-time and today) for a specific user.
 * Includes number of project views, appreciations, comments,
 * and profile views.
 */
	public function getUserStats($conditions = array()) {
		return $this->_request('/users/', '/stats', $conditions);
	}

/**
 * getUserFollowers
 * 
 * Get a list of creatives who follow the user.
 */
	public function getUserFollowers($conditions = array()) {
		return $this->_request('/users/', '/followers', $conditions);
	}

/**
 * getUserFollowing
 * 
 * Get a list of creatives followed by the user.
 */
	public function getUserFollowing($conditions = array()) {
		return $this->_request('/users/', '/following', $conditions);
	}

/**
 * getUserWorkExperience
 * 
 * A list of the user's professional experience.
 */
	public function getUserWorkExperience($conditions = array()) {
		return $this->_request('/users/', '/work_experience', $conditions);
	}

}




