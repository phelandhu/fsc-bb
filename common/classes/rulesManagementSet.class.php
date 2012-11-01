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
	protected $self = "rulesManagementSet";
	protected $xOver = "xRules_RulesManagementSet";
	
	public function save($data) { // not working yet.
		// I am creating a xover table between this and rules.
		$returnId = null;
		if(isset($data['id'])) {
			$qry = sprintf(" UPDATE %s  SET
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
			$qry = sprintf("INSERT INTO %s
					(`dateCreated`, `name`, `comment`, `title`, `active`, `memberId`)
					VALUES
					(now(), '', '', '%s', %s, %s)",
					$this->self,
					$this->dbConnection->real_escape_string($data['title']),
					$this->dbConnection->real_escape_string($data['active']),
					$this->dbConnection->real_escape_string($data['memberId']));
			$this->dbConnection->query($qry);
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
			$qry = sprintf("DELETE FROM %s WHERE rulesManagementSetId = %s", $this->xOver, $rulesManagementSetId);
			$this->dbConnection->query($qry);
			// Walk through the Rules Id and create and insert
			$stmt = $this->dbConnection->prepare("INSERT INTO xRules_RulesManagementSet (rulesManagementSetId, rulesId) VALUES (?, ?)");
			$stmt->bind_param("ii", $rulesManagementSetId, $rule);
			foreach($rulesId as $rule) {
				$stmt->execute();
			}
		}
	}
	
	public function getSet($rulesManagementSetId) {
		$qry = sprintf("SELECT rulesId FROM %s WHERE rulesManagementSetId = %s", $this->xOver, $rulesManagementSetId);
		$result = $this->dbConnection->query($qry);
				
		if(isset($result)) {
			return $result;
		} else {
			
		} 
	}
}