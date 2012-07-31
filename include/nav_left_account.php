
<div class="box">
<H5><?PHP print_r($_GET["page"]);?>

</H5>
<?php
/**\
//   <input type="submit" name="<?php print_r("savestate_".$_GET["page"]);?>" id="<?php print_r("savestate_".$_GET["page"]);?>" value="save"/>
\*/
include('include/mnu_'.$_GET["page"].'_fsbb.php');


?>
      
    
     

</div>