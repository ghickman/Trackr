<?php 
/* SVN FILE: $Id$ */
/* Group Test cases generated on: 2009-02-11 08:02:25 : 1234342585*/
App::import('Model', 'Group');

class GroupTestCase extends CakeTestCase {
	var $Group = null;
	var $fixtures = array('app.application', 'app.comment', 'app.group', 'app.priority', 'app.queue', 'app.release', 'app.ticket',  'app.status', 'app.user');

	function startTest() {
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
			'created'  => '2009-02-11 08:56:25',
			'modified'  => '2009-02-11 08:56:25'
			));
		$this->assertEqual($results, $expected);
	}
}
?>