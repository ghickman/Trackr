<?php 
/* SVN FILE: $Id$ */
/* CommentsController Test cases generated on: 2009-02-11 09:02:20 : 1234343120*/
App::import('Controller', 'Comments');

class TestComments extends CommentsController {
	var $autoRender = false;
}

class CommentsControllerTest extends CakeTestCase {
	var $Comments = null;

	function setUp() {
		$this->Comments = new TestComments();
		$this->Comments->constructClasses();
	}

	function testCommentsControllerInstance() {
		$this->assertTrue(is_a($this->Comments, 'CommentsController'));
	}

	function tearDown() {
		unset($this->Comments);
	}
}
?>