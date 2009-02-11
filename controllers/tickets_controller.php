<?php
class TicketsController extends AppController {

	var $name = 'Tickets';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Ticket->recursive = 0;
		$this->set('tickets', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Ticket.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('ticket', $this->Ticket->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Ticket->create();
			if ($this->Ticket->save($this->data)) {
				$this->Session->setFlash(__('The Ticket has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Ticket could not be saved. Please, try again.', true));
			}
		}
		$applications = $this->Ticket->Application->find('list');
		$users = $this->Ticket->User->find('list');
		$releases = $this->Ticket->Release->find('list');
		$statuses = $this->Ticket->Status->find('list');
		$queues = $this->Ticket->Queue->find('list');
		$this->set(compact('applications', 'users', 'releases', 'statuses', 'queues'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Ticket', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Ticket->save($this->data)) {
				$this->Session->setFlash('The Ticket has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Ticket could not be saved. Please, try again.', true));
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
			$this->Session->setFlash(__('Invalid id for Ticket', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Ticket->del($id)) {
			$this->Session->setFlash(__('Ticket deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>