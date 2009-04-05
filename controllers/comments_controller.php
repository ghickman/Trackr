<?php
class CommentsController extends AppController {
	var $name = 'Comments';
	
	function index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->paginate());
	}

    /** view
     * 
     */
    function view($id = null) {
		if (!$id) {
			$this->Session->write('flash', array('Invalid Comment', 'failure'));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('comment', $this->Comment->read(null, $id));
		
	}

    function add() {
		if (!empty($this->data)) {
			$this->Comment->create();
			$this->data['Comment']['user_id'] = $this->Auth->user('id');
			$queue = $this->data['Comment']['queue_id'];
			unset($this->data['Comment']['queue_id']);
			if ($this->Comment->save($this->data)) {
				$this->Session->write('flash', array('Your Comment has been saved', 'success'));
				
				$ticket = $this->Comment->Ticket->findById($this->data['Comment']['ticket_id']);
				$queue = $this->Comment->Ticket->Queue->findById($queue);
				$twitter = array('controller'=>$this->name, 'action'=>'add', 'id'=>$ticket['Ticket']['id'].'#comment-'.$this->Comment->id, 'ticket'=>$ticket['Ticket']['title'], 'queue'=>$queue['Queue']['twitter_username']);
				if(!$this->tweet($twitter)) {
				    $this->Session->write('flash', array('An error occurred while trying to tweet', 'failure'));
			        $this->log('An add-comment tweet could not be sent', 'twitter');
				}
				$this->redirect($this->referer());
			} else {
				$this->Session->write('flash', array('Your Comment could not be saved. Please, try again', 'failure'));
			}
		}
		$this->set(compact('tickets', 'users'));
	}
}
?>