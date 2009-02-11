<?php 
/* SVN FILE: $Id$ */
/* Status Fixture generated on: 2009-02-11 09:02:01 : 1234342861*/

class StatusFixture extends CakeTestFixture {
	var $name = 'Status';
	var $table = 'statuses';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'name' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'slug' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'name'  => 'Lorem ipsum dolor sit amet',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2009-02-11 09:01:01',
			'modified'  => '2009-02-11 09:01:01'
			));
}
?>