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
		echo Configure::read('env.dev');
		echo env('HTTP_HOST');
		if(env('HTTP_HOST') == Configure::read('env.dev')) {
		    echo '2';
	    } elseif(env('HTTP_HOST') == Configure::read('env.prod')) {
	        echo '0';
	    }
		echo $form->input('title');
		//echo $form->input('application');
	?>
	<div class="input text">
	<?php
		echo $form->label('Application');
		echo $form->text('Application.name', array('size'=>30, 'id'=>'autoComplete', 'autocomplete'=>'off'));
	?>
	</div>
	<?php
		echo $form->input('priority');
		echo $form->input('problem');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>