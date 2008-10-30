<?php 
/* SVN FILE: $Id$ */
/* Queue Fixture generated on: 2008-10-30 15:10:34 : 1225381294*/

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
			'created'  => '2008-10-30 15:41:34',
			'modified'  => '2008-10-30 15:41:34'
			));
}
?>