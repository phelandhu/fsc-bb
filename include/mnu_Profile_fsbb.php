<div class="box">
	<?php
	    include('include/ctrl_CRUD_Profile.php');
	    $result = $member->getAll();
	    
	    if($result->num_rows) {
	    	print_r("<select name=\"leadprovider\" size=\"6\" style=\"width:165px\"  ONCHANGE=\"location = this.options[this.selectedIndex].value;\">");
	    
	    	while($row = $result->fetch_array()) {
	    		print_r("<option value=\"index.bbx?page=Profile&Profiles=".$row["id"]."\">".$row["username"]."</option>");
	    	}
	    	//print_r($row);
	    
	    	print_r("<select>");
	    
	    } else {
	    }
    ?>
</div>