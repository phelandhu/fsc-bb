<?php
// leadProvider.class.php
/***********************************************
* Created:            Oct 30, 2012 4:42:23 PM
* Last Modified:      Oct 30, 2012 4:42:23 PM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class LeadProvider extends BB_Data {
	protected $self = "LeadProvider";

	public function getOneByUsernameAndId($userName, $id) {
		$this->lastSQL = sprintf("SELECT * FROM %s WHERE CompanyName = '%s' AND LeadProviderID = %s", $this->self, $userName, $id);
		return $this->dbConnection->query($this->lastSQL);
	}
	
	public function save($data) {
		$qry = sprintf("INSERT INTO %s (`CompanyName`, `PrimaryPhoneNumebr`, `TechnicalPOCName`, `TechnicalPOCEmailAddress`, `SalesPOCName`, `SalesPOCEmailAddress`, `IntegrationDate`, `APIField1`, `APIField2`, `SendingURL`)
					VALUES( '%s', '%s', '%s', '%s', '%s', '%s', now(), '%s', '%s', '%s')", 
					$this->self, 
				$data['companyName'], 
				$data['primaryPhoneNumber'], 
				$data['technicalPocName'], 
				$data['technicalPocEmailAddress'], 
				$data['salesPocName'], 
				$data['salesPocEmailAddress'], 
				$data['apiField1'], 
				$data['apiField2'], 
				$data['sendingUrl']
				);
		$this->dbConnection->query($qry);
	}
	
	public function getOneByMemberId($memberId) {
		$qry = sprintf("SELECT * FROM LeadProvider 
				INNER JOIN member ON LeadProvider.LeadProviderID = member.LeadProviderID_Default
				WHERE member.id = %s;", $memberId);
		return $this->dbConnection->query($qry);
	}
	
	public function getOneByID($id) {
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE LeadProviderID = %s", $this->self, $id));
	}
	
	public function getOneByAPIIdAndKey($apiId, $apiKey) {
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE APIField1 = '%s' AND APIField2 = '%s'",$this->self,$apiId, $apiKey));
	}
}