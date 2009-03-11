<?php
class Ticket extends AppModel {
	var $name = 'Ticket';

	var $belongsTo = array('Release', 'Status', 'Queue', 'User');
	var $hasMany = array('Comment');
	var $hasAndBelongsToMany = array('Application', 'Priority');
}
?>