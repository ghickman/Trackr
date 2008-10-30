<?php 
/* SVN FILE: $Id$ */
/* Release Test cases generated on: 2008-10-30 15:10:43 : 1225381363*/
App::import('Model', 'Release');

class ReleaseTestCase extends CakeTestCase {
	var $Release = null;
	var $fixtures = array('app.release', 'app.ticket');

	function start() {
		parent::start();
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
			'date_of'  => '2008-10-30 15:42:43',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2008-10-30 15:42:43',
			'modified'  => '2008-10-30 15:42:43'
			));
		$this->assertEqual($results, $expected);
	}
}
?>