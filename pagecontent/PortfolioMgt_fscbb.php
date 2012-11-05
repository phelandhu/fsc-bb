<?php
	include("bootstrap.php");
	include("common/classes/member.class.php");
	include("common/classes/rules.class.php");
	include("common/classes/rulesManagementSet.class.php");
	$member = new Member($dbDataArr);
	$rules = new Rules($dbDataArr);
	$rulesManagementSet = new RulesManagementSet($dbDataArr);
	$table      =   'rules'; // Members name
	$row        =   "";
	
	mysql_connect($host, $user, $pass);
	mysql_select_db($database);
?>


<div>
  <script  type="text/javascript">
    
    function reparsedojo()
    </script>
<div style="color:#FF8C19;font-size: 2em">
 Portfolio Management
</div>
    
<div style="color:#555;font-size: 1em">
</div>

    <p></p>
    <form name="editportfolio">
    <table name="portfoliomgt" CELLSPACING=10 style="padding: 10px; width:690px">
        
         <tr><td>&nbsp;Status:      Active<input type="radio" name="Action_portfolio" id="Activate"/> 
                 Inactive<input type="radio" name="Action_portfolio" id="Inactive"/> </td><td>     
           
</td><td></td></tr>
        
        <tr><td>Name:&nbsp;<input type="text" id="name" size="30"/> POST URL:&nbsp;<input type="text" size="30"/></td><td></td><td></td></tr>
        
        <tr><td>Portfolio Start Data</td><td></td><td> </td> </tr>
            <tr><td>    
                <table>
                    
                      <tr>
                      <td>SUN <input type="checkbox" name="portfoliostartdate_active" id="sunday"></td>
                      <td>MON <input type="checkbox" name="portfoliostartdate_active" id="monday"></td>
                      <td>TUE <input type="checkbox" name="portfoliostartdate_active" id="tuesday"></td>
                      <td>WED <input type="checkbox" name="portfoliostartdate_active" id="wednesday"></td>
                      <td>THU <input type="checkbox" name="portfoliostartdate_active" id="thursday"></td>
                      <td>FRI <input type="checkbox" name="portfoliostartdate_active" id="friday"></td>
                      <td>SAT <input type="checkbox" name="portfoliostartdate_active" id="saturday"></td>
                      </tr>
                      <tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                      <tr><td>QTY</td><td>QTY</td><td>QTY</td><td>QTY</td><td>QTY</td><td>QTY</td><td>QTY</td></tr>
                      <tr>
                         <td><input type="text" name="QTY_SUNDAY" id="QTY_SUNDAY"  size="3"/></td>
                         <td><input type="text" name="QTY_MONDAY" id="QTY_MONDAY"   size="3"/></td>
                         <td><input type="text" name="QTY_TUESDAY" id="QTY_TUESDAY"   size="3"/></td>
                         <td><input type="text" name="QTY_WEDNESDAY" id="QTY_WEDNESDAY"   size="3"/></td>
                         <td><input type="text" name="QTY_THURSDAY" id="QTY_THURSDAY"   size="3"/></td>
                         <td><input type="text" name="QTY_FRIDAY" id="QTY_FRIDAY"   size="3"/></td>
                         <td><input type="text" name="QTY_SATURDAY" id="QTY_SATURDAY"   size="3"/></td>
                      </tr>
                      <tr>
                       <td>Start Time<input type="text" name="StartTime_SUNDAY" id="StartTime_SUNDAY"   size="3"/> <br/>End Time<br/><input type="text" name="EndTime_SUNDAY" id="EndTime_SUNDAY"   size="3"/></td>
                       <td>Start Time<input type="text" name="StartTime_MONDAY" id="StartTime_MONDAY"   size="3"/> <br/>End Time<br/><input type="text" name="EndTime_MONDAY" id="EndTime_MONDAY"   size="3"/></td>
                       <td>Start Time<input type="text" name="StartTime_TUESDAY" id="StartTime_TUESDAY"   size="3"/> <br/>End Time<br/><input type="text" name="EndTime_TUESDAY" id="EndTime_TUESDAY"   size="3"/></td>
                       <td>Start Time<input type="text" name="StartTime_WEDNESDAY" id="StartTime_WEDNESDAY"   size="3"/> <br/>End Time<br/><input type="text" name="EndTime_WEDNESDAY" id="EndTime_WEDNESDAY"   size="3"/></td>
                       <td>Start Time<input type="text" name="StartTime_THURSDAY" id="StartTime_THURSDAY"   size="3"/> <br/>End Time<br/><input type="text" name="EndTime_THURSDAY" id="EndTime_THURSDAY"   size="3"/></td>
                       <td>Start Time<input type="text" name="StartTime_FRIDAY" id="StartTime_FRIDAY"   size="3"/> <br/>End Time<br/><input type="text" name="EndTime_FRIDAY" id="EndTime_FRIDAY"   size="3"/></td>
                       <td>Start Time<input type="text" name="StartTime_SATURDAY" id="StartTime_SATURDAY"   size="3"/> <br/>End Time<br/><input type="text" name="EndTime_SATURDAY" id="EndTime_SATURDAY"   size="3"/></td>
                      </tr>
                      <tr><td></td><td></td><td></td><td></td><td></td></td></td><td></td></tr>
                    </table>
                
            </td><td></td><td></td></tr>
        <tr><td>Buy Priority: <select name="BuyPriority" id="BuyPriority"   />
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
                      
            </td><td></td><td></td></tr>
        <tr><td>Rules Engine Assigned <select id="RulesEngineAssigned" name="RulesEngineAssigned" >
            
            <option>-- Rules Engine Not Assign --</option>

 <?php
/*
 $result = $member->getOneByNameAndId($_SESSION['username'],$_SESSION['memberId']);
 	
	$sql = "SELECT * FROM `member` WHERE `username`= '".$_SESSION['username']."';";
	$results_member = mysql_query($sql);
	
	$row = mysql_fetch_array($results_member);
	$memberid = $row['id'];
*/	
	$sql = "SELECT DISTINCT `Title` FROM `RulesManagementSet` WHERE `memberID`= '" . $_SESSION['memberId'] . "';";
	$result_rules = mysql_query($sql);
	//echo $sql;
	while($rows = mysql_fetch_array($result_rules)) {
		echo("<option value='".$rows["rulesID"]."'>".$rows["Title"]."</option>");
	}
 ?>
</select>

            
            
            </td><td></td></tr>
        <tr><td>Daily Purchase Quantity: <input type="text" name="DailyPurchaseQuantity" id="DailyPurchaseQuantity" size="4"/></td><td></td><td></td></tr>
      <tr><td>API STORE KEY: <BR/>
              &nbsp;&nbsp;KEY1:<input type="text" name="API[1]" id="APISTOREKEY[1]"  size="35"/>
              &nbsp;&nbsp;KEY2:<input type="text" name="API[2]" id="APISTOREKEY[2]"  size="35"/>
              <BR/>
              &nbsp;&nbsp;KEY3:<input type="text" name="API[3]" id="APISTOREKEY[3]"  size="35"/>
              &nbsp;&nbsp;KEY4:<input type="text" name="API[4]" id="APISTOREKEY[4]"  size="35"/>
          </td><td></td><td></td></tr>  
    </table>
    
    <div style="float:right;position: relative;bottom:0;">
</div>
</form>
</div>