<?php
class Application extends AppModel {

	var $name = 'Application';
	var $hasAndBelongsToMany = array(
		'Release' => array(
			'className' => 'Release',
			'joinTable' => 'applications_releases',
			'foreignKey' => 'application_id',
			'associationForeignKey' => 'release_id'
		)
	);
}
?>