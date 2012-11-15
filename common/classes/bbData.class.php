<?php
// bbData.class.php
/***********************************************
* Created:            Oct 30, 2012 4:44:27 PM
* Last Modified:      Oct 30, 2012 4:44:27 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

abstract class BB_Data {
	protected $dbConnection;
	protected $id;
	protected $dateCreated;
	protected $dateModified;
	protected $name;
	protected $comment;
	
	// internal error related members
	protected $lastSQL;
	protected $lastErrNo;
	protected $lastError;
	protected $lastErrorList;
		/*
	public function __construct($host, $user, $pass, $database) {
		$this->dbConnection = new mysqli($host, $user, $pass, $database);
	}
*/
	public function __construct($dbDataArr) {
		$connectData = $dbData;
		//$this->dbConnection = new mysqli($connectData["hostName"], $connectData["userName"], $connectData["passWord"], $connectData["dataBase"]);
		$this->dbConnection = new mysqli('localhost', 'bb_user', 'Keyb0ard!', 'BB_Dev');
		
		if ($this->dbConnection->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
	}
	
	protected function checkErrorList() {
		$this->lastErrNo = $this->dbConnection->errno;
		$this->lastError = $this->dbConnection->error;
		$this->lastErrorList = $this->dbConnection->error_list;
	}
	
	public function getOneByID($id) {
		$this->lastSQL = sprintf("SELECT * FROM %s WHERE id = %s", $this->self, $id);
		return $this->dbConnection->query($this->lastSQL);
	}
	
	public function getOneByNameAndId($name, $id) {
		$this->lastSQL = sprintf("SELECT * FROM %s WHERE name = '%s' AND id = %s", $this->self, $name, $id);
		return $this->dbConnection->query($this->lastSQL);
	}
	
	public function delete($id) {
		if(isset($id)) {
			$this->lastSQL = sprintf("DELETE FROM %s WHERE id = %s", $this->self, $id);
			$this->dbConnection->query($this->lastSQL);
		}
	}
	
	public function getNamedArray($data) {
		return $data->fetch_array();
	}
	
	public function getSelf() {
		return $this->self;
	}
	
	public function getLastSQL() {
		return $this->lastSQL;
	}
	
	public function getLastErrorNo() {
		return $this->lastErrNo;
	}
	
	public function getLastError() {
		return $this->lastError;
	}
	
	public function getLastErrorList() {
		return $this->lastErrorList;
	}
//	public abstract function save();
	
}