<?php 
/* SVN FILE: $Id$ */
/* ReleasesController Test cases generated on: 2009-02-11 09:02:21 : 1234343181*/
App::import('Controller', 'Releases');

class TestReleases extends ReleasesController {
	var $autoRender = false;
}

class ReleasesControllerTest extends CakeTestCase {
	var $Releases = null;

	function setUp() {
		$this->Releases = new TestReleases();
		$this->Releases->constructClasses();
	}

	function testReleasesControllerInstance() {
		$this->assertTrue(is_a($this->Releases, 'ReleasesController'));
	}

	function tearDown() {
		unset($this->Releases);
	}
}
?>