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
	
	
}