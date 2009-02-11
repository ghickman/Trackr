<div class="releases form">
<?php echo $form->create('Release');?>
	<fieldset>
 		<legend><?php __('Add Release');?></legend>
	<?php
		echo $form->input('date_of');
		echo $form->input('slug');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Releases', true), array('action'=>'index'));?></li>
	</ul>
</div>
