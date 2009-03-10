<?php
class PrioritiesController extends AppController {

	var $name = 'Priorities';
	var $helpers = array('Html', 'Form');
	
	/**
	 * Controller beforeFilter callback.
	 * Called before the controller action. 
	 * 
	 * @return void
	 */
	function beforeFilter() {
	   $this->Auth->allow('*');
	}
	

	function index() {
		$this->Priority->recursive = 0;
		$this->set('priorities', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Priority.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('priority', $this->Priority->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Priority->create();
			$this->data['Priority']['slug'] = $this->slug($this->data['Priority']['name']);
			if ($this->Priority->save($this->data)) {
				$this->Session->setFlash(__('The Priority has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Priority could not be saved. Please, try again.', true));
			}
		}
		$tickets = $this->Priority->Ticket->find('list');
		$this->set(compact('tickets'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Priority', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Priority->save($this->data)) {
				$this->Session->setFlash(__('The Priority has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Priority could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Priority->read(null, $id);
		}
		$tickets = $this->Priority->Ticket->find('list');
		$this->set(compact('tickets'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Priority', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Priority->del($id)) {
			$this->Session->setFlash(__('Priority deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>