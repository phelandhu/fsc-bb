<?php
// Login
include('bootstrap.php');
include("common/classes/member.class.php");
$member = new Member($dbDataArr);
$username = mysql_real_escape_string($_POST['username']);
$password = hash('sha512', $_POST['password']);
$result = $member->getOneByUsernameAndPassword($username, $password); 

if($result->num_rows > 0)
{
	$_SESSION['username'] = htmlspecialchars($username); // htmlspecialchars() sanitises XSS
	//header('Location: http://50.116.64.127/~fscbb/default.php');
}
else
{
	// Invalid username/password
	echo '<p><strong>Error:</strong> Invalid username or password.  </p>'.$password;
	//header('Location: http://20ae-fscbb-primary.hgsitebuilder.comindex.php');
}

?>

    