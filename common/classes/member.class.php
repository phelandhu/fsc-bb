<?php
// member.class.php
/***********************************************
* Created:            Oct 31, 2012 10:57:39 AM
* Last Modified:      Oct 31, 2012 10:57:39 AM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class Member extends BB_Data {
	protected $self = "member";
	
	public function save($data) {
		if(isset($data['id'])) {
			$this->lastSQL = sprintf(" UPDATE %s  SET
				`username` = '%s',
				`password` = '%s',
				`cookie` = '%s',
				`session` = '%s',
				`ip` = '%s',
				`FirstName` = '%s',
				`LastName` = '%s',
				`EmailAddress` = '%s',
				`Cellphone` = '%s',
				`LeadProviderID_Default` = %s
				WHERE id = %s",
					$this->self,
					'',
					'',
					$data['username'],
					$data['password'],
					$data['cookie'],
					$data['session'],
					$data['ip'],
					$data['firstName'],
					$data['lastName'],
					$data['emailAddress'],
					$data['cellPhoneNumber'],
					$data['leadProviderId'],
					$data['authLevel'],
					$data['pagePermission'],
					$data['id']);
		} else {
			$this->lastSQL = sprintf("INSERT INTO %s
					(`username`, `password`, `cookie`, `session`, `ip`, `FirstName`, `LastName`, `EmailAddress`, `Cellphone`, `LeadProviderID_Default`)
				VALUES
					('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
					$this->self,
					$data['username'],
					$data['password'],
					$data['cookie'],
					$data['session'],
					$data['ip'],
					$data['firstName'],
					$data['lastName'],
					$data['emailAddress'],
					$data['cellPhoneNumber'],
					$data['leadProviderId'],
					$data['authLevel'],
					$data['pagePermission'] );
		}
		$this->dbConnection->query($this->lastSQL);
	}
	
	public function getOneByUsernameAndPassword($username, $password){
		$this->lastSQL = sprintf("SELECT * FROM %s WHERE username = '%s' AND password = '%s'", $this->self, $username, $password);
		$result = $this->dbConnection->query($this->lastSQL);
		$this->checkErrorList();
		return $result;
	}
	
	public function resetPassword() {
		
	}
	
	
	public function getOneByID($id) {
		$this->lastSQL = sprintf("SELECT * FROM %s WHERE id = %s", $this->self, $id);
		return $this->dbConnection->query($this->lastSQL);
	}
	
	public function getOneByAPIRef($apiRef) {
		$this->lastSQL = sprintf("SELECT * FROM %s WHERE APIref = '%s'", $this->self, $apiRef);
		return $this->dbConnection->query($this->lastSQL);
	}	

}