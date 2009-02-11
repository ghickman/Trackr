<?php 
/* SVN FILE: $Id$ */
/* Comment Fixture generated on: 2009-02-11 08:02:15 : 1234342515*/

class CommentFixture extends CakeTestFixture {
	var $name = 'Comment';
	var $table = 'comments';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'text' => array('type'=>'text', 'null' => true, 'default' => NULL),
			'ticket_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 11),
			'user_id' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 11),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'text'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'ticket_id'  => 'Lorem ips',
			'user_id'  => 'Lorem ips',
			'created'  => '2009-02-11 08:55:15',
			'modified'  => '2009-02-11 08:55:15'
			));
}
?>