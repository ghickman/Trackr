<?php 
/* SVN FILE: $Id$ */
/* Application Test cases generated on: 2008-10-30 15:10:07 : 1225381207*/
App::import('Model', 'Application');

class ApplicationTestCase extends CakeTestCase {
	var $Application = null;
	var $fixtures = array('app.application');

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
			'created'  => '2008-10-30 15:40:05',
			'modified'  => '2008-10-30 15:40:05'
			));
		$this->assertEqual($results, $expected);
	}
}
?>