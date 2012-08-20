<?php
	if(isset($_POST["login"])) {
		// Login
		$table = 'member'; // Members name
		mysql_connect($host, $user, $pass);
		mysql_select_db($database);
		$username = mysql_real_escape_string($_POST['username']);
		$password = hash('sha512', $_POST['password']);
		print_r($password);
		$result = mysql_query("SELECT * FROM $table WHERE username = '$username' AND password = '$password'");
		if(mysql_num_rows($result)) {
			$_SESSION['username'] = htmlspecialchars($username); // htmlspecialchars() sanitises XSS
			//header('Location: index.bbx');
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.bbx">';    
			exit; 
		} else {
			// Invalid username/password
			echo '<p><strong>Error 401 Access denied.</strong>   </p>';
			//echo $password;
			//header('Location: http://20ae-fscbb-primary.hgsitebuilder.comindex.php');
		}
	}