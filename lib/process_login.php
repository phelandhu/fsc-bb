<?php
// Login
include("common/include/db_login.php");
$table = 'member'; // Members name
 
mysql_connect($host, $user, $pass);
mysql_select_db($database);

$username = mysql_real_escape_string($_POST['username']);
$password = hash('sha512', $_POST['password']);
 
$result = mysql_query("SELECT * FROM $table WHERE username = '$username' AND password = '$password'");

if(mysql_num_rows($result))
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

    