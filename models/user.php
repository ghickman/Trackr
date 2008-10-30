<?php
class User extends AppModel {

	var $name = 'User';
	var $belongsTo = array('Group' => array('className' => 'Group', 'foreignKey' => 'group_id'));
	var $hasAndBelongsToMany = array(
		'Ticket' => array(
			'className' => 'Ticket', 
			'joinTable' => 'tickets_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'ticket_id'
		)
	);
	var $validate = array(
		'username' => array(
			'rule' => 'alphaNumeric',
			'message' => 'Usernames must only contain letters and numbers.'
		),
		'password' = array()
	);
}
?>