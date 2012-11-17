<?php
// bootstrap.php
/***********************************************
* Created:            Oct 30, 2012 5:06:06 PM
* Last Modified:      Oct 30, 2012 5:06:06 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
require_once("common/include/site_setup.php");
require_once("common/include/db_login.php");
require_once("common/classes/bbData.class.php");
require_once("common/external/logger.class.php");
// $dbData = new DBData($host, $user, $pass, $database);

//$dbDataArr = $dbData->getDBData();
$dbDataArr = array("hostName"=>$host, "userName"=>$user, "passWord"=>$pass, "dataBase"=>$database);
$ROOT_DIR = __DIR__;

$mysqli = new mysqli($host, $user, $pass, $database);

if(mysqli_connect_errno()) {
	echo "<p>Sorry, no connection! ", mysqli_connect_error(), "</p>\n";
	exit();
}

//BB_Data::setConnection($host, $user, $pass, $database);

