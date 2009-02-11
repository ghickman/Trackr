<?php 
/* SVN FILE: $Id$ */
/* Comment Test cases generated on: 2009-02-11 08:02:15 : 1234342515*/
App::import('Model', 'Comment');

class CommentTestCase extends CakeTestCase {
	var $Comment = null;
	var $fixtures = array('app.comment', 'app.ticket', 'app.user');

	function startTest() {
		$this->Comment =& ClassRegistry::init('Comment');
	}

	function testCommentInstance() {
		$this->assertTrue(is_a($this->Comment, 'Comment'));
	}

	function testCommentFind() {
		$this->Comment->recursive = -1;
		$results = $this->Comment->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Comment' => array(
			'id'  => 1,
			'text'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'ticket_id'  => 'Lorem ips',
			'user_id'  => 'Lorem ips',
			'created'  => '2009-02-11 08:55:15',
			'modified'  => '2009-02-11 08:55:15'
			));
		$this->assertEqual($results, $expected);
	}
}
?>