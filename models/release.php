<?php
class Release extends AppModel {

	var $name = 'Release';
	var $hasMany = array('Ticket' => array('className' => 'Ticket', 'foreignKey' => 'release_id'));
	var $hasAndBelongsToMany = array(
		'Application' => array(
			'className' => 'Application',
			'joinTable' => 'applications_releases',
			'foreignKey' => 'release_id',
			'associationForeignKey' => 'application_id'
		)
	);
}
?>