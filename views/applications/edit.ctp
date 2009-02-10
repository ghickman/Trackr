<div class="applications form">
<?php echo $form->create('Application');?>
	<fieldset>
 		<legend><?php __('Edit Application');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('slug');
		echo $form->input('Release');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Application.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Application.id'))); ?></li>
		<li><?php echo $html->link(__('List Applications', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Releases', true), array('controller'=> 'releases', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Release', true), array('controller'=> 'releases', 'action'=>'add')); ?> </li>
	</ul>
</div>
