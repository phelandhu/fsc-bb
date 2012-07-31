


         
         <div>
    
<div style="color:#000;font-size: 2em">
 Reset Password
</div>
    
<div style="color:#555;font-size: 1em">To request a new password enter the username associated with your account.
  you will receive and email with final instructions.
</div>
</div>
                   
                    <div class="BOX CONTENT">
                        
                        <form action="index.php?page=resetpassword" method="POST" >
                        Account Username 
                        
                    <input type="text" name="trueusername"></input>
                   
                    
             
                   
                    
                    <?php
                    require_once('lib/recaptchalib.php');
                    $publickey = "6LdPxtISAAAAAIEvTtsyB3yqdgrPk69cfTvurnXV"; // you got this from the signup page
                    echo recaptcha_get_html($publickey);

                    $privatekey = "6LdPxtISAAAAABsxvyxwbcyNVM_9LXhEqbcfgR_a";
                    
                    $resp = recaptcha_check_answer ($privatekey,
                                                    $_SERVER["REMOTE_ADDR"],
                                                    $_POST["recaptcha_challenge_field"],
                                                    $_POST["recaptcha_response_field"]);

                    if (!$resp->is_valid && isset($_POST["trueusername"] ))  {
                        // What happens when the CAPTCHA was entered incorrectly
                        die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." . "(reCAPTCHA said: " . $resp->error . ")");
                    } 

                    ?>
                   </form>
                           <input type="submit" name="Resetpassword" value="Reset"></input>
                    </div>
         
         
         
         <div id="errornotification" class="error">
             
             
             
             <?php
if(isset($_POST["Resetpassword"]))
{

 // Login

$host = 'localhost'; // Host name Normally 'LocalHost'
$user = 'root'; // MySQL login username
$pass = 'Keyb0ard!'; // MySQL login password
$database = 'BlackBox'; // Database name
$table = 'member'; // Members name
 
mysql_connect($host, $user, $pass);
mysql_select_db($database);

$trueusername = mysql_real_escape_string($_POST['trueusername']);

 
$result = mysql_query("SELECT * FROM $table WHERE username = '$trueusername'");

if(mysql_num_rows($result))
{
 
  $_SESSION['trueusername'] = htmlspecialchars($trueusername); // htmlspecialchars() sanitises XSS
  //header('Location: index.php');
  echo '<p><strong>Your password reset request is complete. Check your email for further instructions </strong>   </p>';

}
else
{
  // Invalid username/password
  echo '<p><strong>Account does not exist.</strong>   </p>';
  //echo $password;
  //header('Location: http://20ae-fscbb-primary.hgsitebuilder.comindex.php');
}
}
?>
             
         </div>
       