<?php
class TicketsController extends AppController {
	var $name = 'Tickets';
	var $helpers = array('Time');
    
    /** view
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
    
    /** add
     * 
     */ 
	function add() {
		if (!empty($this->data)) {
			$this->Ticket->create();
			
			//add default queue/status and set the user
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
		//$applications = $this->Ticket->Application->find('all', array('conditions'=>array('Application.name LIKE'=>'Po%'), 'fields'=>array('name', 'id')));
        $applications = $this->Ticket->Application->find('list');
		$priorities = $this->Ticket->Priority->find('list');
		asort($priorities);
		$this->set(compact('applications', 'priorities'));
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
	
	/** delete
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

    /** complete
     * 
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

    /** autocomplete
     * 
     */
    function autocomplete() {
        Configure::write('debug', 0);
        $this->layout = 'ajax';

        $applications = $this->Ticket->Application->find('all', array('conditions'=>array('Application.name LIKE'=>$this->params['url']['q'].'%'), 'fields'=>array('name', 'id')));
        $this->set('applications', $applications);
    }
    
	/** __is_form_different_to_record
     * private function to find the difference between the submitted form data and what is in the database
     * 
     */
    function __is_form_different_to_record($form, $record) {
        unset($record['id'], $record['created'], $record['modified'], $record['user_id'], $record['application_id'], $record['priority_id']);
	    //if(array_diff($form, $record) || array_diff($record, $form)) return true;
	    if(!Set::isEqual($form, $record)) return true;
	    return false;
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