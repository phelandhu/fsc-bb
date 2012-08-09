<?php 
	include("common/include/db_login.php");
?>
<div class="box">
    <div class="box-header">
        Members
    </div>
    <div class="BOX CONTENT">
        <form action="index.bbx" method="POST" >
        	<table>
            	<tr>
                	<td>username</td>
                    <td><input type="text" name="username"></input><br /></td>
                </tr>
            	<tr>
                	<td>password</td>
                    <td><input type="password" name="password"></input><br /></td>
                </tr>
            </table>
            <?php
				require_once('lib/recaptchalib.php');
				$publickey = "6LdPxtISAAAAAIEvTtsyB3yqdgrPk69cfTvurnXV"; // you got this from the signup page
				echo recaptcha_get_html($publickey);
				$privatekey = "6LdPxtISAAAAABsxvyxwbcyNVM_9LXhEqbcfgR_a";
				$resp = recaptcha_check_answer ($privatekey,
					$_SERVER["REMOTE_ADDR"],
					$_POST["recaptcha_challenge_field"],
					$_POST["recaptcha_response_field"]);
				if (!$resp->is_valid && isset($_POST["username"] ) && isset($_POST["password"] ))  {
					// What happens when the CAPTCHA was entered incorrectly
					die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." . "(reCAPTCHA said: " . $resp->error . ")");
				} else {
					// Your code here to handle a successful verification
				}
            ?>
            <input type="submit" name="login" value="Sign In"></input>
        </form>
    </div>
    <div id="errornotification" class="error">
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
        ?>
    </div>
</div>