<?php
include("common/include/db_login.php");
$table = 'leadProvider'; // Members name
$row ="";
mysql_connect($host, $user, $pass);
mysql_select_db($database);
if(isset($_GET["leadProvider"]))
{
	$leadProvider = $mysqli->real_escape_string($_GET['leadProvider']);
	$query = sprintf("SELECT * FROM %s WHERE companyName = '%s' AND id = %s", $table, $leadProvider, $_GET['id']);
	$result = $mysqli->query($query);
	if($result) {
		$row = $result->fetch_array() ;
		print_r($row);
	} else {
	}
/*
	$sql = "UPDATE `BlackBox`.`member` SET `LeadProviderID_Default` = '".$row["LeadProviderID"]."' WHERE `member`.`username` = '".$_SESSION["username"]."';";
	mysql_query($sql);
	*/
} else {
/*
	echo "Your Test";
	$LeadProvider = mysql_real_escape_string($_GET['LeadProvider']);
	$result = mysql_query("SELECT LeadProviderID_Default FROM member WHERE username = '".$_SESSION["username"]."'");
	$row = mysql_fetch_array($result) ;
	$result2 = mysql_query("SELECT * FROM $table WHERE 	LeadProviderID = '".$row['LeadProviderID_Default']."'");
	if(mysql_num_rows($result2))
	{
		$row = mysql_fetch_array($result2) ;
		//print_r($row);
	}else
	{
	}
	*/
}
?>

<div id="pageContainer" >
    <div style="color:#FF8C19;font-size: 2em">
        Lead Providers 
    </div>
    <div style="color:#555;font-size: 1em">
    </div>

    <div>
        <table CELLSPACING=5 style="padding: 10px; width:690px">
            <tr>
                <td>Company Name of Lead Provider</td>
                <td>Main Company Phone Number</td>
            </tr>
            <tr>
                <td>
                    <input intermediateChanges="true"  type="text" name="LeadProvider" value="<?php if(isset($row["technicalPocName"])) { echo $row["companyName"]; } ?>" required="true" data-dojo-type="dijit.form.ValidationTextBox"  data-dojo-props="trim:true, propercase:true" id="LeadProvider"/>
                </td>
                <td> 
                    <input type="hidden" name="phone" id="phone" value="<?php if(isset($row["TechnicalPOCName"])) { echo $row["id"]; } ?>"  />
                    <label for="phone">Phone number, no spaces:</label>
                    <input type="text" name="phone" id="phone" value="<?php if(isset($row["TechnicalPOCName"])) { echo $row["primaryPhoneNumber"]; } ?>" required="true"
                    data-dojo-type="dijit.form.ValidationTextBox"
                    data-dojo-props="regExp:'[\\d{10}][\\dw]+', invalidMessage:'Invalid Non-Space Text.'" />
                </td>
            </tr>
            <tr>
                <td>Technical POC Name</td><td>Technical POC Email Address</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="TechnicalPOCName" value="<?php if(isset($row["TechnicalPOCName"])) { print_r($row["TechnicalPOCName"]); } ?>" required="true" data-dojo-type="dijit.form.ValidationTextBox"  data-dojo-props="trim:true, propercase:true" id="TechnicalPOCName"/></td><td>             
                    <input id="TechnicalPOCEmailAddress" size="40" name="TechnicalPOCEmailAddress"
                    data-dojo-type="dijit.form.ValidationTextBox"
                    data-dojo-props="validator:dojox.validate.isEmailAddress,
                    invalidMessage:'This is not a valid email!'" value="<?php if(isset($row["TechnicalPOCName"])) { print_r($row["TechnicalPOCEmailAddress"]); } ?>"/>
                </td>
            </tr>
            <tr>
                <td>Sales POC Name</td>
                <td>(check box if same as technical)</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="SalesPOCName" value="<?php if(isset($row["TechnicalPOCName"])) { print_r($row["SalesPOCName"]); } ?>" required="true" data-dojo-type="dijit.form.ValidationTextBox"  data-dojo-props="trim:true, propercase:true" id="SalesPOCName"/>
                </td>
                <td><input type="checkbox" onClick="Get_TechnicalPOCName();"/></td>
            </tr>
            <tr>
                <td>Sales POC Email Address</td>
                <td>(check box if same as technical)</td>
            </tr>
            <tr>
                <td>
                    <input id="SalesPOCemail" name="SalesPOCemail"
                    data-dojo-type="dijit.form.ValidationTextBox"
                    data-dojo-props="validator:dojox.validate.isEmailAddress,
                    invalidMessage:'This is not a valid email!'" value="<?php if(isset($row["TechnicalPOCName"])) { print_r($row["SalesPOCEmailAddress"]); } ?>" />
                </td>
                <td><input type="checkbox" onClick="Get_TechnicalPOCEmailAddress();"/></td>
            </tr>
            <tr>
                <td>Integration Date</td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <label for="IntegrationDate">Drop down Date box:</label>
                    <input type="text" name="IntegrationDate" id="IntegrationDate" value="<?php if(isset($row["TechnicalPOCName"])) { print_r($row["IntegrationDate"]); } ?>"       dojoType="dijit.form.DateTextBox" required="true" />
                </td>
            </tr>
            <tr>
                <td>API Field 1 </td>
                <td>API Field 2</td>
            </tr>
            <tr>
                <td>(username or Auth Variable) </td>
                <td>(password or send Key)</td>
            </tr>
            <tr>
                <td><input type="text" size="40" id="APIField1" name="APIField1" value="<?php if(isset($row["TechnicalPOCName"])) { print_r($row["APIField1"]); } ?>"/></td>
                <td><input type="text" size="40" id="APIField2" name="APIField2" value="<?php if(isset($row["TechnicalPOCName"])) { print_r($row["APIField2"]); } ?>"/></td>
            </tr>
            <tr>
                <td colspan="2">Sending URL or IP address to post to us (if we can use it)</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">
                    URL:// <input id="SendingURL" name="SendingURL" data-dojo-type="dijit.form.ValidationTextBox"
                    data-dojo-props="validator:dojox.validate.isUrl,invalidMessage:'This is not a valid url!'" value="<?php if(isset($row["TechnicalPOCName"])) { print_r($row["SendingURL"]); } ?>"/>
                </td>
                <td></td>
            </tr>
        </table>
	</div>
</div>
<script>
</script>
