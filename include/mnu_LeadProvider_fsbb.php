<div class="box">
<?php
require_once('bootstrap.php');
require_once("common/classes/leadProvider.class.php");
$leadProvider = new LeadProvider($dbDataArr);

$result = $leadProvider->getAll();

if($result) {
	print("<select name=\"leadprovider\" size=\"6\" style=\"width:165px\"  ONCHANGE=\"location = this.options[this.selectedIndex].value;\">");

	while($row = $result->fetch_array()) {
		print_r($row);
		printf("<option value=\"index.bbx?page=LeadProvider&leadProvider=%s&id=%s\">%s</option>", $row["CompanyName"], $row["LeadProviderID"], $row["CompanyName"]);
		
	}
	
	print("<select>");
}else {
}
?>


</div>