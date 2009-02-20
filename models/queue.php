<?php
class Queue extends AppModel {
	var $name = 'Queue';

	var $hasMany = array('Group', 'Ticket');
}
?>