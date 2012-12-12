<?php
// uploader.php
/***********************************************
* Created:            Dec 11, 2012 10:31:55 AM
* Last Modified:      Dec 11, 2012 10:31:55 AM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	echo "The file ".  basename( $_FILES['uploadedfile']['name']).
	" has been uploaded";
} else{
	echo "There was an error uploading the file, please try again!";
}