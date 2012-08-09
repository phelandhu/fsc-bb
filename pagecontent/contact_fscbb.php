<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form method="POST" action="index.php?page=contact">
<div>
    
<div style="color:#000;font-size: 2em">
 Contact Us
</div>
    
<div style="color:#555;font-size: 1em">brief description text, or usage text here.  
        brief description text, or usage text here
        brief description text, or usage text here
        brief description text, or usage text here
        brief description text, or usage text here
</div>

</div>
 <p></p>
<div>Name Required*
</div>

<div>
    <input name="contact_name"size="32" type="text"/>
</div>

<div>
    E-mail Required*
</div>

<div>
    <input name="contact_email"  size="32" type="text"/>
</div>

<div>
    Subject
</div>

<div>
    <input name="contact_subject" size="32" type="text"/>
</div>
 
 <div>
    Phone
</div>

<div>
    <input name="contact_phone_nxx" size="4" type="text"/>-
    <input name="contact_phone_npa" size="4" type="text"/>-
    <input name="contact_phone_tbl" size="6" type="text"/>
</div>


<div>
Message What would you like to discuss?
</div>


<div name="contact_message">
    <textarea cols="35" rows="5">
	</textarea>
</div>

<div>
    <input name="contact_submit" type="submit"/>
</div>
</form>

