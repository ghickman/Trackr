<?php
class Group extends AppModel {

	var $name = 'Group';
	var $belongsTo = array('Queue' => array('className' => 'Queue', 'foreignKey' => 'queue_id'));
	var $hasMany = array('User' => array('className' => 'User', 'foreignKey' => 'group_id'));
}
?>