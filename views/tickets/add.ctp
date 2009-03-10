<div class="tickets form">
<?php 
	echo $javascript->link('jquery/jquery.min', false);
	echo $javascript->link('jquery/plugins/autocomplete', false);
	echo $javascript->link('autocompleteAction', false);
?>
<?php echo $form->create('Ticket');?>
	<fieldset>
 		<legend><?php __('Add Ticket');?></legend>
	<?php
		echo $form->input('title');
		echo $form->input('application');
		//echo $form->text('Application.name', array('id'=>'autoComplete', 'autocomplete'=>'off'));
		echo $form->input('priority');
		echo $form->input('problem');
		//echo $form->input('status');
		//pr($statuses);
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>