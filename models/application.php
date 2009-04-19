<?php
class Application extends AppModel {
	var $name = 'Application';

	var $hasMany = array('Ticket');
}
?>