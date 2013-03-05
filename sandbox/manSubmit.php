<?php
// manSubmit.php
/***********************************************
 * Created:            Mar 1, 2013 10:46:02 AM
* Last Modified:      Mar 1, 2013 10:46:02 AM
*
* [LEFT BLANK FOR PROGRAM DESCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
// Step 1 - steal underpants

$apiId = 'jjOku930uroLJKsdur093ioprjekpkfe923i';
$apiKey = 'JJFIOJIEjioej9089I90FKDKKLDSKkldks';
$apiRef = 'c4ca4238a0b923820dcc509a6f75849b';
?>
<form>
	<table>
		<tr>
			<th>API Data</th>
			<th></th>
		</tr>
		<tr>
			<td class="inputLabel">API ID:</td>
			<td class="inputValue"><input type="text" value="<?php if(isset($_POST['apiId'])) { echo $_POST['apiId'];} else { echo $apiId; } ?>" cols="100" name="apiId"></td>
		</tr>
		<tr>
			<td class="inputLabel">API Key:</td>
			<td class="inputValue"><input type="text" value="<?php if(isset($_POST['apiKey'])) { echo $_POST['apiKey'];} else { echo $apiKey; } ?>" cols="100" name="apiKey"></td>
		</tr>
		<tr>
			<td class="inputLabel">API Ref:</td>
			<td class="inputValue"><input type="text" value="<?php if(isset($_POST['apiRef'])) { echo $_POST['apiRef'];} else { echo $apiRef; } ?>" cols="100" name="apiRef"></td>
		</tr>
		<tr>
			<td class="inputLabel">URL to submit to:</td>
			<td class="inputValue"><input type="text" value="<?php if(isset($urlPostXML)) { echo $urlPostXML;} else { echo ""; } ?>" cols="100" size="120" ></td>
		</tr>
	</table>


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


	<h3>CUSTOMER</h3>
	<table>
		<tr>
			<th>PERSONAL</th>
			<th></th>
		</tr>
		<tr>
			<td class="inputLabel">REQUESTEDAMOUNT</td>
			<td class="inputValue"><input type=text name="REQUESTEDAMOUNT"></td>
		</tr>
		<tr>
			<td class="inputLabel">SSN</td>
			<td class="inputValue"><input type=text name="SSN"></td>
		</tr>
		<tr>
			<td class="inputLabel">DOB</td>
			<td class="inputValue"><input type=text name="DOB"></td>
		</tr>
		<tr>
			<td class="inputLabel">GENDER</td>
			<td class="inputValue"><input type=text name="GENDER"></td>
		</tr>
		<tr>
			<td class="inputLabel">FIRSTNAME</td>
			<td class="inputValue"><input type=text name="FIRSTNAME"></td>
		</tr>
		<tr>
			<td class="inputLabel">MIDDLEINITIAL</td>
			<td class="inputValue"><input type=text name="MIDDLEINITIAL"></td>
		</tr>
		<tr>
			<td class="inputLabel">LASTNAME</td>
			<td class="inputValue"><input type=text name="LASTNAME"></td>
		</tr>
		<tr>
			<td class="inputLabel">ADDRESS</td>
			<td class="inputValue"><input type=text name="ADDRESS"></td>
		</tr>
		<tr>
			<td class="inputLabel">ADDRESS2</td>
			<td class="inputValue"><input type=text name="ADDRESS2"></td>
		</tr>
		<tr>
			<td class="inputLabel">CITY</td>
			<td class="inputValue"><input type=text name="CITY"></td>
		</tr>
		<tr>
			<td class="inputLabel">STATE</td>
			<td class="inputValue"><input type=text name="STATE"></td>
		</tr>
		<tr>
			<td class="inputLabel">ZIP</td>
			<td class="inputValue"><input type=text name="ZIP"></td>
		</tr>
		<tr>
			<td class="inputLabel">HOMEPHONE</td>
			<td class="inputValue"><input type=text name="HOMEPHONE"></td>
		</tr>
		<tr>
			<td class="inputLabel">OTHERPHONE</td>
			<td class="inputValue"><input type=text name="OTHERPHONE"></td>
		</tr>
		<tr>
			<td class="inputLabel">DLSTATE</td>
			<td class="inputValue"><input type=text name="DLSTATE"></td>
		</tr>
		<tr>
			<td class="inputLabel">DLNUMBER</td>
			<td class="inputValue"><input type=text name="DLNUMBER"></td>
		</tr>
		<tr>
			<td class="inputLabel">CONTACTTIME</td>
			<td class="inputValue"><input type=text name="CONTACTTIME"></td>
		</tr>
		<tr>
			<td class="inputLabel">LENGTHATRESIDENCE</td>
			<td class="inputValue"><input type=text name="LENGTHATRESIDENCE"></td>
		</tr>
		<tr>
			<td class="inputLabel">RENTOROWN</td>
			<td class="inputValue"><input type=text name="RENTOROWN"></td>
		</tr>
		<tr>
			<td class="inputLabel">ISMILITARY</td>
			<td class="inputValue"><input type="radio" name="ISMILITARY"
				value="yes">Yes<br> <input type="radio" name="ISMILITARY" value="no"
				default>No</td>
		</tr>
		<tr>
			<td class="inputLabel">ISCITIZEN</td>
			<td class="inputValue"><input type="radio" name="ISCITIZEN"
				value="yes">Yes<br> <input type="radio" name="ISCITIZEN" value="no"
				default>No</td>
		</tr>
		<tr>
			<td class="inputLabel">OTHEROFFERS</td>
			<td class="inputValue"><input type="radio" name="OTHEROFFERS"
				value="yes">Yes<br> <input type="radio" name="OTHEROFFERS"
				value="no" default>No</td>
		</tr>
		<tr>
			<td class="inputLabel">EMAIL</td>
			<td class="inputValue"><input type=text name="EMAIL"></td>
		</tr>
		<tr>
			<td class="inputLabel">BANKRUPTCY</td>
			<td class="inputValue"><input type="radio" name="BANKRUPTCY"
				value="yes">Yes<br> <input type="radio" name="BANKRUPTCY" value="no">No
			</td>
		</tr>
	</table>


	<table>
		<tr>
			<th>EMPLOYMENT</th>
			<th></th>
		</tr>
		<tr>
			<td class="inputLabel">INCOMETYPE</td>
			<td class="inputValue"><input type=text name="INCOMETYPE"></td>
		</tr>
		<tr>
			<td class="inputLabel">PAYTYPE</td>
			<td class="inputValue"><input type=text name="PAYTYPE"></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPMONTHS</td>
			<td class="inputValue"><input type=text name="EMPMONTHS"></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPYEARS</td>
			<td class="inputValue"><input type=text name="EMPYEARS"></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPNAME</td>
			<td class="inputValue"><input type=text name="EMPNAME"></td>
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
			<td class="inputValue"><input type=text name="EMPPHONE"></td>
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
			<td class="inputValue"><input type=text name="HIREDATE"></td>
		</tr>
		<tr>
			<td class="inputLabel">EMPTYPE</td>
			<td class="inputValue"><input type=text name="EMPTYPE"></td>
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
			<td class="inputValue"><input type=text name="PAYFREQUENCY"></td>
		</tr>
		<tr>
			<td class="inputLabel">NETMONTHLY</td>
			<td class="inputValue"><input type=text name="NETMONTHLY"></td>
		</tr>
		<tr>
			<td class="inputLabel">GROSSMONTHLY</td>
			<td class="inputValue"><input type=text name="GROSSMONTHLY"></td>
		</tr>
		<tr>
			<td class="inputLabel">LASTPAYDATE</td>
			<td class="inputValue"><input type=text name="LASTPAYDATE"></td>
		</tr>
		<tr>
			<td class="inputLabel">NEXTPAYDATE</td>
			<td class="inputValue"><input type=text name="NEXTPAYDATE"></td>
		</tr>
		<tr>
			<td class="inputLabel">SECONDPAYDATE</td>
			<td class="inputValue"><input type=text name="SECONDPAYDATE"></td>
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
			<td class="inputValue"><input type=text name="BANKNAME"></td>
		</tr>
		<td class="inputLabel">BANKPHONE</td>
		<td class="inputValue"><input type=text name="BANKPHONE"></td>
		</tr>
		<tr>
			<td class="inputLabel">ACCOUNTTYPE</td>
			<td class="inputValue">
			<input type="radio" name="ACCOUNTTYPE" value="Checking">Checking<br> 
			<input type="radio" name="ACCOUNTTYPE" value="Savings">Savings</td>
		</tr>
		<td class="inputLabel">ROUTINGNUMBER</td>
		<td class="inputValue"><input type=text name="ROUTINGNUMBER"></td>
		</tr>
		<tr>
			<td class="inputLabel">ACCOUNTNUMBER</td>
			<td class="inputValue"><input type=text name="ACCOUNTNUMBER"></td>
		</tr>
		<td class="inputLabel">LENGTHBANKING (months)</td>
		<td class="inputValue"><input type=text name="LENGTHBANKING"></td>
		</tr>
		<tr>
			<td class="inputLabel">OUTSTANDINGAMT</td>
			<td class="inputValue"><input type=text name="OUTSTANDINGAMT"></td>
		</tr>
		<td class="inputLabel">ACTIVECHECKING</td>
		<td class="inputValue">
			<input type="radio" name="ACTIVECHECKING" value="yes">Yes<br>
			<input type="radio" name="ACTIVECHECKING" value="no">No
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
			<td class="inputValue"><input type=text name="FIRSTNAME"></td>
		</tr>
		<tr>
			<td class="inputLabel">LASTNAME</td>
			<td class="inputValue"><input type=text name="LASTNAME"></td>
		</tr>
		<td class="inputLabel">PHONE</td>
		<td class="inputValue"><input type=text name="PHONE"></td>
		</tr>
		<tr>
			<td class="inputLabel">RELATIONSHIP</td>
			<td class="inputValue"><input type=text name="RELATIONSHIP"></td>
		</tr>
		<tr>
			<td class="inputLabel">FIRSTNAME</td>
			<td class="inputValue"><input type=text name="FIRSTNAME"></td>
		</tr>
		<tr>
			<td class="inputLabel">LASTNAME</td>
			<td class="inputValue"><input type=text name="LASTNAME"></td>
		</tr>
		<td class="inputLabel">PHONE</td>
		<td class="inputValue"><input type=text name="PHONE"></td>
		</tr>
		<tr>
			<td class="inputLabel">RELATIONSHIP</td>
			<td class="inputValue"><input type=text name="RELATIONSHIP"></td>
		</tr>
		<tr>
			<td class="inputLabel">FIRSTNAME</td>
			<td class="inputValue"><input type=text name="FIRSTNAME"></td>
		</tr>
		<tr>
			<td class="inputLabel">LASTNAME</td>
			<td class="inputValue"><input type=text name="LASTNAME"></td>
		</tr>
		<td class="inputLabel">PHONE</td>
		<td class="inputValue"><input type=text name="PHONE"></td>
		</tr>
		<tr>
			<td class="inputLabel">RELATIONSHIP</td>
			<td class="inputValue"><input type=text name="RELATIONSHIP"></td>
		</tr>
	</table>