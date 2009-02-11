<?php
class Ticket extends AppModel {

	var $name = 'Ticket';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Release' => array('className' => 'Release',
								'foreignKey' => 'release_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Status' => array('className' => 'Status',
								'foreignKey' => 'status_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Queue' => array('className' => 'Queue',
								'foreignKey' => 'queue_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	var $hasMany = array(
			'Comment' => array('className' => 'Comment',
								'foreignKey' => 'ticket_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
	);

	var $hasAndBelongsToMany = array(
			'Application' => array('className' => 'Application',
						'joinTable' => 'applications_tickets',
						'foreignKey' => 'ticket_id',
						'associationForeignKey' => 'application_id',
						'unique' => true,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'finderQuery' => '',
						'deleteQuery' => '',
						'insertQuery' => ''
			),
			'User' => array('className' => 'User',
						'joinTable' => 'tickets_users',
						'foreignKey' => 'ticket_id',
						'associationForeignKey' => 'user_id',
						'unique' => true,
						'conditions' => '',
						'fields' => '',
						'order' => '',
						'limit' => '',
						'offset' => '',
						'finderQuery' => '',
						'deleteQuery' => '',
						'insertQuery' => ''
			)
	);

}
?>