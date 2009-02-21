<div class="tickets form">
<?php 
	//echo $javascript->link('jquery/jquery.min', false);
	//echo $javascript->link('jquery/plugins/autocomplete', false);
	//echo $javascript->link('jquery/autocompleteAction.js', false);
	echo $javascript->link('prototype/prototype');
	echo $javascript->link('scriptaculous/scriptaculous');
?>
<?php echo $form->create('Ticket');?>
	<fieldset>
 		<legend><?php __('Add Ticket');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('slug');
		echo $form->label('Application');
		echo $ajax->autoComplete('Application.name', '/tickets/autocomplete');
		echo $form->input('problem');
		echo $form->input('is_complete');
		echo $form->input('release_id');
		echo $form->input('status_id');
		echo $form->input('queue_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('List Tickets', array('action'=>'index'));?></li>
	</ul>
</div>