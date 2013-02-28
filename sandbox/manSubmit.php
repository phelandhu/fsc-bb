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
require_once("../bootstrap.php");
require_once("../common/classes/rulesManagementSet.class.php");
$rulesManagementSet = new RulesManagementSet($dbDataArr);
$resultRms = $rulesManagementSet->getAllNamesByMemberId(1);
// Step 1 - steal underpants

$apiId = 'jjOku930uroLJKsdur093ioprjekpkfe923i';
$apiKey = 'JJFIOJIEjioej9089I90FKDKKLDSKkldks';
$apiRef = 'c4ca4238a0b923820dcc509a6f75849b';
/*
if(isset($_POST)) {
	print_r($_POST);
} else {
*/
?>

<head>
<style type="text/css">
	.required:after { content:" *"; }
</style>

</head>

<form method="post">
	<table>
		<tr>
			<th>Rule Set Data</th>
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
			<td class="inputValue"><input type=text name="STOREKEY"></td>
		</tr>
		<tr>
			<td class="inputLabel">REFURL</td>
			<td class="inputValue"><input type=text name="REFURL"></td>
		</tr>
		<tr>
			<td class="inputLabel">IPADDRESS</td>
			<td class="inputValue"><input type=text name="IPADDRESS"></td>
		</tr>
		<tr>
			<td class="inputLabel">TIERKEY</td>
			<td class="inputValue"><input type=text name="TIERKEY"></td>
		</tr>
		<tr>
			<td class="inputLabel">AFFID</td>
			<td class="inputValue"><input type=text name="AFFID"></td>
		</tr>
		</tr>
		<tr>
			<td class="inputLabel">SUBID</td>
			<td class="inputValue"><input type=text name="SUBID"></td>
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
			<th>PERSONAL</th>
			<th></th>
		</tr>
		<tr>
			<td class="inputLabel">REQUESTEDAMOUNT</td>
			<td class="inputValue"><div class="required"><input type=text name="REQUESTEDAMOUNT"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">SSN</td>
			<td class="inputValue"><div class="required"><input type=text name="SSN"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">DOB</td>
			<td class="inputValue"><div class="required"><input type=text name="DOB"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">GENDER</td>
			<td class="inputValue"><input type=text name="GENDER"></td>
		</tr>
		<tr>
			<td class="inputLabel">FIRSTNAME</td>
			<td class="inputValue"><div class="required"><input type=text name="FIRSTNAME"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">MIDDLEINITIAL</td>
			<td class="inputValue"><input type=text name="MIDDLEINITIAL"></td>
		</tr>
		<tr>
			<td class="inputLabel">LASTNAME</td>
			<td class="inputValue"><div class="required"><input type=text name="LASTNAME"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">ADDRESS</td>
			<td class="inputValue"><div class="required"><input type=text name="ADDRESS"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">ADDRESS2</td>
			<td class="inputValue"><input type=text name="ADDRESS2"></td>
		</tr>
		<tr>
			<td class="inputLabel">CITY</td>
			<td class="inputValue"><div class="required"><input type=text name="CITY"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">STATE</td>
			<td class="inputValue"><div class="required"><input type=text name="STATE"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">ZIP</td>
			<td class="inputValue"><div class="required"><input type=text name="ZIP"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">HOMEPHONE</td>
			<td class="inputValue"><div class="required"><input type=text name="HOMEPHONE"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">OTHERPHONE</td>
			<td class="inputValue"><div class="required"><input type=text name="OTHERPHONE"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">DLSTATE</td>
			<td class="inputValue"><div class="required"><input type=text name="DLSTATE"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">DLNUMBER</td>
			<td class="inputValue"><div class="required"><input type=text name="DLNUMBER"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">CONTACTTIME</td>
			<td class="inputValue"><input type=text name="CONTACTTIME"></td>
		</tr>
		<tr>
			<td class="inputLabel">ADDRESSMONTHS</td>
			<td class="inputValue"><input type=text name="ADDRESSMONTHS"></td>
		</tr>
		<tr>
			<td class="inputLabel">ADDRESSYEARS</td>
			<td class="inputValue"><input type=text name="ADDRESSYEARS"></td>
		</tr>
		<tr>
			<td class="inputLabel">RENTOROWN</td>
			<td class="inputValue"><div class="required"><input type=text name="RENTOROWN"></td>
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
			<td class="inputValue"><div class="required"><input type=text name="EMAIL"></div></td>
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
			<th>EMPLOYMENT</th>
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
			<td class="inputValue"><div class="required"><input type=text name="EMPMONTHS"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPYEARS</td>
			<td class="inputValue"><div class="required"><input type=text name="EMPYEARS"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPNAME</td>
			<td class="inputValue"><div class="required"><input type=text name="EMPNAME"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPADDRESS</td>
			<td class="inputValue"><input type=text name="EMPADDRESS"></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPADDRESS2</td>
			<td class="inputValue"><input type=text name="EMPADDRESS2"></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPCITY</td>
			<td class="inputValue"><input type=text name="EMPCITY"></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPSTATE</td>
			<td class="inputValue"><input type=text name="EMPSTATE"></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPZIP</td>
			<td class="inputValue"><input type=text name="EMPZIP"></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPPHONE</td>
			<td class="inputValue"><div class="required"><input type=text name="EMPPHONE"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPPHONEEXT</td>
			<td class="inputValue"><input type=text name="EMPPHONEEXT"></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPFAX</td>
			<td class="inputValue"><input type=text name="EMPFAX"></td>
		</tr>
		<tr>
			<td class="inputLabel">SUPERVISORNAME</td>
			<td class="inputValue"><input type=text name="SUPERVISORNAME"></td>
		</tr>
		<tr>
			<td class="inputLabel">SUPERVISORPHONE</td>
			<td class="inputValue"><input type=text name="SUPERVISORPHONE"></td>
		</tr>
		<tr>
			<td class="inputLabel">SUPERVISORPHONEEXT</td>
			<td class="inputValue"><input type=text name="SUPERVISORPHONEEXT"></td>
		</tr>
		<tr>
			<td class="inputLabel">HIREDATE</td>
			<td class="inputValue"><div class="required"><input type=text name="HIREDATE"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPTYPE</td>
			<td class="inputValue"><div class="required"><input type=text name="EMPTYPE"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">JOBTITLE</td>
			<td class="inputValue"><input type=text name="JOBTITLE"></td>
		</tr>
		<tr>
			<td class="inputLabel">WORKSHIFT</td>
			<td class="inputValue"><input type=text name="WORKSHIFT"></td>
		</tr>
		<tr>
			<td class="inputLabel">PAYFREQUENCY</td>
			<td class="inputValue"><div class="required"><input type=text name="PAYFREQUENCY"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">NETMONTHLY</td>
			<td class="inputValue"><div class="required"><input type=text name="NETMONTHLY"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">GROSSMONTHLY</td>
			<td class="inputValue"><input type=text name="GROSSMONTHLY"></td>
		</tr>
		<tr>
			<td class="inputLabel">LASTPAYDATE</td>
			<td class="inputValue"><div class="required"><input type=text name="LASTPAYDATE"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">NEXTPAYDATE</td>
			<td class="inputValue"><div class="required"><input type=text name="NEXTPAYDATE"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">SECONDPAYDATE</td>
			<td class="inputValue"><div class="required"><input type=text name="SECONDPAYDATE"></div></td>
		</tr>
	</table>

	<table>
		<tr>
			<th>BANK</th>
			<th></th>
		</tr>
		<tr>
			<td class="inputLabel">ACCOUNTHOLDER</td>
			<td class="inputValue"><input type=text name="ACCOUNTHOLDER"></td>
		</tr>
		<tr>
			<td class="inputLabel">BANKNAME</td>
			<td class="inputValue"><div class="required"><input type=text name="BANKNAME"></div></td>
		</tr>
		<td class="inputLabel">BANKPHONE</td>
		<td class="inputValue"><input type=text name="BANKPHONE"></td>
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
		<td class="inputValue"><div class="required"><input type=text name="ROUTINGNUMBER"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">ACCOUNTNUMBER</td>
			<td class="inputValue"><div class="required"><input type=text name="ACCOUNTNUMBER"></div></td>
		</tr>
        <tr>
			<td class="inputLabel">BANKMONTHS</td>
			<td class="inputValue"><div class="required"><input type=text name="BANKMONTHS"></div></td>
		</tr>
        <tr>
			<td class="inputLabel">BANKYEARS</td>
			<td class="inputValue"><div class="required"><input type=text name="BANKYEARS"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">OUTSTANDINGAMT</td>
			<td class="inputValue"><input type=text name="OUTSTANDINGAMT"></td>
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
			<th>REFERENCES</th>
			<th></th>
		</tr>
		<tr>
			<td class="inputLabel">FIRSTNAME</td>
			<td class="inputValue"><div class="required"><input type=text name="FIRSTNAME"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">LASTNAME</td>
			<td class="inputValue"><div class="required"><input type=text name="LASTNAME"></div></td>
		</tr>
		<td class="inputLabel">PHONE</td>
		<td class="inputValue"><div class="required"><input type=text name="PHONE"></div></td>
		</tr>
		<tr>
			<td class="inputLabel">RELATIONSHIP</td>
			<td class="inputValue">
            <div class="required">
            <select name="RELATIONSHIP">
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
    <?php
//	}
	?>