<div class="priorities form">
<?php echo $form->create('Priority');?>
	<fieldset>
 		<legend><?php __('Edit Priority');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('slug');
		echo $form->input('Ticket');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Priority.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Priority.id'))); ?></li>
		<li><?php echo $html->link(__('List Priorities', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Tickets', true), array('controller'=> 'tickets', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Ticket', true), array('controller'=> 'tickets', 'action'=>'add')); ?> </li>
	</ul>
</div>
