<?php
class User extends AppModel {
	var $name = 'User';

	var $belongsTo = array('Group');
	var $hasMany = array('Comment');
	var $hasAndBelongsToMany = array('Ticket');
	
	var $validate = array(
	    'username'=>array(
	        'isUnique'=>array('rule'=>'isUnique', 'message'=>'Sorry, this username already exists'),
	        'between'=>array('rule'=>array('between', '3', '255'), 'message'=>'Username must be between 3 and 255 characters')
	    ),
	    'password'=>array(
	        'rule'=>array('between', 8, 50),
	        'message'=>'Passwords must be between 8 and 50 characters long'
	    )
	);
}
?>