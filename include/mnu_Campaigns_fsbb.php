<div class="box">
<?php
	include('include/ctrl_CRUD.php');
	$result = $campaign->getAll();
	
	if($result->num_rows) {
		print("<select name=\"leadprovider\" size=\"6\" style=\"width:165px\"  ONCHANGE=\"location = this.options[this.selectedIndex].value;\">");
	
		while($row = $result->fetch_array()) {
			print("<option value=\"index.bbx?page=Campaigns&Campaigns=".$row["CampaingnID"]."\">".$row["Name"]."</option>");
		}	
		print("<select>");
	
	} else {
	}
?>
</div>