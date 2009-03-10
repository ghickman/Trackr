<?php 
/* SVN FILE: $Id$ */
/* Priority Fixture generated on: 2009-03-09 23:03:38 : 1236643178*/

class PriorityFixture extends CakeTestFixture {
	var $name = 'Priority';
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
			'created'  => '2009-03-09 23:59:38',
			'modified'  => '2009-03-09 23:59:38'
			));
}
?>