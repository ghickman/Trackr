<?php
class TicketsController extends AppController {
	var $name = 'Tickets';
	var $components = array('Twitter');
	
	function __build_twitter_credentials($queue) {
	    $this->Twitter->username = Configure::read('Twitter.'.$queue.'.username');
	    $this->Twitter->password = Configure::read('Twitter.'.$queue.'.password');
	    if (!$this->Twitter->account_verify_credentials()) {
	        $this->Session->setFlash('A error occured with your twitter account credentials');
	        //logs!
	        $this->redirect(array('action' => 'index'));
	    }
	}
	
	function __tweet($name, $ticket) {
	    switch($name){
	        case "add":
	            $message = "New Ticket: ".$ticket;
	            break;
	        case "edit":
	            $message = "Ticket Edited: ".$ticket;
	            break;
	    }
	    return $message;
	}
    
	function index() {
		$this->Ticket->recursive = 0;
		$this->set('tickets', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid Ticket.');
			$this->redirect(array('action'=>'index'));
		}
		$ticket = $this->Ticket->read(null, $id);
		$comments = $this->Ticket->Comment->find('all', array('conditions'=>array('Comment.ticket_id'=>$id)));
		$this->set(compact('ticket', 'comments'));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Ticket->create();
			
			//add default queue and status
			$status = $this->Ticket->Status->find('first', array('conditions'=>array('Status.name'=>'pending'), 'fields'=>array('id')));
			$this->data['Ticket']['status_id'] = $status['Status']['id'];
			$queue = $this->Ticket->Queue->find('first', array('conditions'=>array('Queue.slug'=>'quick_fix'), 'fields'=>array('id', 'twitter_username')));
			$this->data['Ticket']['queue_id'] = $queue['Queue']['id'];
			
			//add user
			$this->data['Ticket']['user_id'] = $this->Auth->user('id');
			
			$this->__build_twitter_credentials($queue['Queue']['twitter_username']);
		    
		    if($this->Ticket->save($this->data)) {
		        $this->Session->setFlash('The Ticket has been saved');
			    
			    if(!$this->Twitter->status_update($this->__tweet('add', $this->data['Ticket']['title']))) {
			        $this->Session->setFlash('An error occurred while trying to tweet');
			        //logs!
			    }
			    
			    $this->redirect(array('action' => 'index'));
		    } else {
		        $this->Session->setFlash('The Ticket could not be saved. Please, try again.');
		    }
		}
		$applications = $this->Ticket->Application->find('list');
		$priorities = $this->Ticket->Priority->find('list');
		$this->set(compact('applications', 'priorities', 'credentials', 'queue'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Ticket');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
		    $this->data['Ticket']['slug'] = $this->slug($this->data['Ticket']['title']);
			if ($this->Ticket->save($this->data)) {
				$this->Session->setFlash('The Ticket has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Ticket could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Ticket->read(null, $id);
		}
		$applications = $this->Ticket->Application->find('list');
		$priorities = $this->Ticket->Priority->find('list');
		$users = $this->Ticket->User->find('list');
		$releases = $this->Ticket->Release->find('list', array('fields'=>'Release.date_of'));
		$statuses = $this->Ticket->Status->find('list');
		$queues = $this->Ticket->Queue->find('list');
		$this->set(compact('applications', 'priorities', 'queues', 'releases', 'statuses', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Ticket');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Ticket->del($id)) {
			$this->Session->setFlash('Ticket deleted');
			$this->redirect(array('action'=>'index'));
		}
	}
  
    function autoComplete() {
        Configure::write('debug', 0);
        $this->layout = 'ajax';

        $applications = $this->Ticket->Application->find('all', array('conditions'=>array('Application.name LIKE'=>$this->params['url']['q'].'%'), 'fields'=>array('name', 'id')));
        $this->set('applications', $applications);
    }
}
?>