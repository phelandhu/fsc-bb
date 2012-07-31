<?php
session_start();

include("include/db_login.php");
include("include/inc.countryCurrency.php");
$table = 'Campaigns'; // Members name
$row ="";
mysql_connect($host, $user, $pass);
mysql_select_db($database);
$result = mysql_query("SELECT LeadProviderID_Default FROM member WHERE username = '" . $_SESSION["username"] . "'");
$leadprov = mysql_fetch_array($result);

$sql = "SELECT * FROM  `LeadProvider` WHERE `LeadProviderID` = '" . $leadprov["LeadProviderID_Default"]."';";
$sqlLeadProvider = "SELECT * FROM  `LeadProvider`;";
echo $sqlLeadProvider;
$resultLeadProvider = mysql_query($sqlLeadProvider);
$leadprovName = mysql_fetch_array($leadprovNameResult);
if(isset($_GET["Campaigns"]))
{
	$Campaigns = mysql_real_escape_string($_GET['Campaigns']);
	$resultcamp = mysql_query("SELECT * FROM $table WHERE Name = '$Campaigns'");
	if(mysql_num_rows($resultcamp ))
	{
		$row = mysql_fetch_array($resultcamp ) ;
		$_SESSION["CampaignName"] = $row["Name"];
	}else
	{
	}
	/****\
	mysql_connect($host, $user, $pass);
	mysql_select_db($database);
	$sql = "UPDATE `BlackBox`.`member` SET `LeadProviderID_Default` = '".$row["LeadProviderID"]."' WHERE `member`.`username` = '".$_SESSION["username"]."';";
	mysql_query($sql);
	\*****/
} else {
}
?>
<div> 
    <div style="color:#359ed5;font-size: 2em">
     Campaigns
    </div>
        
    <div style="color:#359ed5;font-size: 1em">
    </div>
    <div>
        <table CELLSPACING=5 style="padding: 10px; width:690px">
            <tr>
                <td> 
                    <table >
                        <tr> 
                            <td>
                                <?php
                                    if($row["Active"] == 1)
                                    {
                                        echo("Active <input type=\"checkbox\" name=\"active\" id=\"active\" value=\"1\" checked=\"checked\"/>");
                                    } else{
                                        echo("Active <input type=\"checkbox\" name=\"active\" id=\"active\" value=\"0\" />");
                                    }                      
                                ?>
                            </td>
                            <td>
                                <?php
                                    if($row["Active"] == 0)
                                    {
                                        // echo("Inactive <input type=\"radio\" name=\"Action_portfolio\" id=\"active\" value=\"0\" checked=\"checked\"/>");
                                    } else{
                                        // echo("Inactive <input type=\"radio\" name=\"Action_portfolio\" id=\"active\" value=\"0\" />");
                                    }                      
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td> </td>
            </tr>
            <tr> </tr>
            <tr>
            	<td>Campaign Name</td>
                <td>Default Lead Provider</td>
            </tr>
                <tr>
                <td>                    
                	<input  type="text"  name="CampaignName" value="<?php echo $_SESSION["CampaignName"] ?>" required="true" data-dojo-type="dijit.form.ValidationTextBox"  data-dojo-props="trim:true, propercase:true" id="CampaignName"/>
                </td>
                <td>
                    <select id="leadProvider">
						<?php
							while($resultRow = mysql_fetch_array($resultLeadProvider)) {
								if($leadprov["LeadProviderID_Default"] == $resultRow["LeadProviderID"]) {
									echo "<option selected=\"selected\" value=\"" . $resultRow["LeadProviderID"] . "\">" . $resultRow["CompanyName"] . "</option><br />";
								} else {
									echo "<option value=\"" . $resultRow["LeadProviderID"] . "\">" . $resultRow["CompanyName"] . "</option><br />";
								}
							}
                        ?>    
                    </select>
                    
<?php
// stuff I need out of the way but nto gone.
/*
                	<input type="text" disabled="disabled" id="DefaultLeadProviderName" name="DefaultLeadProviderName" value="<?php echo $leadprovName["CompanyName"] ?>" />
                	<input type="hidden" id="DefaultLeadProvider" name="DefaultLeadProvider" value="<?php echo $leadprov["LeadProviderID_Default"] ?>" /> 
*/
?>
                </td>
            </tr>
            <tr>
            	<td>Purchase Price</td><td>Start Date </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="PurchasePrice" id="PurchasePrice" value="<?php echo $row["PurchasePrice"] ?>" required="true"
                    data-dojo-type="dijit.form.ValidationTextBox"
                    data-dojo-props="regExp:'[\\d{10}][\\dw]+', invalidMessage:'Integer Amounts only'" />
                </td>
                <td>
                    <input type="text" name="IntegrationDate" id="IntegrationDate" value="<?php echo $row["StartDate"] ?>"       dojoType="dijit.form.DateTextBox" required="true" />
                </td>
            </tr>
            <tr>
            	<td>Currency</td><td></td>
            </tr>
            <tr>
                <td>
                    <select id="Currency">
						<?php
							$i = 0;
							foreach ($countryCurrency as $currencyLabel) {
								if($i == 0) {
									echo "<option selected=\"selected\" value=\"" . $currencyLabel . "\">" . $currencyLabel . "</option><br />";
									$i++;
								} else {
									echo "<option>" . $currencyLabel . "</option><br />";
								}
							}
                        ?>    
                    </select>
                </td>
                <td><input type="hidden" name="form" id="form" value="Campaigns"/></td>
            </tr>
        </table>
    </div>
</div>
