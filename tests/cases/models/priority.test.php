<?php 
/* SVN FILE: $Id$ */
/* Priority Test cases generated on: 2009-03-09 23:03:38 : 1236643178*/
App::import('Model', 'Priority');

class PriorityTestCase extends CakeTestCase {
	var $Priority = null;
	var $fixtures = array('app.priority');

	function startTest() {
		$this->Priority =& ClassRegistry::init('Priority');
	}

	function testPriorityInstance() {
		$this->assertTrue(is_a($this->Priority, 'Priority'));
	}

	function testPriorityFind() {
		$this->Priority->recursive = -1;
		$results = $this->Priority->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Priority' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2009-03-09 23:59:38',
			'modified'  => '2009-03-09 23:59:38'
			));
		$this->assertEqual($results, $expected);
	}
}
?>