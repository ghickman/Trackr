<?php
class User extends AppModel {
	var $name = 'User';
	
	//Relationships
	var $belongsTo = array('Group' => array('className' => 'Group', 'foreignKey' => 'group_id'));
	var $hasAndBelongsToMany = array(
		'Ticket' => array(
			'className' => 'Ticket', 
			'joinTable' => 'tickets_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'ticket_id'
		)
	);
	
	//Validation
	var $validate = array(
		'username' => array(
			'rule' => array('alphaNumeric', 'message' => 'Usernames can only contain letters and numbers'), 
			'rule' => array('notEmpty', 'message' => 'Username must not be empty'),
			'rule' => array('isUnique', 'message' => 'Username must be unique')
		),
		'password' => array(
			'rule' => array('between', 8, 255),	'message' => 'Your password must be between 5 and 255 characters long'
		)
	);
}
?>