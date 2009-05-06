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
	
	/**
	 * login action which is 
	 */
	function login() {}
	
	/**
	 *
	 */
	function logout() {
		$this->Session->setFlash('Good-Bye');
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}

    /**
	 *
	 */
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

    /**
	 *
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid User.');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

    /**
	 *
	 */
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

    /**
	 *
	 */
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

    /**
     * 
     */
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
	
	/**
	 * The user's home page.
	 * Checks to see if are logged in and redirects the user to the login page if not
	 * Finds uncompleted tickets raised by the logged in user and passes them to the view
	 * @param void
	 * @param void
	 */
	function home() {
	    if(!$this->Auth->user()) $this->redirect(array('controller'=>'users', 'action'=>'login'));
	    $user = $this->Auth->user('id');
	    $tickets = $this->User->Ticket->find('all', array('conditions'=>array('User.id'=>$user, 'Ticket.date_completed'=>null)));
	    for($i=0;$i<count($tickets);$i++) {
	        $tickets[$i]['Ticket']['title'] = $this->string_slice($tickets[$i]['Ticket']['title'], 27);
	        $tickets[$i]['Ticket']['problem'] = $this->string_slice($tickets[$i]['Ticket']['problem']);
	    }
	    $this->set(compact('tickets'));
	}
	
	/**
	 * Allows a user to change their password
	 * @param void
	 * @return void
	 */
	function password() {
	    if(!empty($this->data)) {
    	    $user = $this->User->findById($this->Auth->user('id'));
    	    
    	    if($this->Auth->password($this->data['User']['old_password']) == $user['User']['password']) {
    	        if($this->data['User']['password'] == $this->data['User']['repeat_password']) {
    	            $this->data['User']['id'] = $this->Auth->user('id');
    	            $this->data['User']['password'] = $this->Auth->password($this->data['User']['password']);
    	            $this->data['User']['group_id'] = $user['User']['group_id'];
    	            if($this->User->save($this->data)) {
        	            $this->Session->setFlash('Your password has been changed');
        	            $this->redirect(array('controller'=>'users', 'action'=>'home'));
        	        } else {
        	            $this->Session->setFlash('Your password could not be changed');
        	            $this->redirect(array('controller'=>'users', 'action'=>'home'));
    	            }
    	        } else $this->Session->setFlash('Your passwords do not match, please try again');
    	    } else $this->Session->setFlash('Your password is incorrect, please try again');
	    }
	    
	    if (isset($this->data['User']['password'])) unset($this->data['User']['password']);
        if (isset($this->data['User']['repeat_password'])) unset($this->data['User']['password_confirm']);
        if (isset($this->data['User']['old_password'])) unset($this->data['User']['old_password']);
	}
}
?>