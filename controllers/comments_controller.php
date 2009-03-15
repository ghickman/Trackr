<?php
class CommentsController extends AppController {
	var $name = 'Comments';
	
	function index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid Comment.');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('comment', $this->Comment->read(null, $id));
		
	}

	function add() {
		if (!empty($this->data)) {
			$this->Comment->create();
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash('The Comment has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Comment could not be saved. Please, try again.');
			}
		}
		$tickets = $this->Comment->Ticket->find('list');
		$users = $this->Comment->User->find('list');
		$this->set(compact('tickets', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Comment');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash('The Comment has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Comment could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Comment->read(null, $id);
		}
		$tickets = $this->Comment->Ticket->find('list');
		$users = $this->Comment->User->find('list');
		$this->set(compact('tickets','users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for Comment');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Comment->del($id)) {
			$this->Session->setFlash('Comment deleted');
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>