<?php 
/* SVN FILE: $Id$ */
/* Application Fixture generated on: 2008-10-30 15:10:05 : 1225381205*/

class ApplicationFixture extends CakeTestFixture {
	var $name = 'Application';
	var $table = 'applications';
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
			'created'  => '2008-10-30 15:40:05',
			'modified'  => '2008-10-30 15:40:05'
			));
}
?>