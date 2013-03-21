<?php
	require_once("bootstrap.php");
	require_once("common/classes/rules.class.php");
	require_once("common/classes/rulesManagementSet.class.php");
	$rules = new Rules($dbDataArr);
	$rulesManagementSet = new RulesManagementSet($dbDataArr);
	$resultRules = $rules->getAll();
	$resultRms = $rulesManagementSet->getAllNamesByMemberId($_SESSION["memberId"]);
//        $log->trace(print_r($result_rms, true));
	$strRowList = "";
	$strRowJS = "";
	$arrRowList = array();
	while($row = $resultRules->fetch_array())
	{
		$strRowList .= "<li value=\"" . $row["rulesID"] . "\" title=\"" . $row["rulesID"] . "\" id=\"Rule_" . $row["rulesID"] . "\">" . $row["ruleShortName"] . "</li>\n";
		$strRowJS .= "<li value=\\\"" . $row["rulesID"] . "\\\" title=\\\"" . $row["rulesID"] . "\\\" id=\\\"Rule_" . $row["rulesID"] . "\\\">" . $row["ruleShortName"] . "</li>";
		$arrRowList[] = '<li value="' . $row["rulesID"] . '" title="' . $row["rulesID"] . '" id="Rule_' . $row["rulesID"] . '">' . $row["ruleShortName"] . '</li>';
	}
//	$strRowJS = "My major Test";
?>
<script language="JavaScript" type="text/javascript" src="/common/js/coordinates.js"></script>
<script language="JavaScript" type="text/javascript" src="/common/js/drag.js"></script>
<script language="JavaScript" type="text/javascript" src="/common/js/dragdrop.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>

function selectrule()
{
	var selectedvalue = document.getElementById("RulesManagementSetListing");
	var userId = '1';
	document.getElementById("RuleSetTitle").value = selectedvalue.options[selectedvalue.selectedIndex].text;
	var rulesId = selectedvalue.options[selectedvalue.selectedIndex].value;
	document.getElementById("rulesManagementSetId").value = rulesId;
	// update the 'available' list
	populateRulesList();
	if(rulesId > 0) {
		$.ajax({ url: '/ajax.php',
			data: {method: 'getRulesList',
			userId: userId,
			rulesId : rulesId},
			type: 'post',
			success: function(output) {
//				alert(output);
				var strArray = output.split(",");
				var cnt = strArray.length; 
				for (var i = 0; i < cnt; i++) {
					myRule(strArray[i]);
				}
			}
		});
	}
}

function populateRulesList() {
	$('#available').empty();
	var rulesList = "<?php echo $strRowJS; ?>";
	var rulesListArr = <?php echo json_encode($arrRowList); ?>
//	$('#available').append(rulesList);
	$('#available').append(rulesListArr.join(''));
	// clear the 'selected' list
	$('#active').empty();
}

function clearActiveList() {
	$('#active').empty();
}

function myRule(ruleId)
{
	var text = $('#Rule_' + ruleId).text(); 
 	$('#active').append("<li value=\"" + ruleId + "\" title=\"" + ruleId + "\" id=\"Rule_" + ruleId + "\">" + text + "</li>");
	$('#Rule_' + ruleId).remove();
}


function moveToActive() {
	
}

function moveToAvailable() {
	/*
onDragEnd : function(nwPosition, sePosition, nwOffset, seOffset) {
	// if the drag ends and we're still outside all containers
	// it's time to remove ourselves from the document
	if (this.isOutside) {
		var tempParent = this.parentNode;
		this.parentNode.removeChild( this );
		tempParent.parentNode.removeChild( tempParent );
		return;
	}
	this.parentNode.onDragOut();
	this.style["top"] = "0px";
	this.style["left"] = "0px";
}	
*/
}


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
<script language="JavaScript" type="text/javascript"><!--
        window.onload = function() {
                var list = document.getElementById("available");
                DragDrop.makeListContainer( list );
                list.onDragOver = function() { this.style["background"] = "#EEF"; };
                list.onDragOut = function() { this.style["background"] = "none"; };

                list = document.getElementById("active");
                DragDrop.makeListContainer( list );
                list.onDragOver = function() { this.style["border"] = "1px dashed #AAA"; };
                list.onDragOut = function() { this.style["border"] = "1px solid white"; };
                
        };

        //-->
</script>
    <div>
    <div style="color:#FF8C19;font-size: 2em">
        Rules Management
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
                </select>
                Make Default <input type="checkbox" id="defaultrule" name="defaultrule" />
                </p>

                <div  id="rulesmanager" name="rulesmanager" >
					<div id="dnd" name="dnd">
						<div id="availableHeader">Available</div>
						<div id="activeHeader">Active</div>
						<ul id="available" class="sortable boxy" style="margin-left: 1em;">
							<?php echo $strRowList; ?>
						</ul>
						<ul id="active" class="sortable boxier" style="margin-right: 1em;">
						Active Rules List
						</ul>
					</div>
                </div>
                <input type="hidden" name="RuleSetId" id="rulesManagementSetId" />
                <input type="hidden" name="form" id="form" value="rulesmanagement" />
            </form>
        </div>
    </div>
</div>
