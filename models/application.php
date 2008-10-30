<?php
class Application extends AppModel {

	var $name = 'Application';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Release' => array('className' => 'Release',
								'foreignKey' => 'application_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			),
			'Ticket' => array('className' => 'Ticket',
								'foreignKey' => 'application_id',
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

}
?>