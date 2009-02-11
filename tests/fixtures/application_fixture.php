<?php 
/* SVN FILE: $Id$ */
/* Application Fixture generated on: 2009-02-11 08:02:35 : 1234342475*/

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
			'created'  => '2009-02-11 08:54:35',
			'modified'  => '2009-02-11 08:54:35'
			));
}
?>