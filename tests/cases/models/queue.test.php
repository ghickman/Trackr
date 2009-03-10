<?php 
/* SVN FILE: $Id$ */
/* Queue Test cases generated on: 2009-02-11 08:02:53 : 1234342793*/
App::import('Model', 'Queue');

class QueueTestCase extends CakeTestCase {
	var $Queue = null;
	var $fixtures = array('app.application', 'app.comment', 'app.group', 'app.priority', 'app.queue', 'app.release', 'app.ticket',  'app.status', 'app.user');

	function startTest() {
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
			'created'  => '2009-02-11 08:59:53',
			'modified'  => '2009-02-11 08:59:53'
			));
		$this->assertEqual($results, $expected);
	}
}
?>