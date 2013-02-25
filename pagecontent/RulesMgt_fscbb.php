<?php
	require_once("bootstrap.php");
	require_once("common/classes/rules.class.php");
	require_once("common/classes/rulesManagementSet.class.php");
	$rules = new Rules($dbDataArr);
	$rulesManagementSet = new RulesManagementSet($dbDataArr);

	$resultRules = $rules->getAll();
	$resultRms = $rulesManagementSet->getAllNamesByMemberId($_SESSION["memberId"]);
	$log->trace(print_r($result_rms, true));
?>
<script>

</script>
<style type="text/css">
#available {
	position: absolute;
	left: 10px;
	top: 20px;
}

#active {
	position: absolute;
	right: 10px;
	top: 20px;
	border: 1px solid white;
}

#availableHeader {
	position: absolute;
	left: 50px;
	top: 0px;
}

#activeHeader {
	position: absolute;
	right: 60px;
	top: 0px;
}

#dnd {
	position: relative;
}
</style>

<link rel="stylesheet" href="/common/css/lists.css" type="text/css"/>
<script language="JavaScript" type="text/javascript" src="/common/js/coordinates.js"></script>
<script language="JavaScript" type="text/javascript" src="/common/js/drag.js"></script>
<script language="JavaScript" type="text/javascript" src="/common/js/dragdrop.js"></script>
<script language="JavaScript" type="text/javascript"><!--
	window.onload = function() {
		var list = document.getElementById("available");
		DragDrop.makeListContainer( list );
		list.onDragOver = function() { this.style["background"] = "#EEF"; };
		list.onDragOut = function() {this.style["background"] = "none"; };
		
		list = document.getElementById("active");
		DragDrop.makeListContainer( list );
		list.onDragOver = function() { this.style["border"] = "1px dashed #AAA"; };
		list.onDragOut = function() {this.style["border"] = "1px solid white"; };
	};
	
	//-->
</script>
    <div>
    <div style="color:#FF8C19;font-size: 2em">
    	Rules Management<a href="#" onclick="test();">#</a>
    </div>
    <div style="color:#555;font-size: 1em;padding: 10px; ">
        <div id="rules">
            <p>
            <form name="editrule" id="editrule">
                Rule Set Title:<input type="text" size="32" name="RuleSetTitle" id="RuleSetTitle"/>
                <select id="RulesManagementSetListing" name="RulesManagementSetListing" ONCHANGE="selectrule();">
                <option value="">-- Select Rule Set --</option>
                <?php
					while($row = $resultRms->fetch_array())
					{
						printf("<option value=\"%s\">%s</option>", $row["RulesManagementSetID"], $row["Title"]);						
					}
                ?>
                </select>Make Default <input type="checkbox" id="defaultrule" name="defaultrule" />
                </p>
                
                <div  id="rulesmanager" name="rulesmanager" >
	                <div id="dnd" name="dnd">
	                	<div id="availableHeader">Available</div>
	                	<div id="activeHeader">Active</div>
						<ul id="available" class="sortable boxy" style="margin-left: 1em;">
							<?php
								$ruleNumber = 0;
								while($row = $resultRules->fetch_array())
								{
									$ruleNumber += 1;
									print_r("<li title=\"" . $row["rulesID"] . "\">" . $row["ruleShortName"] . "</li>");
								}
	                        ?>
						</ul>
						<ul id="active" class="sortable boxier" style="margin-right: 1em;">
							<li>One</li>
						</ul>
					</div>
                </div>
                <input type="hidden" name="RuleSetId" id="rulesManagementSetId" />
                <input type="hidden" name="form" id="form" value="rulesmanagement" />
            </form>
        </div>
    </div>
</div>

