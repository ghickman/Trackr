<?php 
/* SVN FILE: $Id$ */
/* Group Fixture generated on: 2008-10-30 15:10:04 : 1225381264*/

class GroupFixture extends CakeTestFixture {
	var $name = 'Group';
	var $table = 'groups';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'slug' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'queue_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 11),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'queue_id'  => 'Lorem ips',
			'created'  => '2008-10-30 15:41:04',
			'modified'  => '2008-10-30 15:41:04'
			));
}
?>