<?php
// postEpic.class.php
/***********************************************
* Created:            Nov 27, 2012 11:29:19 AM
* Last Modified:      Nov 27, 2012 11:29:19 AM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
class PostEPIC extends CommHTTP{
	protected $uri;
	
	public function __construct($uri = "") {
		if(isset($uri) && $uri <> "") {
			$this->uri = $uri;
		}
	}
	
	public function post2EPIC($data) {
		$this->setSecurity();
		$this->setURL($this->uri);
		$this->setData('firstName=John&lastName=Doe ');
		$this->sendMessage(true);
	}
}