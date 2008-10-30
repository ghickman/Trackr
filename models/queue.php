<?php
class Queue extends AppModel {

	var $name = 'Queue';
	var $hasMany = array(
		'Group' => array('className' => 'Group', 'foreignKey' => 'queue_id'),
		'Ticket' => array('className' => 'Ticket', 'foreignKey' => 'queue_id')
	);
}
?>