<?php
class Comment extends AppModel {
	var $name = 'Comment';

	var $belongsTo = array('Ticket', 'User');
}
?>