<?php
class StatusesController extends AppController {
	var $name = 'Statuses';
    
	function beforeFilter() {
		$this->Auth->allow('*');
	}
	
	function index() {
		$this->Status->recursive = 0;
		$this->set('statuses', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid Status.');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('status', $this->Status->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Status->create();
			$this->data['Status']['slug'] = $this->slug($this->data['Status']['name']);
			if ($this->Status->save($this->data)) {
				$this->Session->setFlash('The Status has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Status could not be saved. Please, try again.');
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Status');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Status->save($this->data)) {
				$this->Session->setFlash('The Status has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Status could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Status->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Status');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Status->del($id)) {
			$this->Session->setFlash('Status deleted');
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>