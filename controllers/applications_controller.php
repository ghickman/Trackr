<?php
class ApplicationsController extends AppController {
	var $name = 'Applications';

	function beforeFilter() {
		$this->Auth->allow('*');
	}
	
	function index() {
		$this->Application->recursive = 0;
		$this->set('applications', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid Application.');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('application', $this->Application->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Application->create();
			$this->data['Application']['slug'] = $this->slug($this->data['Application']['name']);
			if ($this->Application->save($this->data)) {
				$this->Session->setFlash('The Application has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Application could not be saved. Please, try again.');
			}
		}
		$releases = $this->Application->Release->find('list');
		$tickets = $this->Application->Ticket->find('list');
		$this->set(compact('releases', 'tickets'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid Application');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Application->save($this->data)) {
				$this->Session->setFlash('The Application has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The Application could not be saved. Please, try again.');
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
			$this->Session->setFlash('Invalid id for Application');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Application->del($id)) {
			$this->Session->setFlash('Application deleted');
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function autoComplete() {
	    //Configure::write('debug', 0);
	    
	    $applications = $this->Application->find('all', array(
	        'conditions'=>array('Application.name LIKE'=>$this->params['url']['q'].'%'),
	        'fields'=>array('name', 'id')
	    ));
	}
}
?>