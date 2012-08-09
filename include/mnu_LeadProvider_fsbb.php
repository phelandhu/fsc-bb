<div class="box">
<?php
include('common/include/db_login.php');

$table = 'LeadProvider'; // Members name
 $row ="";
mysql_connect($host, $user, $pass);
mysql_select_db($database);

$LeadProvider = mysql_real_escape_string($_GET['LeadProvider']);
//echo $LeadProvider . " Test of my worth";
$result = mysql_query("SELECT * FROM $table ");

if(mysql_num_rows($result)) {
	print_r("<select name=\"leadprovider\" size=\"6\" style=\"width:165px\"  ONCHANGE=\"location = this.options[this.selectedIndex].value;\">");

	while($row = mysql_fetch_array($result)) {
		print_r("<option value=\"index.bbx?page=LeadProvider&LeadProvider=".$row["CompanyName"]."\">".$row["CompanyName"]."</option>");
	}
	//print_r($row);
	print_r("<select>");
}else {
}
?>


</div>