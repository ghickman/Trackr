<div class="tickets form">
<?php 
	echo $javascript->link('jquery/jquery.min', false);
	echo $javascript->link('jquery/plugins/jquery.autocomplete', false);
	echo $javascript->link('autocompleteAction', false);
?>
<?php echo $form->create('Ticket');?>
	<fieldset>
 		<legend><?php __('Add Ticket');?></legend>
	<?php
		echo $form->input('title');
		echo $form->input('application_id');
	?>
	<div class="input text">
	<?php
		//echo $form->label('Application');
		//echo $form->text('Application.name', array('size'=>30, 'id'=>'autoComplete'));
	?>
	</div>
	<?php
		echo $form->input('priority_id');
		echo $form->input('problem');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>