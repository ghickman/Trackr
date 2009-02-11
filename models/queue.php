<?php
class Queue extends AppModel {

	var $name = 'Queue';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Group' => array('className' => 'Group',
								'foreignKey' => 'queue_id',
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
								'foreignKey' => 'queue_id',
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