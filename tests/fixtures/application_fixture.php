<?php 
/* SVN FILE: $Id$ */
/* Application Fixture generated on: 2008-10-30 13:10:20 : 1225372340*/

class ApplicationFixture extends CakeTestFixture {
	var $name = 'Application';
	var $table = 'applications';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'slug' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'release_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 11),
			'ticket_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 11),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'release_id'  => 'Lorem ips',
			'ticket_id'  => 'Lorem ips',
			'created'  => '2008-10-30 13:12:20',
			'modified'  => '2008-10-30 13:12:20'
			));
}
?>