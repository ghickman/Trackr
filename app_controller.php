<?php
class AppController extends Controller {
    var $helpers = array('Html', 'Form', 'Javascript', 'Time', 'Mysession', 'Ajax');
    var $components = array('Auth', 'Acl', 'Twitter');
    var $uses = array('User');
	
	/**
	 * Controller beforeFilter callback.
	 * Called before all controller actions.
	 * Sets up the Auth component
	 * Populates the queue variable in the session with the currently logged in user
	 * @param void
	 * @return void
	 */
	function beforeFilter() {
	    $this->Auth->authorize = 'actions';
	    $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
	    $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
	    $this->Auth->loginRedirect = '/';
	    $this->Auth->actionPath = 'controllers/';
	    $this->Auth->allowedActions = array('home');
	    $this->Auth->authError = 'Sorry, you are not authorised to access this location';
	    
        if(!$this->Session->read('queue') && ($this->Auth->user('id'))) {
	        $user = $this->User->findById($this->Auth->user('id'));
	        $group = $this->User->Group->findById($user['User']['group_id']);
	        $queue = $this->User->Group->Queue->findById($group['Group']['queue_id']);
	        $this->Session->write('queue', $queue['Queue']['id']);
	    }
	}

    /**
     * Takes a string and replaces spaces with underscores and other non-alphanumeric
     * characters with spaces
     * @param $str
     * @return $str
     */
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
	 * Takes a string and returns the first 50 characters with ... at the end if the string
	 * is longer than 50 charachers.
	 * @param $str
	 * @return $str
	 */
	function string_slice($str, $length=null) {
	    if(!$length) $length = 50;
	    if(strlen($str) > $length) {
	        $str = substr($str, 0, $length);
    	    $str .= '...';
        }
	    return $str;
	}
	
	/**
	 * Constructs a URL using the id passed into the function, that points to 
	 * /tickets/view/ and submits it to URL for shortening
	 * @param $id
	 * @return $short_url
	 */
	function bitly($id) {
	    $url = 'http://';
	    if(env('HTTP_HOST') == Configure::read('env.dev')) $url .= Configure::read('env.dev').'/~madnashua/tellann';
	    elseif(env('HTTP_HOST') == Configure::read('env.prod')) $url .= Configure::read('env.prod');
        $url .= '/tickets/view/'.$id;
        $input = file_get_contents("http://api.bit.ly/shorten?version=2.0.1&longUrl=".urlencode($url)."&login=".Configure::read('Bitly.login')."&apiKey=".Configure::read('Bitly.apiKey'));
        $input = json_decode($input, true);
        return $input['results'][$url]['shortUrl'];
	}
	
	/**
	 * Checks the a twitter account credentials passed in
	 * Builds a tweet and includes a bit.ly shortened URL
	 * Updates the status of the twitter account passed in
	 * @param $twitter
	 * @return boolean
	 */
	function tweet($twitter) {
	    $this->Twitter->username = Configure::read('accounts.'.$twitter['queue'].'.username');
	    $this->Twitter->password = Configure::read('accounts.'.$twitter['queue'].'.password');
	    
	    if(!$this->Twitter->account_verify_credentials()) {
	        $this->Session->setFlash('A error occured with your twitter account credentials');
	        return false;
	    }
	    
	    $message = Configure::read('messages.'.strtolower($twitter['controller']).'.'.$twitter['action']).$this->string_slice($twitter['ticket']);
	    if($twitter['controller'] == 'Tickets') $message .= '('.$twitter['id'].')';
	    $message .= ' - '.$this->bitly($twitter['id']);
	    if($this->Twitter->status_update($message)) return true;
	        
	    return false;
	}
}
?>