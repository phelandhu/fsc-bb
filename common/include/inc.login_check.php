<?php
	if(isset($_POST["login"])) {
		// Login
		$table = 'member'; // Members name
		$username = mysql_real_escape_string($_POST['username']);
		$password = hash('sha512', $_POST['password']);
		unset($result);
		$result = $mysqli->query("SELECT * FROM " . $table . " WHERE username = '" . $username . "' AND password = '" . $password . "'");
		$data = $result->fetch_assoc();
		if($result) {
			$_SESSION['username'] = htmlspecialchars($data['username']); // htmlspecialchars() sanitises XSS
			$_SESSION['id'] = $data['id'];
			header('Location: index.bbx'); 
			exit; 
		} else {
			// Invalid username/password
			$loginErr = true;
		}
	}