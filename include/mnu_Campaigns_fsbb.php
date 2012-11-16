<div class="box">
<?php
	include('bootstrap.php');
	include('include/ctrl_CRUD.php');
	require_once("common/classes/campaign.class.php");
	
	$campaign = new Campaign($dbDataArr);
	$result = $campaign->getAll();
	
	if($result->num_rows) {
		print_r("<select name=\"leadprovider\" size=\"6\" style=\"width:165px\"  ONCHANGE=\"location = this.options[this.selectedIndex].value;\">");
	
		while($row = $result->fetch_array()) {
			print_r("<option value=\"index.bbx?page=Campaigns&Campaigns=".$row["CampaingnID"]."\">".$row["Name"]."</option>");
		}	
		//print_r($row);
	
		print_r("<select>");
	
	} else {
	}
?>
</div>