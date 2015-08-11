<?php
App::uses('BehanceApi', 'Behance.Model');
class Behance extends BehanceApi {

	// user table
	public $useTable = false;

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
		return $this->_request('/users/', true);
	}

/**
 * getUserProjects
 * 
 * Get the projects published by a user.
 * The user argument can be an ID or username.
 */
	public function getUserProjects($conditions = array()) {
		return $this->_request('/users/', true, '/projects', $conditions);
	}

/**
 * getUserWips
 * 
 * Get the works-in-progress published by a user.
 * The user argument can be an ID or username.
 */
	public function getUserWips($conditions = array()) {
		return $this->_request('/users/', true, '/wips', $conditions);
	}

/**
 * getUserRecentAppreciations
 * 
 * Get a list of user's recently appreciated
 * projects. The user argument can be an ID
 * or username.
 */
	public function getUserRecentAppreciations($conditions = array()) {
		return $this->_request('/users/', true, '/appreciations', $conditions);
	}

/**
 * getUserCollections
 * 
 * Get a list of a user's collections. The user
 * argument can be an ID or username.
 */
	public function getUserCollections($conditions = array()) {
		return $this->_request('/users/', true, '/collections', $conditions);
	}

/**
 * getUserStats
 * 
 * Get statistics (all-time and today) for a specific user.
 * Includes number of project views, appreciations, comments,
 * and profile views.
 */
	public function getUserStats($conditions = array()) {
		return $this->_request('/users/', true, '/stats', $conditions);
	}

/**
 * getUserFollowers
 * 
 * Get a list of creatives who follow the user.
 */
	public function getUserFollowers($conditions = array()) {
		return $this->_request('/users/', true, '/followers', $conditions);
	}

/**
 * getUserFollowing
 * 
 * Get a list of creatives followed by the user.
 */
	public function getUserFollowing($conditions = array()) {
		return $this->_request('/users/', true, '/following', $conditions);
	}

/**
 * getUserWorkExperience
 * 
 * A list of the user's professional experience.
 */
	public function getUserWorkExperience($conditions = array()) {
		return $this->_request('/users/', true, '/work_experience', $conditions);
	}

/**
 * getProjectByID
 * 
 * Get the information and content of a project.
 */
	public function getProjectByID($id = null) {
		return $this->_request('/projects/', false, $id);
	}

/**
 * getProjectComments
 * 
 * Get the comments for a project.
 */
	public function getProjectComments($id = null) {
		return $this->_request('/projects/', false, $id.'/comments');
	}

/**
 * getCreativesToFollow
 * 
 * Provides a list of creatives you might be
 * interested in following.
 */
	public function getCreativesToFollow() {
		return $this->_request('/creativestofollow/', false, null);
	}

/**
 * getCreativeFields
 * 
 * Retrieves all Creative Fields in two groups,
 * all fields (in 'fields') and popular ones
 * (in 'popular')
 */
	public function getCreativeFields() {
		return $this->_request('/fields/', false, null);
	}

/**
 * getCollections
 * 
 * Search for collections.
 */
	public function getCollections($conditions = array()) {
		return $this->_request('/collections/', false, null, $conditions);
	}

/**
 * getCollectionByID
 * 
 * Get basic information about a collection.
 */
	public function getCollectionByID($id = null) {
		return $this->_request('/collections/', false, $id);
	}

/**
 * getCollectionProjects
 * 
 * Get projects from a collection.
 */
	public function getCollectionProjects($id = null) {
		return $this->_request('/collections/', false, $id.'/projects');
	}


}




