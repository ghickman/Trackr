<?php
class Priority extends AppModel {
	var $name = 'Priority';
	
	var $hasMany = array('Ticket');
}
?>