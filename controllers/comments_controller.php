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
				/*
                $this->__build_twitter_credentials($queue);
    		    if(!$this->Twitter->status_update($this->__tweet('complete', $ticket['Ticket']['title'], $ticket['Ticket']['id']))) {
    		        $this->Session->write('flash', array('An error occurred while trying to tweet', 'failure'));
    		        $this->log('An complete-ticket tweet could not be sent', 'twitter');
    		    }*/
    		    
				$this->redirect($this->referer());
			} else {
				$this->Session->write('flash', array('Your Comment could not be saved. Please, try again', 'failure'));
			}
		}
		$this->set(compact('tickets', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Comment');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash('The Comment has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Comment could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Comment->read(null, $id);
		}
		$tickets = $this->Comment->Ticket->find('list');
		$users = $this->Comment->User->find('list');
		$this->set(compact('tickets','users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Comment');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Comment->del($id)) {
			$this->Session->setFlash('Comment deleted');
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>