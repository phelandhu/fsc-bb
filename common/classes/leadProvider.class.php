<?php
// leadProvider.class.php
/***********************************************
* Created:            Oct 30, 2012 4:42:23 PM
* Last Modified:      Oct 30, 2012 4:42:23 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class LeadProvider extends BB_Data {
	private $self = "leadProvider";
	private $dbConnection;
	
	public function __construct($host, $user, $pass, $database) {
		$this->dbConnection = new mysqli($host, $user, $pass, $database);
	}
	
	public function getOneByNameAndId($userName, $id){
		$this->dbConnection->query(sprintf("SELECT * FROM %s WHERE companyName = '%s' AND id = %s", $this->self, $userName, $id));
	}
}