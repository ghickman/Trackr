<?php
class AppController extends Controller {
    var $helpers = array('Html', 'Form', 'Javascript', 'Time', 'Mysession');
    var $components = array('Auth');
	
    function beforeFilter() {		
	    //$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
	    //$this->Auth->logoutRedirect = array('controller' => 'posts', 'action' => 'index');
	    //$this->Auth->loginRedirect = array('controller'=>'tickets', 'action'=>'index');
    }

	function slug($str) {
		$str = strtolower(str_replace(' ', '_', $str));
		$pattern = "/[^a-zA-Z0-9_]/";
		$str = preg_replace($pattern, '', $str);
		return $str;
	}
}
?>