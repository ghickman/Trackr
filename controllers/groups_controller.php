<?php
class GroupsController extends AppController {
	var $name = 'Groups';
	
	/**
	 * Controller beforeFilter callback.
	 * Called before the controller action. 
	 * 
	 * @return void
	 */
	function beforeFilter() {
	    parent::beforeFilter();
	    //$this->Auth->allow('add');
	}
	
	
	function index() {
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid Group.');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('group', $this->Group->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Group->create();
			$this->data['Group']['slug'] = $this->slug($this->data['Group']['name']);
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash('The Group has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Group could not be saved. Please, try again.');
			}
		}
		$queues = $this->Group->Queue->find('list');
		$this->set(compact('queues'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Group');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash('The Group has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Group could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Group->read(null, $id);
		}
		$queues = $this->Group->Queue->find('list');
		$this->set(compact('queues'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Group');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Group->del($id)) {
			$this->Session->setFlash('Group deleted');
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>