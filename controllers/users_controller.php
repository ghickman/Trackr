<?php
class UsersController extends AppController {
	var $name = 'Users';
	var $helpers = array('JqueryForm');
	
	/** beforeFilter
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
	 *
	 */
	function login() {
	    //Authentication Component login magic. Leave blank!
	}
	
	/** logout
	 *
	 */
	function logout() {
		$this->Session->setFlash('Good-Bye');
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());
	}

    /** index
	 *
	 */
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

    /** view
	 *
	 */
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Invalid User.');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

    /** add
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

    /** edit
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

    /** delete
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
	
	/** ajax_validate
	 *
	 */
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
	
	/** home
	 *
	 */
	function home() {
	    $user = $this->Auth->user('id');
	    $tickets = $this->User->Ticket->find('all', array('conditions'=>array('User.id'=>$user, 'Ticket.date_completed'=>null)));
	    for($i=0;$i<count($tickets);$i++) {
	        $tickets[$i]['Ticket']['problem'] = $this->string_slice($tickets[$i]['Ticket']['problem']);
	    }
	    $this->set(compact('tickets'));
	}
	
	/** password
	 * 
	 */
	function password() {
	    if(!empty($this->data)) {
    	    $user = $this->User->findById($this->Auth->user('id'));
    	    
    	    if($this->Auth->password($this->data['User']['old_password']) == $user['User']['password']) {
    	        if($this->data['User']['password'] == $this->data['User']['repeat_password']) {
    	            //new_password and repeat_password are the same
    	            $this->data['User']['id'] = $this->Auth->user('id');
    	            $this->data['User']['password'] = $this->Auth->password($this->data['User']['password']);
    	            $this->data['User']['group_id'] = $user['User']['group_id'];
    	            if($this->User->save($this->data)) {
        	            $this->Session->write('flash', array('Your password has been changed', 'success'));
        	            $this->redirect(array('controller'=>'users', 'action'=>'home'));
        	        } else {
        	            $this->Session->write('flash', array('Your password could not be changed', 'failure'));
        	            $this->redirect(array('controller'=>'users', 'action'=>'home'));
    	            }
    	        } else {
    	            $this->Session->write('flash', array('Your passwords do not match, please try again', 'failure'));
    	        }
    	    } else {
    	        $this->Session->write('flash', array('Your password is incorrect, please try again', 'failure'));
    	    }
	    }
	    
	    if (isset($this->data['User']['password'])) unset($this->data['User']['password']);
        if (isset($this->data['User']['repeat_password'])) unset($this->data['User']['password_confirm']);
        if (isset($this->data['User']['old_password'])) unset($this->data['User']['old_password']);
	}
}
?>