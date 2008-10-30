<?php 
/* SVN FILE: $Id$ */
/* Application Test cases generated on: 2008-10-30 13:10:20 : 1225372340*/
App::import('Model', 'Application');

class ApplicationTestCase extends CakeTestCase {
	var $Application = null;
	var $fixtures = array('app.application', 'app.release', 'app.ticket');

	function start() {
		parent::start();
		$this->Application =& ClassRegistry::init('Application');
	}

	function testApplicationInstance() {
		$this->assertTrue(is_a($this->Application, 'Application'));
	}

	function testApplicationFind() {
		$this->Application->recursive = -1;
		$results = $this->Application->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Application' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'release_id'  => 'Lorem ips',
			'ticket_id'  => 'Lorem ips',
			'created'  => '2008-10-30 13:12:20',
			'modified'  => '2008-10-30 13:12:20'
			));
		$this->assertEqual($results, $expected);
	}
}
?>