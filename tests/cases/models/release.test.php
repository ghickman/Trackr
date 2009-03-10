<?php 
/* SVN FILE: $Id$ */
/* Release Test cases generated on: 2009-02-11 09:02:48 : 1234342848*/
App::import('Model', 'Release');

class ReleaseTestCase extends CakeTestCase {
	var $Release = null;
	var $fixtures = array('app.application', 'app.comment', 'app.group', 'app.priority', 'app.queue', 'app.release', 'app.ticket',  'app.status', 'app.user');

	function startTest() {
		$this->Release =& ClassRegistry::init('Release');
	}

	function testReleaseInstance() {
		$this->assertTrue(is_a($this->Release, 'Release'));
	}

	function testReleaseFind() {
		$this->Release->recursive = -1;
		$results = $this->Release->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Release' => array(
			'id'  => 1,
			'date_of'  => '2009-02-11 09:00:48',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2009-02-11 09:00:48',
			'modified'  => '2009-02-11 09:00:48'
			));
		$this->assertEqual($results, $expected);
	}
}
?>