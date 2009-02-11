<div class="applications form">
<?php echo $form->create('Application');?>
	<fieldset>
 		<legend><?php __('Edit Application');?></legend>
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
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Application.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Application.id'))); ?></li>
		<li><?php echo $html->link(__('List Applications', true), array('action'=>'index'));?></li>
	</ul>
</div>
