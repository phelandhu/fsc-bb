<?php
// rules.class.php
/***********************************************
* Created:            Oct 31, 2012 10:58:32 AM
* Last Modified:      Oct 31, 2012 10:58:32 AM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class Rules extends BB_Data {
	protected $self = "rules";
	
	public function save($data) {
		$returnId = null;
		if(isset($data['id'])) {
			$qry = sprintf(" UPDATE %s SET
				`title` = '%s',
				`ruleDescription` = '%s',
				`phpLocation` = '%s',
				`value` = '%s',
				`fieldName` = '%s'
				WHERE rulesID = %s",
					$this->self,
					$this->dbConnection->real_escape_string($data['title']),
					$this->dbConnection->real_escape_string($data['ruleDescription']),
					$this->dbConnection->real_escape_string($data['phpLocation']),
					$this->dbConnection->real_escape_string($data['value']),
					$this->dbConnection->real_escape_string($data['fieldName']),
					$data['id']);
			$this->dbConnection->query($qry);
			$returnId = $data['id'];
		} else {
			$qry = sprintf("INSERT INTO %s
					(`Title`, `RuleDescription`, `PHPLocation`, `value`, `FieldName`)
					VALUES
					('%s', '%s', '%s', '%s', '%s')",
					$this->self,
					$this->dbConnection->real_escape_string($data['title']),
					$this->dbConnection->real_escape_string($data['ruleDescription']),
					$this->dbConnection->real_escape_string($data['phpLocation']),
					$this->dbConnection->real_escape_string($data['value']),
					$this->dbConnection->real_escape_string($data['fieldName']));
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
	
	public function getRulesByMemberId($memberId) {
		$qry = sprintf("SELECT rl.* FROM rules rl
				INNER JOIN RulesManagementSet ON rules.RulesID = RulesManagementSet.rulesID
				WHERE memberID = %s AND active = 1;", $memberId);
		return $this->dbConnection->query($qry);	
	}

	public function getRulesByMemberIdAndTitle($memberId, $RMSTitle) {
		$qry = sprintf("SELECT rl.* FROM rules rl
				INNER JOIN RulesManagementSet ON rules.RulesID = RulesManagementSet.rulesID
				WHERE memberID = %s AND active = 1 AND RulesManagementSet.title = '%s';", $memberId, $RMSTitle);
		return $this->dbConnection->query($qry);
	}
	
	public function getRulesByUsername($username) {
		$qry = sprintf("SELECT rl.PHPLocation, rl.value, rl.FieldName 
				FROM `member` m LEFT JOIN  `RulesManagementSet` rm ON rm.`memberID` = `m`.`id` LEFT JOIN `rules` rl ON  `rl`.`rulesID` =  `rm`.`rulesID` 
				WHERE username = '%s' AND rm.Active = 1", $username);
		return $this->dbConnection->query($qry);
	}
	
	public function getOneByID($id) {
		return $this->dbConnection->query(sprintf("SELECT * FROM %s WHERE rulesID = %s", $this->self, $id));
	}
}