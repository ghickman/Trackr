<?php
class AppController extends Controller {
    var $helpers = array('Html', 'Form', 'Javascript', 'Time', 'Mysession', 'Ajax');
    var $components = array('Auth', 'Acl', 'DebugKit.Toolbar', 'Twitter');
    var $uses = array('User');
	
	/** beforeFilter
	 * Controller beforeFilter callback.
	 * Called before the controller action. 
	 * 
	 * @return void
	 */
	function beforeFilter() {
	    $this->Auth->authorize = 'actions';
	    $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
	    $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
	    $this->Auth->loginRedirect = array('controller'=>'users', 'action'=>'home');
	    $this->Auth->actionPath = 'controllers/';
	    //$this->Auth->allowedActions = array('display');
	    $this->Auth->authError = 'Bad user, BAD';
	    
        if(!$this->Session->read('queue') && ($this->Auth->user('id'))) {
	        $user = $this->User->findById($this->Auth->user('id'));
	        $group = $this->User->Group->findById($user['User']['group_id']);
	        $queue = $this->User->Group->Queue->findById($group['Group']['queue_id']);
	        $this->Session->write('queue', $queue['Queue']['id']);
	    }
	}

    /** slug
     * 
     */
	function slug($str) {
		$str = strtolower(str_replace(' ', '_', $str));
		$pattern = "/[^a-zA-Z0-9_]/";
		$str = preg_replace($pattern, '', $str);
		return $str;
	}
	
	/** username
	 * Takes a username string and returns it in lower case with the spaces coverted to periods.
	 * @param $str
	 * @return $str
	 */
	function username($str) {
	    $str = strtolower(str_replace(' ', '.', $str));
	    return $str;
	}
	
	/** string_slice
	 * Takes a string and returns the first 20 characters with ... at the end if the string
	 * is longer than 20 charachers.
	 * @param $str
	 * @return $str
	 */
	function string_slice($str, $length=null) {
	    if(!$length) $length = 60;
	    if(strlen($str) > $length) {
	        $str = substr($str, 0, $length);
    	    $str = $str . '...';
        }
	    return $str;
	}
	
	/** bitly
	 * Constructs a url from the controller, action and id of the calling action and returns a shortened url from bit.ly
	 * 
	 * @return $short_url
	 */
	function bitly($id) {
	    $url = 'http://';
	    if(env('HTTP_HOST') == Configure::read('env.dev')) {
	        $url .= Configure::read('env.dev').'/~madnashua/tellann';
	    } elseif(env('HTTP_HOST') == Configure::read('env.prod')) {
	        $url .= Configure::read('env.prod');
	    }
        $url .= '/tickets/view/'.$id;
        $input = file_get_contents("http://api.bit.ly/shorten?version=2.0.1&longUrl=".urlencode($url)."&login=".Configure::read('Bitly.login')."&apiKey=".Configure::read('Bitly.apiKey'));
        $input = json_decode($input, true);
        return $input['results'][$url]['shortUrl'];
	}
	
	/** tweet
	 * 
	 */
	function tweet($twitter) {
	    //build credentials
	    $this->Twitter->username = Configure::read('accounts.'.$twitter['queue'].'.username');
	    $this->Twitter->password = Configure::read('accounts.'.$twitter['queue'].'.password');
	    
	    //check credentials
	    if($this->Twitter->account_verify_credentials()) {
	        //build message
    	    $message = Configure::read('messages.'.strtolower($twitter['controller']).'.'.$twitter['action']).$this->string_slice($twitter['ticket']);
    	    if($twitter['controller'] == 'Tickets') $message .= '('.$twitter['id'].')';
    	    $message .= ' - '.$this->bitly($twitter['id']);
	        
	        //tweet message
    	    if($this->Twitter->status_update($message)) {
    	        return true;
    	    } else {
    	        return false;
    	    }
	    } else {
	        $this->Session->write('flash', array('A error occured with your twitter account credentials', 'failure'));
	        return false;
	    }
	}
}
?>