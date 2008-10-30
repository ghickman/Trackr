<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2008-10-30 15:10:30 : 1225381170*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $table = 'users';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'slug' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'username' => array('type'=>'string', 'null' => true, 'default' => NULL),
			'password' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 40),
			'group_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 11),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'slug'  => 'Lorem ipsum dolor sit amet',
			'username'  => 'Lorem ipsum dolor sit amet',
			'password'  => 'Lorem ipsum dolor sit amet',
			'group_id'  => 'Lorem ips',
			'created'  => '2008-10-30 15:39:30',
			'modified'  => '2008-10-30 15:39:30'
			));
}
?>