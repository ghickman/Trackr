<div class="users form">
<?php echo $javascript->link('jquery/jquery.min', false);?>
<?php echo $javascript->link('jquery/plugins/validation', false);?>
<?php echo $form->create('User');?>
	<fieldset>
 		<legend><?php __('Add User');?></legend>
	<?php
		echo $form->input('slug');
		echo $form->input('username', array('id'=>'username'));
		echo $form->input('password', array('id'=>'password'));
		echo $form->input('group_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Users', true), array('action'=>'index'));?></li>
	</ul>
</div>