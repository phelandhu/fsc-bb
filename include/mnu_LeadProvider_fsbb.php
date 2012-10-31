<div class="box">
<?php
include('common/include/db_login.php');
$table = 'leadProvider'; // Members name

$result = $mysqli->query("SELECT * FROM " . $table);

if($result) {
	print("<select name=\"leadprovider\" size=\"6\" style=\"width:165px\"  ONCHANGE=\"location = this.options[this.selectedIndex].value;\">");

	while($row = $result->fetch_array()) {
		print_r($row);
		printf("<option value=\"index.bbx?page=LeadProvider&leadProvider=%s&id=%s\">%s</option>", $row["companyName"], $row["id"], $row["companyName"]);
		
	}
	
	print("<select>");
}else {
}
?>


</div>