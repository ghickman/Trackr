<div class="statuses form">
<?php echo $form->create('Status');?>
	<fieldset>
 		<legend><?php __('Edit Status');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('slug');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Status.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Status.id'))); ?></li>
		<li><?php echo $html->link(__('List Statuses', true), array('action'=>'index'));?></li>
	</ul>
</div>
