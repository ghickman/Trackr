<?php 
/* SVN FILE: $Id$ */
/* PrioritiesController Test cases generated on: 2009-03-07 11:03:37 : 1236425977*/
App::import('Controller', 'Priorities');

class TestPriorities extends PrioritiesController {
	var $autoRender = false;
}

class PrioritiesControllerTest extends CakeTestCase {
	var $Priorities = null;

	function setUp() {
		$this->Priorities = new TestPriorities();
		$this->Priorities->constructClasses();
	}

	function testPrioritiesControllerInstance() {
		$this->assertTrue(is_a($this->Priorities, 'PrioritiesController'));
	}

	function tearDown() {
		unset($this->Priorities);
	}
}
?>