<?php 
/* SVN FILE: $Id$ */
/* ApplicationsController Test cases generated on: 2009-02-11 09:02:46 : 1234343086*/
App::import('Controller', 'Applications');

class TestApplications extends ApplicationsController {
	var $autoRender = false;
}

class ApplicationsControllerTest extends CakeTestCase {
	var $Applications = null;

	function setUp() {
		$this->Applications = new TestApplications();
		$this->Applications->constructClasses();
	}

	function testApplicationsControllerInstance() {
		$this->assertTrue(is_a($this->Applications, 'ApplicationsController'));
	}

	function tearDown() {
		unset($this->Applications);
	}
}
?>