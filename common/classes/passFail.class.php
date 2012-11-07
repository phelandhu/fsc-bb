<?php
// passFail.class.php
/***********************************************
* Created:            Oct 31, 2012 10:58:02 AM
* Last Modified:      Oct 31, 2012 10:58:02 AM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class PassFail extends BB_Data {
	protected $self = "PassFail";
	
	public function save($data) {
		if(isset($data['id'])) {
			$qry = sprintf(" UPDATE %s  SET
				`PersonalinformationID` = '%s',
				`LeadProviderID` = %s,
				`memberID` = %s,
				`ResultXML` = '%s'
				WHERE PassGoodID = %s",
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
					(`PersonalinformationID`, `LeadProviderID`, `memberID`, `ResultXML`, `DateTime`)
					VALUES
					(%s, %s, %s, '%s', now())",
					$this->self,
					$data['personalInformationId'],
					$data['leadProviderId'],
					$data['memberId'],
					$this->dbConnection->real_escape_string($data['resultXml']));		
		}
		$this->dbConnection->query($qry);
	}
	
	public function getOneByID($id) {
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE PassGoodID = %s", $this->self, $id));
	}
}