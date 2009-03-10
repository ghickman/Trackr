<div class="queues form">
<?php echo $form->create('Queue');?>
	<fieldset>
 		<legend><?php __('Add Queue');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('is_first_line');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Queues', true), array('action'=>'index'));?></li>
	</ul>
</div>
