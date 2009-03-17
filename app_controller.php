<?php
class AppController extends Controller {
    var $helpers = array('Html', 'Form', 'Javascript', 'Time', 'Mysession', 'Ajax');
    var $components = array('Auth', 'Acl', 'DebugKit.Toolbar');
	
    function beforeFilter() {
        $this->Auth->authorize = 'actions';
	    $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
	    $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
	    $this->Auth->loginRedirect = array('controller'=>'users', 'action'=>'home');
	    $this->Auth->actionPath = 'controllers/';
	    $this->Auth->allowedActions = array('display');
    }

	function slug($str) {
		$str = strtolower(str_replace(' ', '_', $str));
		$pattern = "/[^a-zA-Z0-9_]/";
		$str = preg_replace($pattern, '', $str);
		return $str;
	}
}
?>