<div class="tickets form">
<?php echo $javascript->link('jquery/jquery.min');?>
<?php echo $form->create('Ticket');?>
	<fieldset>
 		<legend><?php __('Add Ticket');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('slug');
		echo $form->label('Application');
		echo $form->text('Application.name', array('id'=>'autoComplete'));
		echo $form->input('problem');
		echo $form->input('release_id');
		echo $form->input('status_id');
		echo $form->input('queue_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('List Tickets', array('action'=>'index'));?></li>
	</ul>
</div>