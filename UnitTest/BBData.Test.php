<?php
// BBData.Test.php
/***********************************************
* Created:            Nov 5, 2012 1:46:12 PM
* Last Modified:      Nov 5, 2012 1:46:12 PM
*
* [LEFT BLANK FOR PROGRAM DISCRIPTION]
*
* Mike Browne - phelandhu@gmail.com
***********************************************/
include ("../bootstrap.php");
include ("../common/classes/rules.class.php");


class RulesTest extends PHPUnit_Framework_TestCase {
	private $_rules = null;
	private $_data;
	private $self;
	
	public function setUp()
	{
		$this->_rules = new Rules($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"], $GLOBALS["database"]);
		$this->_data = new $GLOBALS["dbData"];
		$this->self = "member";
		//$this->_rules = new Rules($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"], $GLOBALS["database"]);
	}
	
	public function tearDown()
	{
		//unset($this->_rules);
	}
	
	public function testConnection() {
		$this->_data
		echo $this->_data->getHostName();
	}
}