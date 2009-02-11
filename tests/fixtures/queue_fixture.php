<?php 
/* SVN FILE: $Id$ */
/* Queue Fixture generated on: 2009-02-11 08:02:53 : 1234342793*/

class QueueFixture extends CakeTestFixture {
	var $name = 'Queue';
	var $table = 'queues';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'slug' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'is_first_line' => array('type'=>'boolean', 'null' => true, 'default' => NULL),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'is_first_line'  => 1,
			'created'  => '2009-02-11 08:59:53',
			'modified'  => '2009-02-11 08:59:53'
			));
}
?>