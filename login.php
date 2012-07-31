

     <div class="box">
                    <div class="box-header">
                        Members
                    </div>
                    <div class="BOX CONTENT">
                        
                        <form action="index.php" method="POST" >
                        username 
                        
                    <input type="text" name="username"></input>
                    password
                    <input type="password" name="password"></input>
                    
                    <input type="submit" name="login" value="Sign In"></input>
                    <a href="?page=register">Create Account</a>
                    
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
                        die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
                            "(reCAPTCHA said: " . $resp->error . ")");
                    } else {
                        // Your code here to handle a successful verification
                    }

                    ?>
                   </form>
                    
                    </div>
         
         
         
         <div id="errornotification" class="error">
             
             
             
             <?php
if(isset($_POST["login"]))
{

 // Login

$host = 'localhost'; // Host name Normally 'LocalHost'
$user = 'root'; // MySQL login username
$pass = 'Keyb0ard!'; // MySQL login password
$database = 'BlackBox'; // Database name
$table = 'member'; // Members name
 
mysql_connect($host, $user, $pass);
mysql_select_db($database);

$username = mysql_real_escape_string($_POST['username']);
$password = hash('sha512', $_POST['password']);

print_r($password);
$result = mysql_query("SELECT * FROM $table WHERE username = '$username' AND password = '$password'");

if(mysql_num_rows($result))
{
 
  $_SESSION['username'] = htmlspecialchars($username); // htmlspecialchars() sanitises XSS
  header('Location: index.bbx');
}
else
{
  // Invalid username/password
  echo '<p><strong>Error 401 Access denied.</strong>   </p>';
  //echo $password;
  //header('Location: http://20ae-fscbb-primary.hgsitebuilder.comindex.php');
}
}
?>
             
         </div>
                </div>