<div class="tickets form">
<?php
?>
<?php echo $form->create('Ticket');?>
	<fieldset>
 		<legend><?php __('Edit Ticket');?></legend>
	<?php
		echo $form->input('title');
		echo $form->input('problem');
		echo $form->input('release_id');
		echo $form->input('status_id');
		echo $form->input('queue_id');
		echo $form->label('Complete?');
		echo $form->checkbox('Ticket.date_completed');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
