<div class="priorities form">
<?php echo $form->create('Priority');?>
	<fieldset>
 		<legend><?php __('Add Priority');?></legend>
		<?php
			echo $form->input('name');
		?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('List Priorities', array('action'=>'index'));?></li>
		<li><?php echo $html->link('New Ticket', array('controller'=> 'tickets', 'action'=>'add')); ?> </li>
	</ul>
</div>
