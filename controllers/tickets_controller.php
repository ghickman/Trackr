<?php
class TicketsController extends AppController {
	var $name = 'Tickets';
	var $helpers = array('Time');
    
    /**
     *
     */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid Ticket');
			$this->redirect(array('action'=>'index'));
		}
		$ticket = $this->Ticket->read(null, $id);
		$comments = array_reverse($this->Ticket->Comment->find('all', array('conditions'=>array('Comment.ticket_id'=>$id))));
		$this->set(compact('ticket', 'comments', 'id'));
	}
    
    /**
     * Adds a ticket with the data submitted from the view form
     * Defaults are added to the array for status and queue with the user's id set from the Auth component's session.
     * @param void
     * @return void
     */ 
	function add() {
		if (!empty($this->data)) {
			$this->Ticket->create();
			$status = $this->Ticket->Status->find('first', array('conditions'=>array('Status.name'=>'pending'), 'fields'=>array('id')));
			$queue = $this->Ticket->Queue->find('first', array('conditions'=>array('Queue.slug'=>'kingswood_BAU'), 'fields'=>array('id', 'twitter_username')));
			$this->data['Ticket']['status_id'] = $status['Status']['id'];
			$this->data['Ticket']['queue_id'] = $queue['Queue']['id'];
			$this->data['Ticket']['user_id'] = $this->Auth->user('id');   
		    
		    if($this->Ticket->save($this->data)) {
		        $this->Session->setFlash('The Ticket has been saved');
                $twitter = array('controller'=>$this->name, 'action'=>'add', 'id'=>$this->Ticket->id, 'ticket'=>$this->data['Ticket']['title'], 'queue'=>$queue['Queue']['twitter_username']);
			    if(!$this->tweet($twitter)) {
			        $this->Session->setFlash('An error occurred while trying to tweet');
			        $this->log('An add-ticket tweet could not be sent', 'twitter');
			    }
			    $this->redirect(array('controller'=>'users', 'action'=>'home'));
		    } else $this->Session->setFlash('The Ticket could not be saved. Please, try again');
		}
        $applications = $this->Ticket->Application->find('list');
		$priorities = $this->Ticket->Priority->find('list', array('fields'=>array('Priority.id', 'Priority.name')));
		asort($priorities);
		$this->set(compact('applications', 'priorities'));
	}
    
    /**
     * Edits a ticket
     * If the form is submitted without changes nothing is written to the database and twitter is not updated.
     * @param $id
     * @return void
     */
	function edit($id = null) {		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Ticket');
			$this->redirect($this->referer());
		}
		
		$ticket = $this->Ticket->read(null, $id);
		
		if (!empty($this->data)) {
		    $this->data['Ticket'] = $this->__parse_date_completed($this->data['Ticket'], $ticket['Ticket']);
    	    if($this->__is_form_different_to_record($this->data['Ticket'], $ticket['Ticket'])) {
    			if ($this->Ticket->save($this->data)) {
    				$this->Session->setFlash('The Ticket has been saved');
    				$queue = $this->Ticket->Queue->findById($this->data['Ticket']['queue_id']);
    				
    				if($this->data['Ticket']['date_completed'] ==null) $twitter = array('controller'=>$this->name, 'action'=>'edit', 'id'=>$this->Ticket->id, 'ticket'=>$this->data['Ticket']['title'], 'queue'=>$queue['Queue']['twitter_username']);
    				else $twitter = array('controller'=>$this->name, 'action'=>'complete', 'id'=>$this->Ticket->id, 'ticket'=>$this->data['Ticket']['title'], 'queue'=>$queue['Queue']['twitter_username']);
    				
    				if(!$this->tweet($twitter)) {
    			        $this->Session->setFlash('An error occurred while trying to tweet');
    			        $this->log('An edit-ticket tweet could not be sent', 'twitter');
    			    }
    				$this->redirect(array('controller'=>'users', 'action'=>'home'));
    			} else $this->Session->setFlash('The Ticket could not be saved. Please, try again');
    	    } else $this->redirect(array('controller'=>'users', 'action'=>'home'));
		}
		
		if (empty($this->data)) $this->data = $ticket;
        
		$release = $ticket['Ticket']['release_id'];
		$releases = $this->Ticket->Release->find('list', array('fields'=>'Release.date_of'));
		$statuses = $this->Ticket->Status->find('list');
		$queues = $this->Ticket->Queue->find('list');
		$this->set(compact('queues', 'releases', 'release', 'statuses'));
	}
	
	/**
	 * 
	 */
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

    /**
     * Completes a ticket and sets the current date as the date it was completed
     * @param $id
     * @return void
     */
    function complete($id=null) {
        if(!$id) {
            $this->Session->setFlash('Incorrect Ticket id');
            $this->redirect($this->referer());
        }
        $ticket = $this->Ticket->read(null, $id);
        $ticket['Ticket']['date_completed'] = date('Y-m-d H:i:s');
        if($this->Ticket->save($ticket)) {
            $this->Session->setFlash('Ticket '.$ticket['Ticket']['id'].' completed');
            
            $ticket = $this->Ticket->findById($this->Ticket->id);
            $queue = $this->Ticket->Queue->findById($ticket['Ticket']['queue_id']);
            $twitter = array('controller'=>$this->name, 'action'=>'complete', 'id'=>$this->Ticket->id, 'ticket'=>$ticket['Ticket']['title'], 'queue'=>$queue['Queue']['twitter_username']);
		    if(!$this->tweet($twitter)) {
		        $this->Session->setFlash('An error occurred while trying to tweet');
		        $this->log('An complete-ticket tweet could not be sent', 'twitter');
		    }
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash('Ticket '.$ticket['Ticket']['id'].' could not be completed');
            $this->redirect($this->referer());
        }    
    }


    
	/**
     * private function to find the difference between the submitted form data and what is in the database
     * @param $form, $record
     * @return boolean
     */
    function __is_form_different_to_record($form, $record) {
        unset($record['id'], $record['created'], $record['modified'], $record['user_id'], $record['application_id'], $record['priority_id']);
	    if(!Set::isEqual($form, $record)) return true;
	    return false;
    }
    
    /**
     * This function replaces a boolean true with a date and a false with a null
     * @param $form, $record
     * @return $form
     */
    function __parse_date_completed($form, $record) {
        if(!$form['date_completed'] || (!$form['date_completed'] && $record['date_completed'])) {
            $form['date_completed'] = null;
        } else if($form['date_completed'] && !$record['date_completed']) {
            $form['date_completed'] = date('Y-m-d H:i:s');
        } else if($form['date_completed'] && $record['date_completed']) {
            $form['date_completed'] = $record['date_completed'];
        }
	    return $form;
    }
}
?>