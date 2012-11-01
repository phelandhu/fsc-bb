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
	
	public function save($data) { // not working yet.
		// I am creating a xover table between this and rules.
		$returnId = null;
		if(isset($data['id'])) {
			$qry = sprintf(" UPDATE %s  SET
					`name` = '%s',
					`comment` = '%s',
					`title` = '%s',
					`ruleDescription` = '%s',
					`phpLocation` = '%s',
					`value` = '%s',
					`fieldName` = '%s'
					WHERE id = %s",
					$this->self,
					$this->dbConnection->real_escape_string($data['name']),
					$this->dbConnection->real_escape_string($data['comment']),
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
					(`dateCreated`, `name`, `comment`, `title`, `ruleDescription`, `phpLocation`, `value`, `fieldName`)
					VALUES
					(now(), '', '', '%s', '%s', '%s', '%s', '%s')",
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
}