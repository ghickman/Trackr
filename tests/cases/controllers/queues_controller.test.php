<?php 
/* SVN FILE: $Id$ */
/* QueuesController Test cases generated on: 2008-11-04 16:11:34 : 1225816114*/
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