<?php
class UsersController extends AppController {
	var $name = 'Users';
	var $helpers = array('JqueryForm');
	
	function beforeFilter() {
		$this->Auth->allow('*');
	}
	
	function login() {
	    //Auth magikz
	}

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid User.');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('The User has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The User could not be saved. Please, try again.');
			}
		}
		$tickets = $this->User->Ticket->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('tickets', 'groups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid User');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('The User has been saved');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('The User could not be saved. Please, try again.');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$tickets = $this->User->Ticket->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('tickets','groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid id for User');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash('User deleted');
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function ajax_validate() {
	    Configure::write('debug', 0);
	    echo 'blah';
	    if($this->RequestHandler->isAjax()) {
	        $this->data['User'][$this->params['form']['field']] = $this->params['form']['value'];
	        $this->User->set($this->data);
	        if($this->User->validates()) {
	            $this->autoRender = false;
	        } else {
	            $errorArray = $this->validateErrors($this->User);
	            $this->set('error', $errorArray[$this->params['form']['field']]);
	        }
	    }
	}
}
?>