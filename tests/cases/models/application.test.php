<?php 
/* SVN FILE: $Id$ */
/* Application Test cases generated on: 2009-02-11 08:02:35 : 1234342475*/
App::import('Model', 'Application');

class ApplicationTestCase extends CakeTestCase {
	var $Application = null;
	var $fixtures = array('app.application');

	function startTest() {
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
			'created'  => '2009-02-11 08:54:35',
			'modified'  => '2009-02-11 08:54:35'
			));
		$this->assertEqual($results, $expected);
	}
}
?>