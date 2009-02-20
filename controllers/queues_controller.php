<?php
class QueuesController extends AppController {
	var $name = 'Queues';
	
	function beforeFilter() {
		$this->Auth->allow('*');
	}

	function index() {
		$this->Queue->recursive = 0;
		$this->set('queues', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid Queue.');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('queue', $this->Queue->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Queue->create();
			if ($this->Queue->save($this->data)) {
				$this->Session->setFlash('The Queue has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Queue could not be saved. Please, try again.');
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Queue');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Queue->save($this->data)) {
				$this->Session->setFlash('The Queue has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Queue could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Queue->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Queue');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Queue->del($id)) {
			$this->Session->setFlash('Queue deleted');
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>