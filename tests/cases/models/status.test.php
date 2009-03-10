<?php 
/* SVN FILE: $Id$ */
/* Status Test cases generated on: 2009-02-11 09:02:01 : 1234342861*/
App::import('Model', 'Status');

class StatusTestCase extends CakeTestCase {
	var $Status = null;
	var $fixtures = array('app.application', 'app.comment', 'app.group', 'app.priority', 'app.queue', 'app.release', 'app.ticket',  'app.status', 'app.user');

	function startTest() {
		$this->Status =& ClassRegistry::init('Status');
	}

	function testStatusInstance() {
		$this->assertTrue(is_a($this->Status, 'Status'));
	}

	function testStatusFind() {
		$this->Status->recursive = -1;
		$results = $this->Status->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Status' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2009-02-11 09:01:01',
			'modified'  => '2009-02-11 09:01:01'
			));
		$this->assertEqual($results, $expected);
	}
}
?>