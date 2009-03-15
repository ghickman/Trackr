<?php
class ReleasesController extends AppController {
	var $name = 'Releases';

	function index() {
		$this->Release->recursive = 0;
		$this->set('releases', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid Release.');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('release', $this->Release->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Release->create();
			if ($this->Release->save($this->data)) {
				$this->Session->setFlash('The Release has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Release could not be saved. Please, try again.');
			}
		}
		$applications = $this->Release->Application->find('list');
		$this->set(compact('applications'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Release');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Release->save($this->data)) {
				$this->Session->setFlash('The Release has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Release could not be saved. Please, try again.');
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
			$this->Session->setFlash('Invalid id for Release');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Release->del($id)) {
			$this->Session->setFlash('Release deleted');
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>