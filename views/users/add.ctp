<div class="users form">
<?php echo $javascript->link('jquery/jquery.min', false);?>
<?php echo $javascript->link('jquery/plugins/validation', false);?>
<?php echo $form->create('User');?>
	<fieldset>
 		<legend><?php __('Add User');?></legend>
	<?php
		echo $form->input('username', array('id'=>'validation'));
		echo $form->input('password', array('id'=>'validation'));
		echo $form->input('group_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('List Users', array('action'=>'index'));?></li>
	</ul>
</div>
