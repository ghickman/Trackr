<?php
class Ticket extends AppModel {

	var $name = 'Ticket';
	var $belongsTo = array(
		'Release' => array('className' => 'Release', 'foreignKey' => 'release_id'),
		'Queue' => array('className' => 'Queue', 'foreignKey' => 'queue_id')
	);
	var $hasAndBelongsToMany = array(
		'Application' => array(
			'className' => 'Application',
			'joinTable' => 'applications_tickets',
			'foreignKey' => 'ticket_id',
			'associationForeignKey' => 'application_id'
		),
		'User' => array(
			'className' => 'User',
			'joinTable' => 'tickets_users',
			'foreignKey' => 'ticket_id',
			'associationForeignKey' => 'user_id'
		)
	);

}
?>