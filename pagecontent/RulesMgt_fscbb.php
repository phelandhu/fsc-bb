<?php
	include("common/include/db_login.php");
	$table      =   'rules'; // Members name
	$row        =   "";
	mysql_connect($host, $user, $pass);
	mysql_select_db($database);
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
                
                <option value="">-- Select Rule Set --</option>");
                <?php
					$sql = "SELECT DISTINCT Title FROM RulesManagementSet RMS, member m WHERE RMS.memberID = m.ID AND username = '" . $_SESSION['username'] . "'";
					$result_rules = mysql_query($sql);
					//echo $sql;
					while($rows = mysql_fetch_array($result_rules))
					{
						echo("<option value='" . $rows["rulesID"] . "'>".$rows["Title"]."</option>");
						
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
							$sql = "SELECT * FROM `rules`";
							$result_rules = mysql_query($sql);
							//echo $sql;
							$rulenumber = 0;
							while($rows = mysql_fetch_array($result_rules))
							{
								$rulenumber = $rulenumber+1;
								print_r("
								<tr> 
									<td>" . $rulenumber . "</td>
									<td><input type=\"checkbox\" class=\"selsts\" name=\"selsts\"  id=\"" . $rows["rulesID"] . "\"  /></td> 	
									<td></td> 
									<td>".$rows["Title"]."</td>  
								</tr>");
							}
							/*
							name=\"rulesID[" . $rows["rulesID"] . "]\"
							*/
                        ?>
                    </table>
                </div>
                <input type="hidden" name="form" id="form" value="rulesmanagement" />
            </form>
        </div>
    </div>
</div>

