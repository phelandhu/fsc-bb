<?php
session_start();
require_once("bootstrap.php");
require_once("common/classes/rulesManagementSet.class.php");
require_once("common/classes/campaign.class.php");
include("common/include/db_login.php");
mysql_connect($host, $user, $pass);
mysql_select_db($database);

$rulesManagementSet = new RulesManagementSet($dbDataArr);
$campaign = new Campaign($dbDataArr);

/**\
 * Array ( [intention] => update 
 * [firstName] => Marion 
 * [lastName""] => Fullilove 
 * [EmailAddress] => mfuller@PlymothB2B.co 
 * [CellPhone] => 2147483647 
 * [Username_New] => test 
 * [Password_Old] => test 
 * [Password_New] => 
 * [Password_New_Confirmation] => 
 * [form] => member )
 * 
 * Array ( [intention] => save 
 * [active] => 1 
 * [Action_portfolio] => 1 
 * [CampaignName] => End Of Month 
 * [DefaultLeadProvider] => Harshaw 
 * [PurchasePrice] => 25 
 * [IntegrationDate] => 2012-07-30 
 * [Currency] => USD United States Dollars 
 * [form] => Campaigns )

\**/

file_put_contents("/tmp/stor.txt", print_r($_GET, true));

if(isset($_GET["form"]) && $_GET["form"] == "Campaigns" && $_GET["intention"] == "save") {
	$log->trace("Going to the Save for the Campaign");
	handleCampaignSave($_GET, $campaign);
} elseif (isset($_GET["form"]) && $_GET["form"] == "Campaigns" && $_GET["intention"] == "update") {
	handleCampaignUpdate($_GET, $campaign);
} elseif (isset($_GET["form"]) && $_GET["form"] == "Campaigns" && $_GET["intention"] == "delete") {
	handleCampaignDelete($_GET, $campaign);
} elseif (isset($_GET["form"]) && $_GET["form"] == "member" && $_GET["intention"] == "save") {
	handlememberSave();
} elseif (isset($_GET["form"]) && $_GET["form"] == "rulesmanagement" && $_GET["intention"] == "save") {
	$log->trace("Going to the save for the rulesSet");
	handleruleSetSave($_GET, $rulesManagementSet);
} elseif (isset($_GET["form"]) && $_GET["form"] == "rulesmanagement" && $_GET["intention"] == "update") {
	$log->trace("Going to the update for the rulesSet");
	handleruleSetUpdate($_GET, $rulesManagementSet);
} elseif (isset($_GET["form"]) && $_GET["form"] == "rulesmanagement" && $_GET["intention"] == "update") {
	$log->trace("Going to the update for the rulesSet");
	handleruleSetDelete($_GET, $rulesManagementSet);
}


function handleCampaignSave($dataIn, $campaign) {
	$data = $campaign->createNew($dataIn);
	$campaign->save($data);
}

function handleCampaignUpdate($dataIn, $campaign) {
	$data = $campaign->createNew($dataIn);
	$data["id"]				= $dataIn["campaignId"];
	$campaign->save($data);
}

function handleCampaignDelete($dataIn, $campaign) {
		$campaign->delete($dataIn["campaignId"]);
}

function handleMemberSave() {
	
	$table = $_GET["form"]; // Members name
	 
	$username = mysql_real_escape_string($_GET['Username_New']);
	$password = hash('sha512', $_GET['Password_New']);
	$firstname = $_GET["firstName"];
	$lastname = $_GET["lastName"];
	$cellphone = $_GET["CellPhone"];
	$emailaddress = $_GET["EmailAddress"];
	
	$row ="";
	
	if($_GET['Password_New'] != "")
	{
		$sql = "UPDATE `member` SET
		`username` = '" . $username . "',
		`password` = '" . $password . "',
		`firstName` = '" . $firstname . "',
		`lastName` = '" . $lastname . "',
		`emailAddress` = '" . $emailaddress . "',
		`cellphone` = '" . $cellphone . "'
		WHERE `member`.`username` = '" . $_SESSION["username"] . "';";
	}else{
		$sql = "UPDATE `member` SET
		`username` = '" . $username . "',
		`firstName` = '" . $firstname . "',
		`lastName` = '" . $lastname . "',
		`emailAddress` = '" . $emailaddress . "',
		`cellphone` = '" . $cellphone . "'
		WHERE `member`.`username` = '" . $_SESSION["username"] . "';";
	}
	mysql_query($sql);
}

function handleMemberUpdate() {
	
}

function handleMemberDelete() {
	
}

function handleRuleSetSave($dataIn, $rulesManagementSet) {
	$data = $rulesManagementSet->createNew($dataIn);
	$data["memberId"] = $_SESSION["memberId"];
	$rulesManagementSet->saveNewSet($data);
}

function handleRuleSetUpdate($dataIn, $rulesManagementSet) {
	global $log;
	$log->trace(print_r($dataIn, true));
	$data = $rulesManagementSet->createNew($dataIn);
	$data["rulesManagementSetId"] = $dataIn["rulesManagementSetId"];
	$rulesManagementSet->updateSet($data);
	
	
/*	
	
	
	$result_memberid = mysql_query("SELECT * FROM member WHERE username = '" . $_SESSION["username"] . "'");
	$row_member = mysql_fetch_array($result_memberid);
	if( $_GET["intention"] == "update" && $_GET["RuleSetTitle"] != "" )
	{
		$result_memberid    = mysql_query( "SELECT * FROM member WHERE username = '" . $_SESSION["username"] . "'" );
		$row_member         = mysql_fetch_array( $result_memberid );
		$array      = $_GET["rulesID"];
		$ruletitle  = $_GET["RuleSetTitle"];
		//	RulesManagementSetID	Title	rulesID	Active	memberID
		$sql ="";
		foreach ($array as $key => $value)
		{
			$sql = "UPDATE RulesManagementSet SET ";
			$sql .= "Active = ".$value." WHERE Title = '".$ruletitle."' AND rulesID = ".$key ."; \n";
			mysql_query($sql);
		}
		// print_r($sql);
	}
	
	*/
}

function handleRuleSetDelete($dataIn, $rulesManagementSet) {
	$id = $dataIn["rulesManagementSetId"];
	$rulesManagementSet->delete();
}

?>
