<?php
	require_once("bootstrap.php");
	require_once("common/classes/rules.class.php");
	require_once("common/classes/rulesManagementSet.class.php");
	$rules = new Rules($dbDataArr);
	$rulesManagementSet = new RulesManagementSet($dbDataArr);
	/*
//include("common/include/db_login.php");
	$table      =   'rules'; // Members name
	$row        =   "";
	mysql_connect($host, $user, $pass);
	mysql_select_db($database);
	*/
	$result_rules = $rules->getAll();
	$result_rms = $rulesManagementSet->getAllNamesByMemberId($_SESSION["memberId"]);
	$log->trace(print_r($result_rms, true));
?>
<script>

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
					while($row = $result_rms->fetch_array())
					{
						printf("<option value=\"%s\">%s</option>", $row["RulesManagementSetID"], $row["Title"]);						
					}
					
                ?>
                
                </select>Make Default <input type="checkbox" id="defaultrule" name="defaultrule" />
                </p>
                <table id="ruleslistHeader" CELLSPACING=5  style="height:20px;padding: 3px; width:630px">
                	<tr>
						<td></td><td>Active</td><td></td><td>Rule Title</td>  
					</tr>
                </table>
                <div  id="rulesmanager" name="rulesmanager" > 
                    <table id="ruleslist" CELLSPACING=5  style="height:480px;padding: 10px; width:630px">                        
                        <?php
							$ruleNumber = 0;
							while($row = $result_rules->fetch_array())
							{
								$ruleNumber += 1;
								print_r("
								<tr> 
									<td>" . $rulenumber . "</td>
									<td><input type=\"checkbox\" class=\"selsts\" name=\"rulesID[" . $ruleNumber . "]\"  id=\"" . $row["rulesID"] . "\"  /></td> 	
									<td></td> 
									<td>".$row["Title"]."</td>  
								</tr>");
							}
							/*
							name=\"rulesID[" . $rows["rulesID"] . "]\"
							*/
                        ?>
                    </table>
                </div>
                <input type="hidden" name="RuleSetId" id="rulesManagementSetId" />
                <input type="hidden" name="form" id="form" value="rulesmanagement" />
            </form>
        </div>
    </div>
</div>

