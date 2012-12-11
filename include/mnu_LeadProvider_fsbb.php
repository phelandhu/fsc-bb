<div class="box">
<?php
require_once('bootstrap.php');
require_once("common/classes/leadProvider.class.php");
// new instance of the LeadProvider class
$leadProvider = new LeadProvider($dbDataArr);
// use the class to get all of the leadProviders
$result = $leadProvider->getAll();

if($result) { // so if I get results display them on the screen
	print("<select name=\"leadprovider\" size=\"6\" style=\"width:165px\"  ONCHANGE=\"location = this.options[this.selectedIndex].value;\">");

	while($row = $result->fetch_array()) { // so walk through the array
//		print_r($row);
		printf("<option value=\"index.bbx?page=LeadProvider&leadProvider=%s&id=%s\">%s</option>", $row["CompanyName"], $row["LeadProviderID"], $row["CompanyName"]);
		
	}
	
	print("<select>");
}else {
}
?>


</div>