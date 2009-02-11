<div class="queues form">
<?php echo $form->create('Queue');?>
	<fieldset>
 		<legend><?php __('Edit Queue');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('slug');
		echo $form->input('is_first_line');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Queue.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Queue.id'))); ?></li>
		<li><?php echo $html->link(__('List Queues', true), array('action'=>'index'));?></li>
	</ul>
</div>
