<?php

if(isset($_GET["logout"]))
{
    session_destroy();
  // header('Location: http://20ae-fscbb-primary.hgsitebuilder.com');
     header('Location: index.bbx');
}

?>
<div id="header" class="header">
<?php
    if(!isset($_SESSION["username"]))
{
//include_once("include/login.php");
        
                            
//echo("<H1 style=\"color:#000;\">Welcome to Fresh Start - Black Box</H1>  ");
                     
   ?>
    
<div style="color:#fff" >You are not logged in

                      
                 
                   </div>
        
<?php
}else{
    
    
include_once("include/logout.php");
}

?>
      </div>
