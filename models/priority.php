<?php
class Priority extends AppModel {
	var $name = 'Priority';
	
	var $hasAndBelongsToMany = array('Ticket');
}
?>