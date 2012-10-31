<?php
// bbData.class.php
/***********************************************
* Created:            Oct 30, 2012 4:44:27 PM
* Last Modified:      Oct 30, 2012 4:44:27 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/

class BB_Data {
	protected static $dbConnectionInstance;
	
	public function __construct() {
		
	}
	
	public static function setConnection($host, $user, $pass, $database) {
		self::$dbConnectionInstance = new mysqli($host, $user, $pass, $database);
	}
}