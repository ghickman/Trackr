<?php
class Application extends AppModel {
	var $name = 'Application';

	var $hasAndBelongsToMany = array('Release', 'Ticket');
}
?>