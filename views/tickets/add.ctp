<div class="tickets form">
<?php echo $form->create('Ticket');?>
	<fieldset>
 		<legend><?php __('Add Ticket');?></legend>
	<?php
		echo $form->input('title');
		echo $form->text('Application.name', array('id'=>'autocomplete', 'autocomplete'=>'off'));
		echo $form->input('priority');
		echo $form->input('problem');
		//echo $form->input('date_completed');
		//echo $form->input('release_id');
		//echo $form->input('status_id');
		//echo $form->input('queue_id');
		//echo $form->input('User');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>