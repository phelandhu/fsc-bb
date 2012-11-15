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
					(`dateCreated`, `name`, `comment`, `title`, `active`, `memberId`)
					VALUES
					(now(), '', '', '%s', %s, %s)",
					$this->self,
					$this->dbConnection->real_escape_string($data['title']),
					$this->dbConnection->real_escape_string($data['active']),
					$this->dbConnection->real_escape_string($data['memberId']));
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
	
	public function saveSet($rulesManagementSetId, $rulesId) {
		$rule = null;
		if(isset($rulesManagementSetId) && isset($rulesId)) {
			// find and delete all references to the RMS ID
			$this->lastSQL = sprintf("DELETE FROM %s WHERE rulesManagementSetId = %s", $this->xOver, $rulesManagementSetId);
			$this->dbConnection->query($this->lastSQL);
			// Walk through the Rules Id and create and insert
			$stmt = $this->dbConnection->prepare("INSERT INTO xRules_RulesManagementSet (rulesManagementSetId, rulesId) VALUES (?, ?)");
			$stmt->bind_param("ii", $rulesManagementSetId, $rule);
			foreach($rulesId as $rule) {
				$stmt->execute();
			}
		}
	}
	
	public function getSet($rulesManagementSetId) {
		$this->lastSQL = sprintf("SELECT rulesId FROM %s WHERE rulesManagementSetId = %s", $this->xOver, $rulesManagementSetId);
		$result = $this->dbConnection->query($this->lastSQL);
				
		if(isset($result)) {
			return $result;
		} else {
			
		} 
	}
	
	public function getNamesByMemberId($memberId) {
		// get the names of the sets from the table
		// where the id is equal to $memberId
		
//		$qry = sprintf("SELECT * FROM %s WHERE ")
	}
	
	
	public function getOneByID($id) {
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE RulesManagementSetID = %s", $this->self, $id));
	}
}