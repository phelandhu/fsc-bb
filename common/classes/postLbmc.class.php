<?php
// postLbmc.class.php
/***********************************************
* Created:            Nov 27, 2012 11:29:49 AM
* Last Modified:      Nov 27, 2012 11:29:49 AM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
require_once("commHTTP.class.php");
require_once("vendorPostTo.class.php");

class PostLBMC extends CommHTTP{
	protected $uri;
	
	public function __construct() {
		parent::__construct();
		$this->_vendorPostTo = new VendorPostTo($GLOBALS["dbDataArr"]);
		$this->uri = "fsc-bb/test/landingPage.php";
		$this->setURL($this->uri);
	}
	
	public function post2LBMC($data, $transactionLeadId) {
		$this->setSecurity();
		$this->setData("postData=" . $data);
		$result = $this->sendMessage(true);
		$data = array('vendorPostTo' => $this->vendor, 
					'response' => $result, 
					'urlPostedTo' => $this->uri,
					'transactionLeadId' => $transactionLeadId
				);
		$this->_vendorPostTo->save($data);
	}
}