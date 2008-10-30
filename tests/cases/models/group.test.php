<?php 
/* SVN FILE: $Id$ */
/* Group Test cases generated on: 2008-10-30 15:10:04 : 1225381264*/
App::import('Model', 'Group');

class GroupTestCase extends CakeTestCase {
	var $Group = null;
	var $fixtures = array('app.group', 'app.queue', 'app.user');

	function start() {
		parent::start();
		$this->Group =& ClassRegistry::init('Group');
	}

	function testGroupInstance() {
		$this->assertTrue(is_a($this->Group, 'Group'));
	}

	function testGroupFind() {
		$this->Group->recursive = -1;
		$results = $this->Group->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Group' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'queue_id'  => 'Lorem ips',
			'created'  => '2008-10-30 15:41:04',
			'modified'  => '2008-10-30 15:41:04'
			));
		$this->assertEqual($results, $expected);
	}
}
?>