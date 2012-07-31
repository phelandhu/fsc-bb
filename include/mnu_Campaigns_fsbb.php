<div class="box">
<?php
	include('include/db_login.php');
	include('include/ctrl_CRUD.php');
	
	
	$table = 'Campaigns'; // Members name
	$row ="";
	mysql_connect($host, $user, $pass);
	mysql_select_db($database);
	
	$LeadProvider = mysql_real_escape_string($_GET['Campaigns']);
	 
	$result = mysql_query("SELECT * FROM $table ");
	
	if(mysql_num_rows($result)) {
		print_r("<select name=\"leadprovider\" size=\"6\" style=\"width:165px\"  ONCHANGE=\"location = this.options[this.selectedIndex].value;\">");
	
		while($row = mysql_fetch_array($result)) {
			print_r("<option value=\"index.bbx?page=Campaigns&Campaigns=".$row["Name"]."\">".$row["Name"]."</option>");
		}	
		//print_r($row);
	
		print_r("<select>");
	
	} else {
	}
?>


</div>