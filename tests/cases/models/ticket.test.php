<?php 
/* SVN FILE: $Id$ */
/* Ticket Test cases generated on: 2009-02-19 11:02:11 : 1235042111*/
App::import('Model', 'Ticket');

class TicketTestCase extends CakeTestCase {
	var $Ticket = null;
	var $fixtures = array('app.application', 'app.comment', 'app.group', 'app.priority', 'app.queue', 'app.release', 'app.ticket',  'app.status', 'app.user');

	function startTest() {
		$this->Ticket =& ClassRegistry::init('Ticket');
	}

	function testTicketInstance() {
		$this->assertTrue(is_a($this->Ticket, 'Ticket'));
	}

	function testTicketFind() {
		$this->Ticket->recursive = -1;
		$results = $this->Ticket->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Ticket' => array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'problem'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'is_complete'  => 1,
			'release_id'  => 'Lorem ips',
			'status_id'  => 'Lorem ips',
			'queue_id'  => 'Lorem ips',
			'created'  => '2009-02-19 11:15:09',
			'modified'  => '2009-02-19 11:15:09'
			));
		$this->assertEqual($results, $expected);
	}
}
?>