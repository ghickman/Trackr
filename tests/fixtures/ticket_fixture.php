<?php 
/* SVN FILE: $Id$ */
/* Ticket Fixture generated on: 2009-02-11 09:02:25 : 1234342885*/

class TicketFixture extends CakeTestFixture {
	var $name = 'Ticket';
	var $table = 'tickets';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'slug' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'problem' => array('type'=>'text', 'null' => true, 'default' => NULL),
			'is_complete' => array('type'=>'boolean', 'null' => true, 'default' => NULL),
			'release_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 11),
			'status_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 11),
			'queue_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 11),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
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
}
?>