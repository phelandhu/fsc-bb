<?php
// rulesManagementSet.class.php
/***********************************************
* Created:            Oct 31, 2012 10:58:49 AM
* Last Modified:      Oct 31, 2012 10:58:49 AM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class RulesManagementSet extends BB_Data {
	protected $self = "RulesManagementSet";
	protected $xOver = "xRules_RulesManagementSet";
	
	public function save($data) { // not working yet.
		global $log;
		// I am creating a xover table between this and rules.
		$returnId = null;
		if(isset($data['id'])) {
			$this->lastSQL = sprintf(" UPDATE %s  SET
					`name` = '%s',
					`comment` = '%s',
					`title` = '%s',
					`active` = %s,
					`memberId` = %s,
					WHERE id = %s",
					$this->self,
					$this->dbConnection->real_escape_string($data['name']),
					$this->dbConnection->real_escape_string($data['comment']),
					$this->dbConnection->real_escape_string($data['title']),
					$this->dbConnection->real_escape_string($data['active']),
					$this->dbConnection->real_escape_string($data['memberId']),
					$data['id']);
			$this->dbConnection->query($qry);
			$returnId = $data['id'];
		} else {
			$this->lastSQL = sprintf("INSERT INTO %s
					(`Title`, `Active`, `memberID`)
					VALUES
					('%s', %s, %s)",
					$this->self,
					$this->dbConnection->real_escape_string($data['title']),
					$this->dbConnection->real_escape_string($data['active']),
					$this->dbConnection->real_escape_string($data['memberId']));
			$log->trace($this->lastSQL);
			$this->dbConnection->query($this->lastSQL);
			// check for error
			if(!$this->dbConnection->errno) {
				// return the new id
				$returnId = $this->dbConnection->insert_id;
			} else {
				$returnId = 0;
			}
		}
		return $returnId;
	}
	
	public function updateSet($data) {
		$this->save($data);
		$rule = null;
		// do some validation here, eh?
		if(isset($data["rulesManagementSetId"])) {
			// delete the rms entry
			$qry = sprintf("DELETE FROM %s WHERE RulesManagementSetId = %s", $this->xOver, $data["rulesManagementSetId"]);
			$this->dbConnection->query($qry);
			foreach($rulesId as $key => $value) {
				if($value == 1){
					$qry = sprintf("INSERT INTO %s
							(RulesManagementSetId, RulesId)
							VALUES
							(%s, %s)", $this->xOver, $rulesManagementSetId, $key);
					$this->dbConnection->query($qry);
				}
			}
		}
	}
	
	public function saveNewSet($data) {
		$rulesId = $data["rulesId"];
		$rulesManagementSetId = $this->save($data);
		foreach($rulesId as $key => $value) {
			if($value == 1){
				$qry = sprintf("INSERT INTO %s
					(RulesManagementSetId, RulesId)
					VALUES
					(%s, %s)", $this->xOver, $rulesManagementSetId, $key);
				$this->dbConnection->query($qry);
			}
		}
		file_put_contents("/tmp/storSaveNewSet.txt", print_r($_GET, true));
	}
	
	public function getSet($rulesManagementSetId) {
		$this->lastSQL = sprintf("SELECT rulesId FROM %s WHERE rulesManagementSetID = %s", $this->xOver, $rulesManagementSetId);
		$result = $this->dbConnection->query($this->lastSQL);
				
		if(isset($result)) {
			return $result;
		} else {
			
		} 
	}
	
	public function getNamesByMemberId($id) {
		// get the names of the sets from the table
		// where the id is equal to $memberId
		
//		$qry = sprintf("SELECT * FROM %s WHERE %s", $this->self, $id);
	}
	
	
	public function getOneByID($id) {
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE RulesManagementSetID = %s", $this->self, $id));
	}
	
	public function getAll() {
		$this->lastSQL = sprintf("SELECT * FROM");
	}
	
	public function getAllNamesByMemberId($memberId) {
		$this->lastSQL = sprintf("SELECT RulesManagementSetID, Title FROM %s WHERE memberID = %s", $this->self, $memberId );
		return $this->dbConnection->query($this->lastSQL);
	}
	
	public function createNew($dataIn) {
		$data = array();
		$data["title"]	= $this->dbConnection->real_escape_string($dataIn["RuleSetTitle"]);
		$data["active"]	= $this->dbConnection->real_escape_string($dataIn["defaultrule"]);
		$data["rulesId"]= $dataIn["rulesID"];
		return $data;
	}

	
}