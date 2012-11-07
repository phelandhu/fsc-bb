<?php
	$host = 'localhost'; // Host name Normally 'LocalHost'
	$user = 'bb_user'; // MySQL login username
	$pass = 'Keyb0ard!'; // MySQL login password
//	$database = 'BlackBoxDev'; // Database name
	$database = 'BB_Dev'; // Database name
	
	class DBData {
		private $hostName = null;
		private $userName = null;
		private $passWord = null;
		private $dataBase = null;
		
		public function __construct($hostName, $userName, $passWord, $dataBase) {
			$this->hostName = $hostName;
			$this->userName = $hostName;
			$this->passWord = $passWord;
			$this->dataBase = $dataBase; 
		}
		
		public function getDBData() {
			$data = array(hostName=>$this->hostName, userName=>$this->userName, passWord=>$this->passWord, dataBase=>$this->dataBase);
			return $data;
		}
		
		public function getHostName() {
			return $this->hostName;
		}
		
		public function getUserName() {
			return $this->userName;
		}
		
		public function getPassWord() {
			return $this->passWord;
		}
		
		public function getDataBase() {
			return $this->dataBase;
		}
	}

?>