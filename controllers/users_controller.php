<?php
class UsersController extends AppController {
	var $name = 'Users';
	var $helpers = array('JqueryForm');
	
	/**
	 * Controller beforeFilter callback.
	 * Called before the controller action. 
	 * 
	 * @return void
	 */
	function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('logout');
	}
	
	
	function login() {
	    //Auth magikz
	}
	
	function logout() {
		$this->Session->setFlash('Good-Bye');
		$this->redirect($this->Auth->logout());
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
			$this->data['User']['slug'] = $this->slug($this->data['User']['username']);
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
	
	function home() {
	    $test = $this->Session->read();
	    $user = $this->Session->read('Auth.User.id');
	    $group = $this->User->read(null, $this->Session->read('Auth.User.id'));
	    $queue = $this->User->Group->Queue->find('list', array('conditions'=>array('Queue.id'=>$group['Group']['queue_id'])));
	    $queue = array_keys($queue);
	    $tickets = $this->User->Ticket->find('all', array('conditions'=>array('User.id'=>$user)));
	    $this->set(compact('user', 'tickets', 'group', 'queue', 'test'));
	}
}
?>