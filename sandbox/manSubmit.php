<?php
// manSubmit.php
/***********************************************
 * Created:            Mar 1, 2013 10:46:02 AM
* Last Modified:      Mar 1, 2013 10:46:02 AM
*
* This is the manual submission page to do rule testing
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include_once("../bootstrap.php");
require_once($path . "/classes/rulesManagementSet.class.php");
include_once($path . "/classes/rules.class.php");
include_once($path . "/classes/postEpic.class.php");
include_once($path . "/classes/postLbmc.class.php");
include_once($path . "/classes/transactionLeads.class.php");
include_once($path . "/classes/rulesValidation.class.php");
$rulesManagementSet = new RulesManagementSet($dbDataArr);
$rules = new Rules($dbDataArr);
$transactionLeads = new TransactionLeads($dbDataArr);
$rulesValidation = new RulesValidation();

$resultRms = $rulesManagementSet->getAllNamesByMemberId(1);
// Step 1 - steal underpants

$apiId = 'jjOku930uroLJKsdur093ioprjekpkfe923i';
$apiKey = 'JJFIOJIEjioej9089I90FKDKKLDSKkldks';
$apiRef = 'c4ca4238a0b923820dcc509a6f75849b';

if(isset($_POST["RulesManagementSetListing"])) {
	$dataIn = $_POST;
	if(isset($_POST["RulesManagementSetListing"]) && strlen($_POST["RulesManagementSetListing"]) > 1){
		$rulesResult = $rulesManagementSet->getSet($_POST["RulesManagementSetListing"]);
		if($rulesResult){
			
			// Write it out to the database
			$data = $transactionLeads->cleanData($dataIn);
			$transactionLeadId = $transactionLeads->save($data);
			$data['id'] = $transactionLeadId;	
// start of external function
			$validationResponse = $rulesValidation->validateData2Bool($dataIn, $rulesResult);
// end		
			if($validationResponse == false){ // Rules failed
				echo "<rules_result>Rules Failed</rules_result>";
				$lbmc = new PostLBMC();
				$lbmc->post2LBMC($xmlsource, $transactionLeadId);
				$data["results"] = 0;
				// post to LP URL
			} else { // Rules passed
				echo "<rules_result>Rules Passed</rules_result>";
				$epic = new PostEPIC();
				$epic->post2EPIC($xmlsource, $transactionLeadId);
				$data["results"] = 1;
				// post to LP URL
			}
		} else {
			echo "Ruleset not found.";
		}
	} else {
		echo "You must select a ruleset to test against.";
	}

//	print_r($_POST);
}


?>

<head>
<style type="text/css">
	.required:after { content:" *"; }
	.inputLabel {width:240px;}
	.inputValue {width:240px;}
	.tableHeader {text-align:right;}
</style>

</head>

<form method="post">
	<table>
		<tr>
			<th class="tableHeader">Rule Set Data</th>
			<th></th>
		</tr>
<!--
		<tr>
			<td class="inputLabel">API ID:</td>
			<td class="inputValue"><input type="text" value="<?php if(isset($_POST['apiId'])) { echo $_POST['apiId'];} else { echo $apiId; } ?>" cols="100" name="apiId"></td>
		</tr>
		<tr>
			<td class="inputLabel">API Key:</td>
			<td class="inputValue"><input type="text" value="<?php if(isset($_POST['apiKey'])) { echo $_POST['apiKey'];} else { echo $apiKey; } ?>" cols="100" name="apiKey"></td>
		</tr>
-->
		<tr>
			<td class="inputLabel">Rule Set to test</td>
			<td class="inputValue">
                <select id="RulesManagementSetListing" name="RulesManagementSetListing" ONCHANGE="selectrule();">
                <option value="">-- Select Rule Set --</option>
                <?php
					while($row = $resultRms->fetch_array())
					{
						$testType .= "test<br>";
						printf("<option value=\"%s\">%s</option>", $row["RulesManagementSetID"], $row["Title"]);        
					}
                ?>
                </select>
            </td>
		</tr>
<!--
		<tr>
			<td class="inputLabel">URL to submit to:</td>
			<td class="inputValue"><input type="text" value="<?php if(isset($urlPostXML)) { echo $urlPostXML;} else { echo ""; } ?>" cols="100" size="120" ></td>
		</tr>
-->
	</table>

<!--
	<table>
		<tr>
			<th>REFERRAL</th>
			<th></th>
		</tr>
		<tr>
			<td class="inputLabel">STOREKEY</td>
			<td class="inputValue"><input type=text name="STOREKEY" <?php echo (isset($_POST["STOREKEY"]) ? "value=\"" . $_POST["STOREKEY"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">REFURL</td>
			<td class="inputValue"><input type=text name="REFURL" <?php echo (isset($_POST["REFURL"]) ? "value=\"" . $_POST["REFURL"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">IPADDRESS</td>
			<td class="inputValue"><input type=text name="IPADDRESS" <?php echo (isset($_POST["IPADDRESS"]) ? "value=\"" . $_POST["IPADDRESS"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">TIERKEY</td>
			<td class="inputValue"><input type=text name="TIERKEY" <?php echo (isset($_POST["TIERKEY"]) ? "value=\"" . $_POST["TIERKEY"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">AFFID</td>
			<td class="inputValue"><input type=text name="AFFID" <?php echo (isset($_POST["AFFID"]) ? "value=\"" . $_POST["AFFID"] . "\"" : "")  ?>></td>
		</tr>
		</tr>
		<tr>
			<td class="inputLabel">SUBID</td>
			<td class="inputValue"><input type=text name="SUBID" <?php echo (isset($_POST["SUBID"]) ? "value=\"" . $_POST["SUBID"] . "\"" : "")  ?>></td>
		</tr>
		</tr>
		<tr>
			<td class="inputLabel">TEST</td>
			<td class="inputValue"><input type="radio" name="TEST" value="yes">Yes<br>
				<input type="radio" name="TEST" value="no" default>No</td>
		</tr>
	</table>
-->

	<h3>CUSTOMER</h3>
	<table>
		<tr>
			<th class="tableHeader">PERSONAL</th>
			<th></th>
		</tr>
		<tr>
			<td class="inputLabel">REQUESTEDAMOUNT</td>
			<td class="inputValue"><div class="required"><input type=text name="REQUESTEDAMOUNT" <?php echo (isset($_POST["REQUESTEDAMOUNT"]) ? "value=\"" . $_POST["REQUESTEDAMOUNT"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">SSN</td>
			<td class="inputValue"><div class="required"><input type=text name="SSN" <?php echo (isset($_POST["SSN"]) ? "value=\"" . $_POST["SSN"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">DOB</td>
			<td class="inputValue"><div class="required"><input type=text name="DOB" <?php echo (isset($_POST["DOB"]) ? "value=\"" . $_POST["DOB"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">GENDER</td>
			<td class="inputValue"><input type=text name="GENDER" <?php echo (isset($_POST["GENDER"]) ? "value=\"" . $_POST["GENDER"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">FIRSTNAME</td>
			<td class="inputValue"><div class="required"><input type=text name="FIRSTNAME" <?php echo (isset($_POST["FIRSTNAME"]) ? "value=\"" . $_POST["FIRSTNAME"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">MIDDLEINITIAL</td>
			<td class="inputValue"><input type=text name="MIDDLEINITIAL" <?php echo (isset($_POST["MIDDLEINITIAL"]) ? "value=\"" . $_POST["MIDDLEINITIAL"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">LASTNAME</td>
			<td class="inputValue"><div class="required"><input type=text name="LASTNAME" <?php echo (isset($_POST["LASTNAME"]) ? "value=\"" . $_POST["LASTNAME"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">ADDRESS</td>
			<td class="inputValue"><div class="required"><input type=text name="ADDRESS" <?php echo (isset($_POST["ADDRESS"]) ? "value=\"" . $_POST["ADDRESS"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">ADDRESS2</td>
			<td class="inputValue"><input type=text name="ADDRESS2" <?php echo (isset($_POST["ADDRESS2"]) ? "value=\"" . $_POST["ADDRESS2"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">CITY</td>
			<td class="inputValue"><div class="required"><input type=text name="CITY" <?php echo (isset($_POST["CITY"]) ? "value=\"" . $_POST["CITY"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">STATE</td>
			<td class="inputValue"><div class="required"><input type=text name="STATE" <?php echo (isset($_POST["STATE"]) ? "value=\"" . $_POST["STATE"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">ZIP</td>
			<td class="inputValue"><div class="required"><input type=text name="ZIP" <?php echo (isset($_POST["ZIP"]) ? "value=\"" . $_POST["ZIP"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">HOMEPHONE</td>
			<td class="inputValue"><div class="required"><input type=text name="HOMEPHONE" <?php echo (isset($_POST["HOMEPHONE"]) ? "value=\"" . $_POST["HOMEPHONE"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">OTHERPHONE</td>
			<td class="inputValue"><div class="required"><input type=text name="OTHERPHONE" <?php echo (isset($_POST["OTHERPHONE"]) ? "value=\"" . $_POST["OTHERPHONE"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">DLSTATE</td>
			<td class="inputValue"><div class="required"><input type=text name="DLSTATE" <?php echo (isset($_POST["DLSTATE"]) ? "value=\"" . $_POST["DLSTATE"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">DLNUMBER</td>
			<td class="inputValue"><div class="required"><input type=text name="DLNUMBER" <?php echo (isset($_POST["DLNUMBER"]) ? "value=\"" . $_POST["DLNUMBER"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">CONTACTTIME</td>
			<td class="inputValue"><input type=text name="CONTACTTIME" <?php echo (isset($_POST["CONTACTTIME"]) ? "value=\"" . $_POST["CONTACTTIME"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">ADDRESSMONTHS</td>
			<td class="inputValue"><input type=text name="ADDRESSMONTHS" <?php echo (isset($_POST["ADDRESSMONTHS"]) ? "value=\"" . $_POST["ADDRESSMONTHS"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">ADDRESSYEARS</td>
			<td class="inputValue"><input type=text name="ADDRESSYEARS" <?php echo (isset($_POST["ADDRESSYEARS"]) ? "value=\"" . $_POST["ADDRESSYEARS"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">RENTOROWN</td>
			<td class="inputValue"><div class="required"><input type=text name="RENTOROWN" <?php echo (isset($_POST["RENTOROWN"]) ? "value=\"" . $_POST["RENTOROWN"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">ISMILITARY</td>
			<td class="inputValue">
            <div class="required">
            <select name="ISMILITARY">
                <option value="Y">Yes</option>
                <option value="N">No</option>
            </select>
            </div>
			</td>
		</tr>
		<tr>
			<td class="inputLabel">ISCITIZEN</td>
			<td class="inputValue">
            <div class="required">
            <select name="ISCITIZEN">
                <option value="Y">Yes</option>
                <option value="N">No</option>
            </select>
            </div>
            </td>
		</tr>
		<tr>
			<td class="inputLabel">OTHEROFFERS</td>
			<td class="inputValue">
            <div class="required">
            <select name="OTHEROFFERS">
                <option value="Y">Yes</option>
                <option value="N">No</option>
            </select>
            </div>
            </td>
		</tr>
		<tr>
			<td class="inputLabel">EMAIL</td>
			<td class="inputValue"><div class="required"><input type=text name="EMAIL" <?php echo (isset($_POST["EMAIL"]) ? "value=\"" . $_POST["EMAIL"] . "\"" : "")  ?>></div></td>
		</tr>
        <!--
		<tr>
			<td class="inputLabel"><div class="required">BANKRUPTCY</div></td>
			<td class="inputValue"><input type="radio" name="BANKRUPTCY"
				value="yes">Yes<br> <input type="radio" name="BANKRUPTCY" value="no">No
			</td>
		</tr>
        -->
	</table>


	<table>
		<tr>
			<th class="tableHeader">EMPLOYMENT</th>
			<th></th>
		</tr>
		<tr>
			<td class="inputLabel">INCOMETYPE</td>
			<td class="inputValue">
            <div class="required">
            <select name="INCOMETYPE">
            	<option value="E">Employed</option>
                <option value="D">Disability</option>
                <option value="S">Social Security</option>
                <option value="U">Unemployed</option>
                <option value="P">Pension</option>
                <option value="O">Other</option>
            </select>
            </div>
			</td>

		</tr>
		<tr>
			<td class="inputLabel">PAYTYPE</td>
			<td class="inputValue">
            <div class="required">
            <select name="PAYTYPE">
                <option value="D">Direct Deposit</option>
                <option value="P">Paper Check</option>
            </select>
            </div>
            </td>
		</tr>
		<tr>
			<td class="inputLabel">EMPMONTHS</td>
			<td class="inputValue"><div class="required"><input type=text name="EMPMONTHS" <?php echo (isset($_POST["EMPMONTHS"]) ? "value=\"" . $_POST["EMPMONTHS"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPYEARS</td>
			<td class="inputValue"><div class="required"><input type=text name="EMPYEARS" <?php echo (isset($_POST["EMPYEARS"]) ? "value=\"" . $_POST["EMPYEARS"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPNAME</td>
			<td class="inputValue"><div class="required"><input type=text name="EMPNAME" <?php echo (isset($_POST["EMPNAME"]) ? "value=\"" . $_POST["EMPNAME"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPADDRESS</td>
			<td class="inputValue"><input type=text name="EMPADDRESS" <?php echo (isset($_POST["EMPADDRESS"]) ? "value=\"" . $_POST["EMPADDRESS"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPADDRESS2</td>
			<td class="inputValue"><input type=text name="EMPADDRESS2" <?php echo (isset($_POST["EMPADDRESS2"]) ? "value=\"" . $_POST["EMPADDRESS2"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPCITY</td>
			<td class="inputValue"><input type=text name="EMPCITY" <?php echo (isset($_POST["EMPCITY"]) ? "value=\"" . $_POST["EMPCITY"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPSTATE</td>
			<td class="inputValue"><input type=text name="EMPSTATE" <?php echo (isset($_POST["EMPSTATE"]) ? "value=\"" . $_POST["EMPSTATE"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPZIP</td>
			<td class="inputValue"><input type=text name="EMPZIP" <?php echo (isset($_POST["EMPZIP"]) ? "value=\"" . $_POST["EMPZIP"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPPHONE</td>
			<td class="inputValue"><div class="required"><input type=text name="EMPPHONE" <?php echo (isset($_POST["EMPPHONE"]) ? "value=\"" . $_POST["EMPPHONE"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPPHONEEXT</td>
			<td class="inputValue"><input type=text name="EMPPHONEEXT" <?php echo (isset($_POST["EMPPHONEEXT"]) ? "value=\"" . $_POST["EMPPHONEEXT"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPFAX</td>
			<td class="inputValue"><input type=text name="EMPFAX" <?php echo (isset($_POST["EMPFAX"]) ? "value=\"" . $_POST["EMPFAX"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">SUPERVISORNAME</td>
			<td class="inputValue"><input type=text name="SUPERVISORNAME" <?php echo (isset($_POST["SUPERVISORNAME"]) ? "value=\"" . $_POST["SUPERVISORNAME"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">SUPERVISORPHONE</td>
			<td class="inputValue"><input type=text name="SUPERVISORPHONE" <?php echo (isset($_POST["SUPERVISORPHONE"]) ? "value=\"" . $_POST["SUPERVISORPHONE"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">SUPERVISORPHONEEXT</td>
			<td class="inputValue"><input type=text name="SUPERVISORPHONEEXT" <?php echo (isset($_POST["SUPERVISORPHONEEXT"]) ? "value=\"" . $_POST["SUPERVISORPHONEEXT"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">HIREDATE</td>
			<td class="inputValue"><div class="required"><input type=text name="HIREDATE" <?php echo (isset($_POST["HIREDATE"]) ? "value=\"" . $_POST["HIREDATE"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPTYPE</td>
			<td class="inputValue"><div class="required"><input type=text name="EMPTYPE" <?php echo (isset($_POST["EMPTYPE"]) ? "value=\"" . $_POST["EMPTYPE"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">JOBTITLE</td>
			<td class="inputValue"><input type=text name="JOBTITLE" <?php echo (isset($_POST["JOBTITLE"]) ? "value=\"" . $_POST["JOBTITLE"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">WORKSHIFT</td>
			<td class="inputValue"><input type=text name="WORKSHIFT" <?php echo (isset($_POST["WORKSHIFT"]) ? "value=\"" . $_POST["WORKSHIFT"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">PAYFREQUENCY</td>
			<td class="inputValue"><div class="required"><input type=text name="PAYFREQUENCY" <?php echo (isset($_POST["PAYFREQUENCY"]) ? "value=\"" . $_POST["PAYFREQUENCY"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">NETMONTHLY</td>
			<td class="inputValue"><div class="required"><input type=text name="NETMONTHLY" <?php echo (isset($_POST["NETMONTHLY"]) ? "value=\"" . $_POST["NETMONTHLY"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">GROSSMONTHLY</td>
			<td class="inputValue"><input type=text name="GROSSMONTHLY" <?php echo (isset($_POST["GROSSMONTHLY"]) ? "value=\"" . $_POST["GROSSMONTHLY"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">LASTPAYDATE</td>
			<td class="inputValue"><div class="required"><input type=text name="LASTPAYDATE" <?php echo (isset($_POST["LASTPAYDATE"]) ? "value=\"" . $_POST["LASTPAYDATE"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">NEXTPAYDATE</td>
			<td class="inputValue"><div class="required"><input type=text name="NEXTPAYDATE" <?php echo (isset($_POST["NEXTPAYDATE"]) ? "value=\"" . $_POST["NEXTPAYDATE"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">SECONDPAYDATE</td>
			<td class="inputValue"><div class="required"><input type=text name="SECONDPAYDATE" <?php echo (isset($_POST["SECONDPAYDATE"]) ? "value=\"" . $_POST["SECONDPAYDATE"] . "\"" : "")  ?>></div></td>
		</tr>
	</table>

	<table>
		<tr>
			<th class="tableHeader">BANK</th>
			<th></th>
		</tr>
		<tr>
			<td class="inputLabel">ACCOUNTHOLDER</td>
			<td class="inputValue"><input type=text name="ACCOUNTHOLDER" <?php echo (isset($_POST["ACCOUNTHOLDER"]) ? "value=\"" . $_POST["ACCOUNTHOLDER"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">BANKNAME</td>
			<td class="inputValue"><div class="required"><input type=text name="BANKNAME" <?php echo (isset($_POST["BANKNAME"]) ? "value=\"" . $_POST["BANKNAME"] . "\"" : "")  ?>></div></td>
		</tr>
		<td class="inputLabel">BANKPHONE</td>
		<td class="inputValue"><input type=text name="BANKPHONE" <?php echo (isset($_POST["BANKPHONE"]) ? "value=\"" . $_POST["BANKPHONE"] . "\"" : "")  ?>></td>
		</tr>
		<tr>
			<td class="inputLabel">ACCOUNTTYPE</td>
			<td class="inputValue">
            <div class="required">
            <select name="ACCOUNTTYPE">
                <option value="C">Checking</option>
                <option value="S">Savings</option>
            </select>
            </div>
            </td>
		</tr>
		<td class="inputLabel">ROUTINGNUMBER</td>
		<td class="inputValue"><div class="required"><input type=text name="ROUTINGNUMBER" <?php echo (isset($_POST["ROUTINGNUMBER"]) ? "value=\"" . $_POST["ROUTINGNUMBER"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">ACCOUNTNUMBER</td>
			<td class="inputValue"><div class="required"><input type=text name="ACCOUNTNUMBER" <?php echo (isset($_POST["ACCOUNTNUMBER"]) ? "value=\"" . $_POST["ACCOUNTNUMBER"] . "\"" : "")  ?>></div></td>
		</tr>
        <tr>
			<td class="inputLabel">BANKMONTHS</td>
			<td class="inputValue"><div class="required"><input type=text name="BANKMONTHS" <?php echo (isset($_POST["BANKMONTHS"]) ? "value=\"" . $_POST["BANKMONTHS"] . "\"" : "")  ?>></div></td>
		</tr>
        <tr>
			<td class="inputLabel">BANKYEARS</td>
			<td class="inputValue"><div class="required"><input type=text name="BANKYEARS" <?php echo (isset($_POST["BANKYEARS"]) ? "value=\"" . $_POST["BANKYEARS"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">OUTSTANDINGAMT</td>
			<td class="inputValue"><input type=text name="OUTSTANDINGAMT" <?php echo (isset($_POST["OUTSTANDINGAMT"]) ? "value=\"" . $_POST["OUTSTANDINGAMT"] . "\"" : "")  ?>></td>
		</tr>
		<td class="inputLabel">ACTIVECHECKING</td>
		<td class="inputValue">
            <div class="required">
            <select name="ACTIVECHECKING">
                <option value="Y">Yes</option>
                <option value="N">No</option>
            </select>
            </div>
		</td>
		</tr>
	</table>

	<table>
		<tr>
			<th class="tableHeader">REFERENCES</th>
			<th></th>
		</tr>
		<tr>
			<td class="inputLabel">FIRSTNAME</td>
			<td class="inputValue"><div class="required"><input type=text name="REFFIRSTNAME" <?php echo (isset($_POST["REFFIRSTNAME"]) ? "value=\"" . $_POST["REFFIRSTNAME"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">LASTNAME</td>
			<td class="inputValue"><div class="required"><input type=text name="REFLASTNAME" <?php echo (isset($_POST["REFLASTNAME"]) ? "value=\"" . $_POST["REFLASTNAME"] . "\"" : "")  ?>></div></td>
		</tr>
		<td class="inputLabel">PHONE</td>
		<td class="inputValue"><div class="required"><input type=text name="REFPHONE" <?php echo (isset($_POST["REFPHONE"]) ? "value=\"" . $_POST["REFPHONE"] . "\"" : "")  ?>></div></td>
		</tr>
		<tr>
			<td class="inputLabel">RELATIONSHIP</td>
			<td class="inputValue">
            <div class="required">
            <select name="REFRELATIONSHIP">
                <option value="S">Spouse</option>
                <option value="L">Sibling</option>
                <option value="P">Parent</option>
                <option value="C">Co-worker</option>
                <option value="F">Friend</option>
                <option value="B">Boyfriend</option>
                <option value="G">Girlfriend</option>
                <option value="R">Brother</option>
                <option value="I">Sister</option>
                <option value="O">Other</option>
            </select>
            </div>
            </td>
		</tr>

	</table>
    
    <input type="submit" />
