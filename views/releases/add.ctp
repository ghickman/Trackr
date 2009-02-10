<div class="releases form">
<?php echo $form->create('Release');?>
	<fieldset>
 		<legend><?php __('Add Release');?></legend>
	<?php
		echo $form->input('date_of');
		echo $form->input('slug');
		echo $form->input('Application');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Releases', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Tickets', true), array('controller'=> 'tickets', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Ticket', true), array('controller'=> 'tickets', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Applications', true), array('controller'=> 'applications', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Application', true), array('controller'=> 'applications', 'action'=>'add')); ?> </li>
	</ul>
</div>
