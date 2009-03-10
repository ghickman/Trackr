<?php
class User extends AppModel {
	var $name = 'User';

	var $belongsTo = array('Group');
	var $hasMany = array('Comment');
	var $hasAndBelongsToMany = array('Ticket');
	
	var $actsAs = array('Acl' => array('requester'));
	
	var $validate = array(
	    'username'=>array(
	        'isUnique'=>array('rule'=>'isUnique', 'message'=>'Sorry, this username already exists'),
	        'between'=>array('rule'=>array('between', '3', '255'), 'message'=>'Username must be between 3 and 255 characters')
	    ),
	    'password'=>array(
	        'rule'=>array('between', 8, 50),
	        'message'=>'Passwords must be between 8 and 50 characters long'
	    )
	);
	
	/**
	 * Controller afterFilter callback.
	 * Called after the controller action is run and rendered.
	 * 
	 * @return void
	 */
	function afterSave($created) {
        if (!$created) {
            $parent = $this->parentNode();
            $parent = $this->node($parent);
            $node = $this->node();
            $aro = $node[0];
            $aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
            $this->Aro->save($aro);
        }
	}
	
	function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        
        $data = $this->data;
        if (empty($this->data)) {
            $data = $this->read();
        }
        
        if (!$data['User']['group_id']) {
            return null;
        } else {
            return array('Group' => array('id' => $data['User']['group_id']));
        }
	}
}
?>