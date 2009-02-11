<?php 
/* SVN FILE: $Id$ */
/* Release Fixture generated on: 2009-02-11 09:02:48 : 1234342848*/

class ReleaseFixture extends CakeTestFixture {
	var $name = 'Release';
	var $table = 'releases';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'date_of' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'slug' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'date_of'  => '2009-02-11 09:00:48',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2009-02-11 09:00:48',
			'modified'  => '2009-02-11 09:00:48'
			));
}
?>