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

$path = __DIR__ . "/common";
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once("common/include/site_setup.php");
require_once("common/include/db_login.php");
require_once("common/classes/bbData.class.php");
//require_once("common/external/logger.class.php");
/*
// Insert the path where you unpacked log4php
include_once('log4php/Logger.php');
// Tell log4php to use our configuration file.
Logger::configure('config.xml');

// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Foo');
*/

// Start logging
/*
$log->trace("My first message.");   // Not logged because TRACE < WARN
$log->debug("My second message.");  // Not logged because DEBUG < WARN
$log->info("My third message.");    // Not logged because INFO < WARN
$log->warn("My fourth message.");   // Logged because WARN >= WARN
$log->error("My fifth message.");   // Logged because ERROR >= WARN
$log->fatal("My sixth message.");   // Logged because FATAL >= WARN
*/
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
