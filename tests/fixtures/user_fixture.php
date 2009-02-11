<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2009-02-11 09:02:21 : 1234343061*/

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
			'created'  => '2009-02-11 09:04:21',
			'modified'  => '2009-02-11 09:04:21'
			));
}
?>