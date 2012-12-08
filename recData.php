<?php
// recData.php
/***********************************************
* Created:            Dec 7, 2012 11:22:24 AM
* Last Modified:      Dec 7, 2012 11:22:24 AM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
require_once("bootstrap.php");
// get data from the request
$data = print_r($_REQUEST, true);
// and then save it down.
$log->trace("Test\n\n");
$log->trace($data);
// write it out to db.
echo "Accepted";