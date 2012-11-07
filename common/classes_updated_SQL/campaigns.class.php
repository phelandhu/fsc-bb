<?php
// campaigns.class.php
/***********************************************
* Created:            Oct 31, 2012 10:55:59 AM
* Last Modified:      Oct 31, 2012 10:55:59 AM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class Campaigns extends BB_Data {
	protected $self = "campaigns";
	
	public function save($data) {
		if(isset($data['id'])) {
			$qry = sprintf(" UPDATE %s  SET
				`name` = '%s',
				`comment` = '%s',
				`active` = '%s',
				`leadProviderId` = %s,
				`purchasePrice` = %s,
				`startDate` = '%s',
				`currency` = '%s'
				WHERE id = %s",
				$this->self,
					$data['name'],
					$data['comment'],
					$data['active'],
					$data['leadProviderId'],
					$data['purchasePrice'],
					$data['startDate'],
					$data['currency'],
					$data['id']);
			echo $qry;
		} else {
			$qry = sprintf("INSERT INTO %s
					(`dateCreated`, `name`, `comment`, `active`, `leadProviderId`, `purchasePrice`, `startDate`, `currency`)
					VALUES
					(now(), '%s', '', %s, %s, %s, '%s', '%s')",
					$this->self,
					$data['name'],
					$data['active'],
					$data['leadProviderId'],
					$data['purchasePrice'],
					$data['startDate'],
					$data['currency']);
			echo $qry;			
		}
		$this->dbConnection->query($qry);
	}
	
	public function setInactive($id) {
		if(isset($id)) {
			$result = $this->getOneByID($id);
			$data = $result->fetch_array();
			$data['active'] = 0;
			$this->save($data);
		}
	}
	
	public function setActive($id) {
		if(isset($id)) {
			$result = $this->getOneByID($id);
			$data = $result->fetch_array();
			$data['active'] = 1;
			$this->save($data);
		}	
	}
	
}