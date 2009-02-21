<?php
class TicketsController extends AppController {
	var $name = 'Tickets';
	
	var $uses = array('Ticket', 'Application');
	var $components = array('Autocomplete');
    
	function beforeFilter() {
		$this->Auth->allow('*');
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
		$this->set('ticket', $this->Ticket->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Ticket->create();
			if ($this->Ticket->save($this->data)) {
				$this->Session->setFlash('The Ticket has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Ticket could not be saved. Please, try again.');
			}
		}
		$applications = $this->Ticket->Application->find('list');
		$users = $this->Ticket->User->find('list');
		$releases = $this->Ticket->Release->find('list', array('fields'=>'date_of'));
		$statuses = $this->Ticket->Status->find('list');
		$queues = $this->Ticket->Queue->find('list');
		$this->set(compact('applications', 'users', 'releases', 'statuses', 'queues'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Ticket');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
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
		$users = $this->Ticket->User->find('list');
		$releases = $this->Ticket->Release->find('list', array('fields'=>'Release.date_of'));
		$statuses = $this->Ticket->Status->find('list');
		$queues = $this->Ticket->Queue->find('list');
		$this->set(compact('applications','users','releases','statuses','queues'));
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
	
	function autocomplete() {
        //Partial strings will come from the autocomplete field as $this->data['Post']['subject']
        $this->set('tickets', $this->Ticket->Application->find('all', array('conditions' => array('Application.name LIKE' => $this->data['Application']['name'].'%'), 'fields' => array('name'))));
        $this->layout = 'ajax';
    }
    
	
	/*function autoComplete() {
	    //Configure::write('debug', 0);
	    , array('conditions'=>array('Application.name LIKE'=>$this->params['url']['q'].'%'), 'fields'=>array('name', 'id'))
	    $applications = $this->Ticket->Application->find('all', array(
	        'conditions'=>array('Application.name LIKE'=>$this->params['url']['q'].'%'),
	        'fields'=>array('name', 'id')
	    ));
	}*/
}
?>