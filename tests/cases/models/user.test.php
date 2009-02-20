<?php 
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2009-02-11 09:02:21 : 1234343061*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $User = null;
	var $fixtures = array('app.application', 'app.comment', 'app.group', 'app.queue', 'app.release', 'app.ticket',  'app.status', 'app.user');

	function startTest() {
		$this->User =& ClassRegistry::init('User');
	}

	function testUserInstance() {
		$this->assertTrue(is_a($this->User, 'User'));
	}

	function testUserFind() {
		$this->User->recursive = -1;
		$results = $this->User->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('User' => array(
			'id'  => 1,
			'slug'  => 'Lorem ipsum dolor sit amet',
			'username'  => 'Lorem ipsum dolor sit amet',
			'password'  => 'Lorem ipsum dolor sit amet',
			'group_id'  => 'Lorem ips',
			'created'  => '2009-02-11 09:04:21',
			'modified'  => '2009-02-11 09:04:21'
			));
		$this->assertEqual($results, $expected);
	}
}
?>