<?php
	require_once("common/classes/member.class.php");
	$member = new Member($dbDataArr);
	if(isset($_POST["login"])) {
		// Login
		$result = $member->getOneByUsernameAndPassword(mysql_real_escape_string($_POST['username']), hash('sha512', $_POST['password']));
		$data = $result->fetch_assoc();
		if($result) {
			$_SESSION['username'] = htmlspecialchars($data['username']); // htmlspecialchars() sanitises XSS
			$_SESSION['memberId'] = $data['id'];
			$_SESSION['userPagePermission'] = $data['userPagePermissions'];
			header('Location: index.bbx'); 
			exit; 
		} else {
			// Invalid username/password
			$loginErr = true;
		}
	}