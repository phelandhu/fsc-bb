<?php
$host       =   'localhost'; // Host name Normally 'LocalHost'
$user       =   'root'; // MySQL login username
$pass       =   'Keyb0ard!'; // MySQL login password
$database   =   'BlackBox'; // Database name
$table      =   'rules'; // Members name
$row        =   "";

mysql_connect($host, $user, $pass);
mysql_select_db($database);
?>

<div>
    
<div style="color:#FF8C19;font-size: 2em">
 Rules Management
</div>
    
<div style="color:#555;font-size: 1em;padding: 10px; ">
    
<div id="rules">

<p>

<form name="editrule">

Rule Set Title:<input type="text" size="32" name="RuleSetTitle" id="RuleSetTitle"/>
<select id="RulesManagementSetListing" name="RulesManagementSetListing" ONCHANGE="selectrule();">
<option value='".$rows["rulesID"]."'>-- Select Rule Set --</option>");
    
 <?php
 $sql = "SELECT * FROM `member` WHERE `username`= '".$_SESSION['username']."';";
 $results_member = mysql_query($sql);
 
 
mysql_connect($host, $user, $pass);
mysql_select_db($database);

 $row = mysql_fetch_array($results_member);
 $memberid = $row['id'];
 
 
 $sql = "SELECT DISTINCT `Title` FROM `RulesManagementSet` WHERE `memberID`= '".$memberid."';";
 $result_rules = mysql_query($sql);
 //echo $sql;
 while($rows = mysql_fetch_array($result_rules))
 {
     echo("<option value='".$rows["rulesID"]."'>".$rows["Title"]."</option>");
 }
 ?>
</select>Make Default <input type="checkbox" id="defaultrule" name="defaultrule" />
    </p>
    
 <table id="ruleslist" CELLSPACING=5  style="height:20px;padding: 3px; width:630px">
  <tr> <td>Active</td> 	<td></td> <td>Rule Title</td>  </tr>
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
     print_r("<tr> <td>".$rulenumber."</td><td><input type=\"checkbox\" name=\"rulesID[".$rows["rulesID"]."]\" id=\"rulesID[".$rows["rulesID"]."]\"  /></td> 	<td></td> <td>".$rows["Title"]."</td>  </tr>");
 }
 ?>
</table>


</div>
    

<input type="hidden" name="form" id="form" value="rulesmanagement" />

</form>

</div>

</div>
</div>

