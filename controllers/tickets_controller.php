<?php
class TicketsController extends AppController {
	var $name = 'Tickets';
	var $components = array('Twitter');
	var $helpers = array('Time');
    
    /** index
     *
     */
	function index() {
		$this->Ticket->recursive = 0;
		$this->set('tickets', $this->paginate());
	}
    
    /** view
     *
     */
	function view($id = null) {
		if (!$id) {
			$this->Session->write('flash', array('Invalid Ticket', 'failure'));
			$this->redirect(array('action'=>'index'));
		}
		$ticket = $this->Ticket->read(null, $id);
		$comments = array_reverse($this->Ticket->Comment->find('all', array('conditions'=>array('Comment.ticket_id'=>$id))));
		$this->set(compact('ticket', 'comments', 'id'));
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
		    
		    if($this->Ticket->save($this->data)) {
		        $this->Session->write('flash', array('The Ticket has been saved', 'success'));
			    
			    $this->__build_twitter_credentials($queue['Queue']['twitter_username']);
			    if(!$this->Twitter->status_update($this->__tweet('add', $this->data['Ticket']['title'], $this->data['Ticket']['queue_id']))) {
			        $this->Session->write('flash', array('An error occurred while trying to tweet', 'failure'));
			        $this->log('An add-ticket tweet could not be sent', 'twitter');
			    }
			    
			    //$this->redirect(array('controller'=>'users', 'action'=>'home'));
		    } else {
		        $this->Session->write('flash', array('The Ticket could not be saved. Please, try again', 'failure'));
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
			$this->redirect($this->referer());
		}
		
		$ticket = $this->Ticket->read(null, $id);
		
		if (!empty($this->data)) {
		    $this->data['Ticket'] = $this->__parse_date_completed($this->data['Ticket'], $ticket['Ticket']);
    	    
		    //build array comparative to $this->data and compare
    	    if($this->__is_form_different_to_record($this->data['Ticket'], $ticket['Ticket'])) {
    	        
    		    //if($is_different)
    		    $this->__build_twitter_credentials($ticket['Queue']['twitter_username']);
    			if ($this->Ticket->save($this->data)) {
    				$this->Session->write('flash', array('The Ticket has been saved', 'success'));
    				if(!$this->Twitter->status_update($this->__tweet('edit', $this->data['Ticket']['title'], $id))) {
    			        $this->Session->write('flash', array('An error occurred while trying to tweet', 'failure'));
    			        $this->log('An edit-ticket tweet could not be sent', 'twitter');
    			    }
    				$this->redirect(array('controller'=>'users', 'action'=>'home'));
    			} else {
    				$this->Session->write('flash', array('The Ticket could not be saved. Please, try again', 'failure'));
    			}
    			//echo 'different, saved';
    	    } else {
    	        //echo 'same, ignored';
    	        $this->redirect(array('controller'=>'users', 'action'=>'home'));
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
	
	/** delete
	* 
	*/
	function delete($id = null) {
		if (!$id) {
			$this->Session->write('flash', array('Invalid id for Ticket', 'failure'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Ticket->del($id)) {
			$this->Session->write('flash', array('Ticket deleted', 'success'));
			$this->redirect(array('action'=>'index'));
		}
	}

    /** complete
     * 
     */
    function complete($id=null) {
        if(!$id) {
            $this->Session->write('flash', array('Incorrect Ticket id', 'failure'));
            $this->redirect($this->referer());
        }
        $ticket = $this->Ticket->read(null, $id);
        $ticket['Ticket']['date_completed'] = date('Y-m-d H:i:s');
        if($this->Ticket->save($ticket)) {
            $this->Session->write('flash', array('Ticket '.$ticket['Ticket']['id'].' completed', 'success'));
            $this->redirect($this->referer());
        } else {
            $this->Session->write('flash', array('Ticket '.$ticket['Ticket']['id'].' could not be completed', 'failure'));
            $this->redirect($this->referer());
        }
        
    }
    
    /** autoComplete
     * 
     */
    function autoComplete() {
        Configure::write('debug', 0);
        //$this->layout = 'ajax';

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
	        $this->Session->write('flash', array('A error occured with your twitter account credentials', 'failure'));
	        $this->redirect($this->referer());
	    }
	}
	
	/** __tweet
	 * 
	 */
	function __tweet($action, $ticket, $id=null) {
	    switch($action){
	        case "add":
	            $message = "New Ticket: ".$ticket." - ".$this->bitly('queues', 'view', $id);
	            break;
	        case "edit":
	            $message = "Ticket Edited: ".$ticket." - ".$this->bitly(Controller::name, $action, $id);
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
	    /*echo 'record';
	    pr($record);
	    echo 'form';
	    pr($form);
	    echo 'form, record';
	    pr(array_diff($form, $record));
	    echo 'record, form';
	    pr(array_diff($record, $form));*/
	    //do both ways around so can compare when form is different to record
	    //are the arrays different?
	    if(array_diff($form, $record) | array_diff($record, $form)) {
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