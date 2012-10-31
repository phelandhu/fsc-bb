<?php
include("common/include/db_login.php");
$table = 'member'; // Members name
$result = $mysqli->query("SELECT * FROM " . $table ."  WHERE username = '" . $_SESSION["username"] . "' AND id = " . $_SESSION['id']);
if($result) {
	$row = $result->fetch_array();
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
                <td><input type="text" id="firstName" name="firstName" value="<?php echo $row["firstName"] ?>"/></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" id="lastName" name="lastName" value="<?php echo $row["lastName"] ?>"/></td>
            </tr>
            <tr>
                <td>Email Address</td>
                <td><input type="text" id="EmailAddress" name="EmailAddress"  value="<?php echo $row["emailAddress"] ?>"/></td>
            </tr>
            <tr>
                <td>Cell phone</td>
                <td><input type="text" id="CellPhone" name="CellPhone" value="<?php echo $row["cellPhoneNumber"] ?>"/></td>
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
