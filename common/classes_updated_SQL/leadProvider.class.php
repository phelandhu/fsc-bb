<?php
// leadProvider.class.php
/***********************************************
* Created:            Oct 30, 2012 4:42:23 PM
* Last Modified:      Oct 30, 2012 4:42:23 PM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* /bootstrap.php will include the bbData.class.php file,
* but if you are calling this outside of that file or for unit testing you
* must include it explicitly.
* 
* Mike Browne - phelandhu@gmail.com
***********************************************/

class LeadProvider extends BB_Data {
	protected $self = "leadProvider";

	public function getOneByUsernameAndId($userName, $id) {
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE companyName = '%s' AND id = %s", $this->self, $userName, $id));
	}
	
	public function save($data) {
		$qry = sprintf("INSERT INTO %s (`dateCreated`, `name`, `comment`, `companyName`, `primaryPhoneNumber`, `technicalPocName`, `technicalPocEmailAddress`, `salesPocName`, `salesPocEmailAddress`, `integrationDate`, `apiField1`, `apiField2`, `sendingUrl`)
					VALUES( now(), '', '', '%s', '%s', '%s', '%s', '%s', '%s', now(), '%s', '%s', '%s')", 
					$this->self, $data['companyName'], $data['primaryPhoneNumber'], $data['technicalPocName'], $data['technicalPocEmailAddress'], $data['salesPocName'], $data['salesPocEmailAddress'], $data['apiField1'], $data['apiField2'], $data['sendingUrl']
				);
		$this->dbConnection->query($qry);
	}
	
	public function getOneByMemberId($memberId) {
		$qry = sprintf("SELECT * FROM BlackBoxDev.leadProvider 
				INNER JOIN member ON leadProvider.id = member.leadproviderId
				WHERE member.id = 2;", $memberId);
		return $this->dbConnection->query($qry);
	}
	
	public function getOneByAPIIdAndKey($apiId, $apiKey) {
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE apiField1 = '%s' AND apiField2 = '%s'",$this->self,$apiId, $apiKey));
	}
}