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

class Campaign extends BB_Data {
	protected $self = "Campaigns";
	
	public function save($data) {
		if(isset($data['id'])) {
			$qry = sprintf(" UPDATE %s  SET
				`Name` = '%s',
				`Active` = '%s',
				`LeadProviderID` = %s,
				`PurchasePrice` = %s,
				`StartDate` = '%s',
				`Currency` = '%s'
				WHERE CampaingnID = %s",
				$this->self,
					$data['name'],
					$data['active'],
					$data['leadProviderId'],
					$data['purchasePrice'],
					$data['startDate'],
					$data['currency'],
					$data['id']);
		} else {
			$qry = sprintf("INSERT INTO %s
					(`Active`, `Name`, `LeadProviderID`, `PurchasePrice`, `StartDate`, `Currency`)
					VALUES
					(%s, '%s', %s, '%s', '%s', '%s')",
					$this->self,
					$data['active'],
					$data['name'],
					$data['leadProviderId'],
					$data['purchasePrice'],
					$data['startDate'],
					$data['currency']);					
		}
		echo $qry;
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
	
	public function getOneByID($id) {
		
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE CampaingnID = %s", $this->self, $id));
	}
	
	public function delete($id) {
		if(isset($id)) {
			$this->lastSQL = sprintf("DELETE FROM %s WHERE CampaingnID = %s", $this->self, $id);
			$this->dbConnection->query($this->lastSQL);
		}
	}
	
	public function createNew($dataIn) {
		$data = array();
		$data["active"]			= $this->dbConnection->real_escape_string($dataIn["active"]);
		$data["leadProviderId"]	= $this->dbConnection->real_escape_string($dataIn["leadProvider"]);
		$data["purchasePrice"]	= $this->dbConnection->real_escape_string($dataIn["PurchasePrice"]);
		$data["startDate"]		= $this->dbConnection->real_escape_string($dataIn["IntegrationDate"]);
		$data["name"]			= $this->dbConnection->real_escape_string($dataIn["CampaignName"]);
		$data["currency"]		= $this->dbConnection->real_escape_string($dataIn["Currency"]);
		return $data;
	}
}