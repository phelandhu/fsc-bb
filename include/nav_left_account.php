<div class="box">
<H5>
	<?php
        if(isset($_GET["page"])) { print_r($_GET["page"]); }
    ?>
</H5>
<?php
	/**\
	//   <input type="submit" name="<?php print_r("savestate_".$_GET["page"]);?>" id="<?php print_r("savestate_".$_GET["page"]);?>" value="save"/>
	\*/
	if(isset($_GET["page"])) { include('include/mnu_'.$_GET["page"].'_fsbb.php'); }
?>
</div>