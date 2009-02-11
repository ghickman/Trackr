<div class="tickets form">
<?php echo $form->create('Ticket');?>
	<fieldset>
 		<legend><?php __('Add Ticket');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('slug');
		echo $form->input('problem');
		echo $form->input('is_complete');
		echo $form->input('release_id');
		echo $form->input('status_id');
		echo $form->input('queue_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Tickets', true), array('action'=>'index'));?></li>
	</ul>
</div>
