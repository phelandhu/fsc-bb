<?php 
	include("bootstrap.php");
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
					/*
				if (!$resp->is_valid && isset($_POST["username"] ) && isset($_POST["password"] ))  {
					// What happens when the CAPTCHA was entered incorrectly
					die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." . "(reCAPTCHA said: " . $resp->error . ")");
				} else {
					// Your code here to handle a successful verification
				}
				*/
            ?>
            <input type="submit" name="login" value="Sign In"></input>
        </form>
    </div>
    <div id="errornotification" class="error">
        <?php
// this is where the visible text will go
			if(isset($loginErr) && ($loginErr == true)) {
				echo '<p><strong>Error 401 Access denied.</strong>   </p>';
			}
        ?>
    </div>
</div>