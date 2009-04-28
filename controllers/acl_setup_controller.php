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
    
    function complete() {
        $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Tickets/complete');
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
        $id = 2;
        while($id <= 4) {
            $this->Acl->deny(array('Group'=>array('id'=>$id)), 'controllers');
        
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Applications/add');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Applications/edit');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Applications/view');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Applications/index');
        
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Comments/add');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Comments/view');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Comments/index');
        
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Groups/view');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Groups/index');
        
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Priorities/add');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Priorities/edit');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Priorities/view');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Priorities/index');
        
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Queues/add');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Queues/edit');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Queues/view');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Queues/index');
        
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Releases/add');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Releases/edit');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Releases/view');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Releases/index');
        
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Statuses/add');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Statuses/edit');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Statuses/view');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Statuses/index');
        
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Tickets/add');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Tickets/edit');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Tickets/view');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Tickets/index');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Tickets/complete');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Tickets/autocomplete');
        
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Users/view');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Users/index');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Users/home');
            $this->Acl->allow(array('Group'=>array('id'=>$id)), 'controllers/Users/password');
            
            $id++;
        }
    }
    
    function support() {
        //$this->__support_build();
        
        $id = 2;
        while($id <= 4) {
            $controllers = $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers');
        
            $applications = $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Applications/add');
            $applications .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Applications/edit');
            $applications .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Applications/view');
            $applications .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Applications/index');
        
            $comments = $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Comments/add');
            $comments .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Comments/view');
            $comments .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Comments/index');
        
            $groups = $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Groups/view');
            $groups .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Groups/index');
        
            $priorities = $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Priorities/add');
            $priorities .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Priorities/edit');
            $priorities .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Priorities/view');
            $priorities .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Priorities/index');
        
            $queues = $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Queues/add');
            $queues .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Queues/edit');
            $queues .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Queues/view');
            $queues .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Queues/index');
        
            $releases = $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Releases/add');
            $releases .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Releases/edit');
            $releases .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Releases/view');
            $releases .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Releases/index');
        
            $statuses = $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Statuses/add');
            $statuses .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Statuses/edit');
            $statuses .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Statuses/view');
            $statuses .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Statuses/index');
        
            $tickets = $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Tickets/add');
            $tickets .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Tickets/edit');
            $tickets .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Tickets/view');
            $tickets .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Tickets/index');
            $tickets .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Tickets/complete');
            $tickets .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Tickets/autocomplete');
        
            $users = $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Users/view');
            $users .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Users/index');
            $users .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Users/home');
            $users .= $this->Acl->check(array('Group'=>array('id'=>$id)), 'controllers/Users/password');
            
            $id++;
        }
        
        $this->set(compact('controllers', 'applications', 'comments', 'groups', 'priorities', 'queues', 'releases', 'statuses', 'tickets', 'users'));
    }
    
    function business_build() {
        $this->Acl->deny(array('Group'=>array('id'=>5)), 'controllers');
        
        $this->Acl->allow(array('Group'=>array('id'=>5)), 'controllers/Comments/add');
        $this->Acl->allow(array('Group'=>array('id'=>5)), 'controllers/Comments/view');
        
        $this->Acl->allow(array('Group'=>array('id'=>5)), 'controllers/Tickets/add');
        $this->Acl->allow(array('Group'=>array('id'=>5)), 'controllers/Tickets/view');
        
        $this->Acl->allow(array('Group'=>array('id'=>5)), 'controllers/Users/home');
        $this->Acl->allow(array('Group'=>array('id'=>5)), 'controllers/Users/password');
    }
    
    function business() {
        //$this->__business_build();
        
        $controllers = $this->Acl->check(array('Group'=>array('id'=>5)), 'controllers');
        
        $comments = $this->Acl->check(array('Group'=>array('id'=>5)), 'controllers/Comments/add');
        $comments .= $this->Acl->check(array('Group'=>array('id'=>5)), 'controllers/Comments/view');
        
        $tickets = $this->Acl->check(array('Group'=>array('id'=>5)), 'controllers/Tickets/add');
        $tickets .= $this->Acl->check(array('Group'=>array('id'=>5)), 'controllers/Tickets/view');
        
        $users = $this->Acl->check(array('Group'=>array('id'=>5)), 'controllers/Users/home');
        $users .= $this->Acl->check(array('Group'=>array('id'=>5)), 'controllers/Users/password');
        
        $this->set(compact('controllers', 'comments', 'tickets', 'users'));
    }
}
?>