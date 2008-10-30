<?php 
/* SVN FILE: $Id$ */
/* Release Fixture generated on: 2008-10-30 15:10:43 : 1225381363*/

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
			'date_of'  => '2008-10-30 15:42:43',
			'slug'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2008-10-30 15:42:43',
			'modified'  => '2008-10-30 15:42:43'
			));
}
?>