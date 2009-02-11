<?php
class ApplicationsController extends AppController {

	var $name = 'Applications';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Application->recursive = 0;
		$this->set('applications', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Application.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('application', $this->Application->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Application->create();
			if ($this->Application->save($this->data)) {
				$this->Session->setFlash(__('The Application has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Application could not be saved. Please, try again.', true));
			}
		}
		$releases = $this->Application->Release->find('list');
		$tickets = $this->Application->Ticket->find('list');
		$this->set(compact('releases', 'tickets'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Application', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Application->save($this->data)) {
				$this->Session->setFlash(__('The Application has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Application could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Application->read(null, $id);
		}
		$releases = $this->Application->Release->find('list');
		$tickets = $this->Application->Ticket->find('list');
		$this->set(compact('releases','tickets'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Application', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Application->del($id)) {
			$this->Session->setFlash(__('Application deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>