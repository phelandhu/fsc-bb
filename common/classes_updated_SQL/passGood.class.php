<?php
// passGood.class.php
/***********************************************
* Created:            Oct 31, 2012 10:58:02 AM
* Last Modified:      Oct 31, 2012 10:58:02 AM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class PassGood extends BB_Data {
	protected $self = "passGood";
	
	public function save($data) {
		if(isset($data['id'])) {
			$qry = sprintf(" UPDATE %s  SET
				`name` = '%s',
				`comment` = '%s',
				`personalInformationId` = '%s',
				`leadProviderId` = %s,
				`memberId` = %s,
				`resultXml` = '%s'
				WHERE id = %s",
				$this->self,
					$data['name'],
					$data['comment'],
					$data['personalInformationId'],
					$data['leadProviderId'],
					$data['memberId'],
					$this->dbConnection->real_escape_string($data['resultXml']),
					$data['id']);
		} else {
			$qry = sprintf("INSERT INTO %s
					(`dateCreated`, `name`, `comment`, `personalInformationId`, `leadProviderId`, `memberId`, `resultXml`)
					VALUES
					(now(), '', '', %s, %s, %s, '%s')",
					$this->self,
					$data['personalInformationId'],
					$data['leadProviderId'],
					$data['memberId'],
					$this->dbConnection->real_escape_string($data['resultXml']));		
		}
		$this->dbConnection->query($qry);
	}
	
}