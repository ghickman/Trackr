<?php
class Release extends AppModel {
	var $name = 'Release';

	var $hasMany = array('Ticket');
}
?>