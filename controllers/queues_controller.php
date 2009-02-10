<?php
class QueuesController extends AppController {

	var $name = 'Queues';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Queue->recursive = 0;
		$this->set('queues', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Queue.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('queue', $this->Queue->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Queue->create();
			if ($this->Queue->save($this->data)) {
				$this->Session->setFlash(__('The Queue has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Queue could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Queue', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Queue->save($this->data)) {
				$this->Session->setFlash(__('The Queue has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Queue could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Queue->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Queue', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Queue->del($id)) {
			$this->Session->setFlash(__('Queue deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>