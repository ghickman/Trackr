<div class="applications form">
<?php echo $form->create('Application');?>
	<fieldset>
 		<legend><?php __('Add Application');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('slug');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Applications', true), array('action'=>'index'));?></li>
	</ul>
</div>
