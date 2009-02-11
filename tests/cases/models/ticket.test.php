<?php 
/* SVN FILE: $Id$ */
/* Ticket Test cases generated on: 2009-02-11 09:02:25 : 1234342885*/
App::import('Model', 'Ticket');

class TicketTestCase extends CakeTestCase {
	var $Ticket = null;
	var $fixtures = array('app.ticket', 'app.release', 'app.status', 'app.queue', 'app.comment');

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
			'created'  => '2009-02-11 09:01:25',
			'modified'  => '2009-02-11 09:01:25'
			));
		$this->assertEqual($results, $expected);
	}
}
?>