<div class="statuses form">
<?php echo $form->create('Status');?>
	<fieldset>
 		<legend><?php __('Add Status');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('slug');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Statuses', true), array('action'=>'index'));?></li>
	</ul>
</div>
