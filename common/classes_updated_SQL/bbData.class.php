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
		/*
	public function __construct($host, $user, $pass, $database) {
		$this->dbConnection = new mysqli($host, $user, $pass, $database);
	}
*/
	public function __construct($dbData) {
		$connectData = $dbData;
		$this->dbConnection = new mysqli($connectData["hostName"], $connectData["userName"], $connectData["passWord"], $connectData["dataBase"]);
	}
	
	public function getOneByID($id) {
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE id = %s", $this->self, $id));
	}
	
	public function getOneByNameAndId($name, $id) {
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE name = '%s' AND id = %s", $this->self, $name, $id));
	}
	
	public function delete($id) {
		if(isset($id)) {
			$this->dbConnection->query(sprintf("DELETE FROM %s WHERE id = %s", $this->self, $id));
		}
	}
	
	public function getNamedArray($data) {
		return $data->fetch_array();
	}
	
//	public abstract function save();
	
}