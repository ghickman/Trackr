<?php
class TicketsController extends AppController {
	var $name = 'Tickets';
	var $components = array('Twitter');
    
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
    
    /** add
     * 
     */ 
	function add() {
		if (!empty($this->data)) {
			$this->Ticket->create();
			
			//add default queue and status
			$status = $this->Ticket->Status->find('first', array('conditions'=>array('Status.name'=>'pending'), 'fields'=>array('id')));
			$this->data['Ticket']['status_id'] = $status['Status']['id'];
			$queue = $this->Ticket->Queue->find('first', array('conditions'=>array('Queue.slug'=>'quick_fix'), 'fields'=>array('id', 'twitter_username')));
			$this->data['Ticket']['queue_id'] = $queue['Queue']['id'];
			
			//add current user
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
    
    /** edit
     * 
     */
	function edit($id = null) {		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Ticket');
			$this->redirect(array('action'=>'index'));
		}
		
		$ticket = $this->Ticket->read(null, $id);
		
		if (!empty($this->data)) {
		    $this->data['Ticket'] = $this->__parse_date_completed($this->data['Ticket'], $ticket['Ticket']);
    	    
		    //build array comparative to $this->data and compare
    	    if($this->__is_form_different_to_record($this->data['Ticket'], $ticket['Ticket'])) {
    		    
    		    //$this->__build_twitter_credentials($ticket['Queue']['twitter_username']);
    			if ($this->Ticket->save($this->data)) {
    				$this->Session->setFlash('The Ticket has been saved');
    				/*if(!$this->Twitter->status_update($this->__tweet('edit', $this->data['Ticket']['title']))) {
    			        $this->Session->setFlash('An error occurred while trying to tweet');
    			        //logs!
    			    }*/
    				$this->redirect(array('action'=>'index'));
    			} else {
    				$this->Session->setFlash('The Ticket could not be saved. Please, try again.');
    			}
    	    } else {
    	        $this->redirect(array('action'=>'index'));
    	    }
		}
		
		if (empty($this->data)) {
			$this->data = $ticket;
		}		
		
		$releases = $this->Ticket->Release->find('list', array('fields'=>'Release.date_of'));
		$statuses = $this->Ticket->Status->find('list');
		$queues = $this->Ticket->Queue->find('list');
		$this->set(compact('queues', 'releases', 'statuses'));
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
    
    /** autoComplete
     * 
     */
    function autoComplete() {
        Configure::write('debug', 0);
        $this->layout = 'ajax';

        $applications = $this->Ticket->Application->find('all', array('conditions'=>array('Application.name LIKE'=>$this->params['url']['q'].'%'), 'fields'=>array('name', 'id')));
        $this->set('applications', $applications);
    }
    
    /** __build_twitter_credentials
     * 
     */
    function __build_twitter_credentials($queue) {
	    $this->Twitter->username = Configure::read('Twitter.'.$queue.'.username');
	    $this->Twitter->password = Configure::read('Twitter.'.$queue.'.password');
	    if (!$this->Twitter->account_verify_credentials()) {
	        $this->Session->setFlash('A error occured with your twitter account credentials');
	        //logs!
	        $this->redirect(array('action' => 'index'));
	    }
	}
	
	/** __tweet
	 * 
	 */
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
	
	/** __is_form_different_to_record
     * private function to find the difference between the submitted form data and what is in the database
     * 
     */
    function __is_form_different_to_record($form, $record) {
        //clean up the record array to only include
        unset($record['id']);
	    unset($record['created']);
	    unset($record['modified']);
	    unset($record['user_id']);
	    
	    //just for testing - need to make this reflect the current one
	    $form['release_id'] = null;
	    
	    //do both ways around so can compare when form is different to record
	    //are the arrays different?
	    if(array_diff($form, $record) | array_diff($record, $form)) {
	    //if(array_diff($record, $form)) {
	        return true; //yes
	    } else {
	        return false; //no
	    }
    }
    
    /** __parse_date_completed
     * This function replaces a boolean true with a date and a false with a null
     * @return an array formatted in the style of $this->data with the correct fields ready to save to the database
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