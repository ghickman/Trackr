<?php 
/* SVN FILE: $Id$ */
/* QueuesController Test cases generated on: 2009-02-11 09:02:41 : 1234343141*/
App::import('Controller', 'Queues');

class TestQueues extends QueuesController {
	var $autoRender = false;
}

class QueuesControllerTest extends CakeTestCase {
	var $Queues = null;

	function setUp() {
		$this->Queues = new TestQueues();
		$this->Queues->constructClasses();
	}

	function testQueuesControllerInstance() {
		$this->assertTrue(is_a($this->Queues, 'QueuesController'));
	}

	function tearDown() {
		unset($this->Queues);
	}
}
?>