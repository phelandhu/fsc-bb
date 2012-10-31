<?php
	include("common/include/db_login.php");
	$connection = mysql_connect($host, $user, $pass);
	mysql_select_db($database);
	
	if(isset($_REQUEST["method"])) {
		if($_REQUEST["method"] == "getRulesList") {
			get_rules($_REQUEST["rulesId"], $_REQUEST["userId"]);
		}
	}
	
	
	function get_rules($rulesId, $userId)
	{
		$qry = "SELECT * FROM RulesManagementSet WHERE Active = 1 AND memberID = " . $userId . " AND Title = '" . $rulesId . "';";
		$result = $mysqli->query($qry);
		$i = 0;
		$return = '';
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			$return .= $row[rulesID] . ",";
			$i++;
		}
		
//		echo json_encode($return);
		echo $return;
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