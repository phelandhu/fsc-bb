<?php
// commHTTP.class.php
/***********************************************
* Created:            Nov 27, 2012 10:32:18 AM
* Last Modified:      Nov 27, 2012 10:32:18 AM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
class CommHTTP {
	const UNSECURED = "0010";
	const SECURED = "0020";
	
	protected $serverRequest;
	protected $protocol;
	protected $url;
	
	public function __construct() {
		$this->serverRequest = curl_init();
		
	}
	
	public function __destruct() {
		curl_close($this->serverRequest);
	}
		
	public function setURL($uri) {
		// set url
		curl_setopt($this->serverRequest, CURLOPT_URL, $uri);
	}
	
	public function setSecurity($security = CommHTTP::UNSECURED) {
		// later look at adding FTP, and other protocols.
		if($security == CommHTTP::SECURED) {
			$protocol = "https://";
		} else {
			$protocol = "http://";
		}
	}
	
	public function setData($data, $post = true) {
		if($post == true) {
			curl_setopt($this->serverRequest, CURLOPT_POSTFIELDS, $data);
		} // no else I don't need it.

	}
	
	public function sendMessage($request = FALSE) {
		if($request == true) {
			curl_setopt($this->serverRequest, CURLOPT_RETURNTRANSFER, 1);
		}
		$output = curl_exec($this->serverRequest);
		return $output;
	}
	
}