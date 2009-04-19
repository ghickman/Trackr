<?php
class Ticket extends AppModel {
	var $name = 'Ticket';

	var $belongsTo = array('Application', 'Priority', 'Release', 'Status', 'Queue', 'User');
	var $hasMany = array('Comment');
}
?>