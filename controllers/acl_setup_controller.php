<?php
class AclSetupController extends AppController {
    var $name = 'AclSetup';
    var $uses = array();
    
    /**
     * Controller beforeFilter callback.
     * Called before the controller action. 
     * 
     * @return void
     */
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('*');
    }
    
    function administrators_build() {
        $this->Acl->allow(array('Group'=>array('id'=>1)), 'controllers');
    }
    
    function administrators() {
        //$this->__administrators_build();
        $admin = $this->Acl->check(array('Group'=>array('id'=>1)), 'controllers');
        $this->set(compact('admin'));
    }
    
    function support_build() {        
        $this->Acl->deny(array('Group'=>array('id'=>2)), 'controllers');
        
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Applications/add');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Applications/edit');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Applications/view');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Applications/index');
        
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Comments/add');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Comments/edit');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Comments/view');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Comments/index');
        
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Groups/view');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Groups/index');
        
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Priorities/add');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Priorities/edit');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Priorities/view');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Priorities/index');
        
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Queues/add');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Queues/edit');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Queues/view');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Queues/index');
        
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Releases/add');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Releases/edit');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Releases/view');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Releases/index');
        
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Statuses/add');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Statuses/edit');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Statuses/view');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Statuses/index');
        
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Tickets/add');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Tickets/edit');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Tickets/view');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Tickets/index');
        
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Users/view');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Users/index');
        $this->Acl->allow(array('Group'=>array('id'=>2)), 'controllers/Users/home');
    }
    
    function support() {
        //$this->__support_build();
        
        $controllers = $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers');
        
        $applications = $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Applications/add');
        $applications .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Applications/edit');
        $applications .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Applications/view');
        $applications .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Applications/index');
        
        $comments = $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Comments/add');
        $comments .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Comments/edit');
        $comments .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Comments/view');
        $comments .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Comments/index');
        
        $groups = $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Groups/view');
        $groups .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Groups/index');
        
        $priorities = $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Priorities/add');
        $priorities .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Priorities/edit');
        $priorities .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Priorities/view');
        $priorities .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Priorities/index');
        
        $queues = $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Queues/add');
        $queues .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Queues/edit');
        $queues .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Queues/view');
        $queues .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Queues/index');
        
        $releases = $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Releases/add');
        $releases .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Releases/edit');
        $releases .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Releases/view');
        $releases .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Releases/index');
        
        $statuses = $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Statuses/add');
        $statuses .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Statuses/edit');
        $statuses .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Statuses/view');
        $statuses .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Statuses/index');
        
        $tickets = $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Tickets/add');
        $tickets .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Tickets/edit');
        $tickets .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Tickets/view');
        $tickets .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Tickets/index');
        
        $users = $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Users/view');
        $users .= $this->Acl->check(array('Group'=>array('id'=>2)), 'controllers/Users/index');
        
        $this->set(compact('controllers', 'applications', 'comments', 'groups', 'priorities', 'queues', 'releases', 'statuses', 'tickets', 'users'));
    }
    
    function business_build() {
        $this->Acl->deny(array('Group'=>array('id'=>3)), 'controllers');
        
        $this->Acl->allow(array('Group'=>array('id'=>3)), 'controllers/Comments/add');
        $this->Acl->allow(array('Group'=>array('id'=>3)), 'controllers/Comments/view');
        
        $this->Acl->allow(array('Group'=>array('id'=>3)), 'controllers/Tickets/add');
        $this->Acl->allow(array('Group'=>array('id'=>3)), 'controllers/Tickets/view');
        
        $this->Acl->allow(array('Group'=>array('id'=>3)), 'controllers/Users/home');
    }
    
    function business() {
        //$this->__business_build();
        
        $controllers = $this->Acl->check(array('Group'=>array('id'=>3)), 'controllers');
        
        $comments = $this->Acl->check(array('Group'=>array('id'=>3)), 'controllers/Comments/add');
        $comments .= $this->Acl->check(array('Group'=>array('id'=>3)), 'controllers/Comments/view');
        
        $tickets = $this->Acl->check(array('Group'=>array('id'=>3)), 'controllers/Tickets/add');
        $tickets .= $this->Acl->check(array('Group'=>array('id'=>3)), 'controllers/Tickets/view');
        
        $users = $this->Acl->check(array('Group'=>array('id'=>3)), 'controllers/Users/home');
        
        $this->set(compact('controllers', 'comments', 'tickets', 'users'));
    }
}
?>