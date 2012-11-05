<?php
include('bootstrap.php');
include("common/classes/member.class.php");
$member = new Member($dbDataArr);
$username = mysql_real_escape_string($_POST['username']);
$password = hash('sha512', $_POST['password']);
$result = $member->getOneByUsernameAndPassword($username, $password); 

if($result->num_rows > 0)
{
	// Login
	session_start();
	$_SESSION['username'] = htmlspecialchars($username); // htmlspecialchars() sanitises XSS
}
else
{
	// Invalid username/password
	echo '<p><strong>Error:</strong> Invalid username or password.</p>';
}
 
// Redirect
header('Location: default.php');
exit;

?>