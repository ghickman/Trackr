<?php
class Application extends AppModel {

	var $name = 'Application';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasAndBelongsToMany = array(
			'Release' => array('className' => 'Release',
						'joinTable' => 'applications_releases',
						'foreignKey' => 'application_id',
						'associationForeignKey' => 'release_id',
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
			'Ticket' => array('className' => 'Ticket',
						'joinTable' => 'applications_tickets',
						'foreignKey' => 'application_id',
						'associationForeignKey' => 'ticket_id',
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