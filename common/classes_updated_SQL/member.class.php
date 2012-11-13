<?php
// member.class.php
/***********************************************
* Created:            Oct 31, 2012 10:57:39 AM
* Last Modified:      Oct 31, 2012 10:57:39 AM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* /bootstrap.php will include the bbData.class.php file,
* but if you are calling this outside of that file or for unit testing you
* must include it explicitly.
* 
* Mike Browne - phelandhu@gmail.com
***********************************************/

class Member extends BB_Data {
	protected $self = "member";
	
	public function save($data) {
		if(isset($data['id'])) {
			$qry = sprintf(" UPDATE %s  SET
				`name` = '%s',
				`comment` = '%s',
				`username` = '%s',
				`password` = '%s',
				`cookie` = '%s',
				`session` = '%s',
				`ip` = '%s',
				`firstName` = '%s',
				`lastName` = '%s',
				`emailAddress` = '%s',
				`cellPhoneNumber` = '%s',
				`leadProviderId` = %s
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
					$data['id']);
			echo $qry;
		} else {
			$qry = sprintf("INSERT INTO %s
					(`dateCreated`, `name`, `comment`, `username`, `password`, `cookie`, `session`, `ip`, `firstName`, `lastName`, `emailAddress`, `cellPhoneNumber`, `leadProviderId`)
				VALUES
					( now(), '', '', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
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
					$data['leadProviderId'] );
			echo $qry;			
		}
		$this->dbConnection->query($qry);
	}
	
	public function getOneByUsernameAndPassword($username, $password){
		$qry = sprintf("SELECT * FROM %s WHERE username = '%s' AND password = '%s'", $this->self, $username, $password);
		return $this->dbConnection->query($qry);
	}
	
	public function resetPassword() {
		
	}
	
	public function getOneByAPIRef($apiRef) {
		$qry = sprintf("SELECT * FROM %s WHERE apiRef = %s", $this->self, $apiRef);
		return $this->dbConnection->query($qry);
	}
}