<div class="releases form">
<?php echo $form->create('Release');?>
	<fieldset>
 		<legend><?php __('Edit Release');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('date_of');
		echo $form->input('slug');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Release.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Release.id'))); ?></li>
		<li><?php echo $html->link(__('List Releases', true), array('action'=>'index'));?></li>
	</ul>
</div>
