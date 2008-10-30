<?php 
/* SVN FILE: $Id$ */
/* Queue Test cases generated on: 2008-10-30 15:10:34 : 1225381294*/
App::import('Model', 'Queue');

class QueueTestCase extends CakeTestCase {
	var $Queue = null;
	var $fixtures = array('app.queue', 'app.group', 'app.ticket');

	function start() {
		parent::start();
		$this->Queue =& ClassRegistry::init('Queue');
	}

	function testQueueInstance() {
		$this->assertTrue(is_a($this->Queue, 'Queue'));
	}

	function testQueueFind() {
		$this->Queue->recursive = -1;
		$results = $this->Queue->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Queue' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'is_first_line'  => 1,
			'created'  => '2008-10-30 15:41:34',
			'modified'  => '2008-10-30 15:41:34'
			));
		$this->assertEqual($results, $expected);
	}
}
?>