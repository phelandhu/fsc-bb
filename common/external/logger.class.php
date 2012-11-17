<?php
// logger.class.php
/***********************************************
* Created:            Nov 16, 2012 2:17:09 PM
* Last Modified:      Nov 16, 2012 2:17:09 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
class Logger {
	private $lName = null;
	private $handle = null;

	public function __construct($logName = null) {
		if ($logName) $this->lName = $logName; //Define Log Name!
		else $this->lName = "Log"; //Default name
		$this->logOpen(); //Begin logging.
	}

	function __destruct() {
		fclose($this->handle); //Close when php script ends (always better to be proper.)
	}

	//Open Logfile
	private function logOpen(){
		$today = date('Y-m-d'); //Current Date
		$this->handle = fopen($this->lName . '_' . $today, 'a') or exit("Can't open " . $this->lName . "_" . $today); //Open log file for writing, if it does not exist, create it.
	}

	//Write Message to Logfile
	public function logWrite($message){
		$time = date('m-d-Y @ H:i:s -'); //Grab Time
		fwrite($this->handle, $time . " " . $message . "\n"); //Output to logfile
	}

	//Clear Logfile
	public function logClear(){
		ftruncate($this->handle, 0);
	}
}
