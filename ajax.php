<?php
	include("bootstrap.php");
	include("common/classes/rulesManagementSet.class.php");
	$logger = new Logger();
	$connection = mysql_connect($host, $user, $pass);
	mysql_select_db($database);
	
	if(isset($_REQUEST["method"])) {
		if($_REQUEST["method"] == "getRulesList") {
			getRulesList($_REQUEST["rulesId"], $_REQUEST["userId"]);
		} elseif ($_REQUEST["method"] == "setRulesList") {
			// pass the posted information to the method to save the new Rules Set
			
		} 
	}
	
	
	function getRulesList($rulesId, $userId)
	{
		
		// This query should be changed to using ID, rather than title.
	$logger->logWrite("getRuleList");
	$logger->logWrite($rulesId);
	$logger->logWrite($userId);
		$qry = "SELECT * FROM RulesManagementSet WHERE Active = 1 AND memberID = " . $userId . " AND Title = '" . $rulesId . "';";
		
		$result = $mysqli->query($qry);
		$i = 0;
		$return = '';
		while($row = $result->fetch_array()) {
			$return .= $row[rulesID] . ",";
			$i++;
		}
//		echo json_encode($return);
		echo $return;
	}		
		function setRulesList($_REQUEST)
		{
		
			// This query should be changed to using ID, rather than title.
/*				
			$qry = "SELECT * FROM RulesManagementSet WHERE Active = 1 AND memberID = " . $userId . " AND Title = '" . $rulesId . "';";
		
			$result = $mysqli->query($qry);
			$i = 0;
			$return = '';
			while($row = $result->fetch_array()) {
				$return .= $row[rulesID] . ",";
				$i++;
			}
			*/
		}

    class ServiceResult {

        /**
        *
        * @var Boolean
        */
        public $success;
        /**
        *
        * @var Array
        */
        public $errors;
        /**
        *
        * @var Array
        */
        public $messages;
        /**
        * Holds data returned by a service or passthrough data.
        */
        public $data;
        /**
        *
        * @var String - Event name triggered in JavaScript when service call successful.
        */
        public $onSuccessEvent;
        /**
        *
        * @var String - Event name triggered in JavaScript when service call fails.
        */
        public $onErrorEvent;
    }
?>