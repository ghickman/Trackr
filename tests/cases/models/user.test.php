<?php 
/* SVN FILE: $Id$ */
/* User Test cases generated on: 2008-10-30 15:10:30 : 1225381170*/
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {
	var $User = null;
	var $fixtures = array('app.user', 'app.group');

	function start() {
		parent::start();
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
			'created'  => '2008-10-30 15:39:30',
			'modified'  => '2008-10-30 15:39:30'
			));
		$this->assertEqual($results, $expected);
	}
}
?>