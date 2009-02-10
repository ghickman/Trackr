<?php
class ReleasesController extends AppController {

	var $name = 'Releases';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Release->recursive = 0;
		$this->set('releases', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Release.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('release', $this->Release->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Release->create();
			if ($this->Release->save($this->data)) {
				$this->Session->setFlash(__('The Release has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Release could not be saved. Please, try again.', true));
			}
		}
		$applications = $this->Release->Application->find('list');
		$this->set(compact('applications'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Release', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Release->save($this->data)) {
				$this->Session->setFlash(__('The Release has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Release could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Release->read(null, $id);
		}
		$applications = $this->Release->Application->find('list');
		$this->set(compact('applications'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Release', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Release->del($id)) {
			$this->Session->setFlash(__('Release deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>