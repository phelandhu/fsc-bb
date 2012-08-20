<?php
	if(isset($_POST["login"])) {
		// Login
		$table = 'member'; // Members name
		mysql_connect($host, $user, $pass);
		mysql_select_db($database);
		$username = mysql_real_escape_string($_POST['username']);
		$password = hash('sha512', $_POST['password']);
		$result = mysql_query("SELECT * FROM $table WHERE username = '$username' AND password = '$password'");
		if(mysql_num_rows($result)) {
			$_SESSION['username'] = htmlspecialchars($username); // htmlspecialchars() sanitises XSS
			header('Location: index.bbx'); 
			exit; 
		} else {
			// Invalid username/password
			$loginErr = true;
		}
	}