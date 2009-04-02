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
	    //$this->Auth->allowedActions = array('display');
	    $this->Auth->authError = 'Bad user, BAD';
    }

	function slug($str) {
		$str = strtolower(str_replace(' ', '_', $str));
		$pattern = "/[^a-zA-Z0-9_]/";
		$str = preg_replace($pattern, '', $str);
		return $str;
	}
	
	/**
	 * Takes a username string and returns it in lower case with the spaces coverted to periods.
	 * @param $str
	 * @return $str
	 */
	function username($str) {
	    $str = strtolower(str_replace(' ', '.', $str));
	    return $str;
	}
	
	/**
	 * Takes a string and returns the first 20 characters with ... at the end if the string
	 * is longer than 20 charachers.
	 * @param $str
	 * @return $str
	 */
	function string_slice($str) {
	    $length = 60;
	    if(strlen($str) > $length) {
	        $str = substr($str, 0, $length);
    	    $str = $str . '...';
        }
	    return $str;
	}
}
?>