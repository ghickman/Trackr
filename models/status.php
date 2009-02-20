<?php
class Status extends AppModel {
	var $name = 'Status';

	var $hasMany = array('Ticket');
}
?>