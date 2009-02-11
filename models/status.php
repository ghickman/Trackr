<?php
class Status extends AppModel {

	var $name = 'Status';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Ticket' => array('className' => 'Ticket',
								'foreignKey' => 'status_id',
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