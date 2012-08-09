<?php
include("common/include/db_login.php");
$table = 'member'; // Members name
$row ="";
mysql_connect($host, $user, $pass);
mysql_select_db($database);
$result = mysql_query("SELECT * FROM $table WHERE username = '".$_SESSION["username"]."'");
if(mysql_num_rows($result)) {
	$row = mysql_fetch_array($result) ;
	// print_r($row);
} else {
}
?>
<div>
    <div style="color:#FF8C19;font-size: 2em">
    	Profile - Editor
    </div>
    <div style="color:#000;font-size: 1em">
        <table style="height:250px;padding: 10px; width:670px">
            <tr>
                <td width="100px">First Name</td>
                <td><input type="text" id="firstName" name="firstName" value="<?php echo $row["FirstName"] ?>"/></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" id="lastName" name="lastName" value="<?php echo $row["LastName"] ?>"/></td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td><input type="text" id="EmailAddress" name="EmailAddress"  value="<?php echo $row["EmailAddress"] ?>"/></td>
            </tr>
            <tr>
                <td>Cell phone</td>
                <td><input type="text" id="CellPhone" name="CellPhone" value="<?php echo $row["Cellphone"] ?>"/></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" disabled="disabled" id="Username_New" name="Username_New" value="<?php print_r($_SESSION["username"])?>"></td>
            </tr>
            <tr>
                <td>Old Password</td>
                <td><input type="password" disabled="disabled" id="Password_Old" name="Password_Old" value="*****************"/></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" id="Password_New" name="Password_New"/></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" id="Password_New_Confirmation" name="Password_New_Confirmation"/></td>
            </tr>
        </table>
        <input type="hidden" name="form" id="form" value="member"/>
    </div>
</div>
