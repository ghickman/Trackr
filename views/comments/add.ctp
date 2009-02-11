<div class="comments form">
<?php echo $form->create('Comment');?>
	<fieldset>
 		<legend><?php __('Add Comment');?></legend>
	<?php
		echo $form->input('text');
		echo $form->input('ticket_id');
		echo $form->input('user_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Comments', true), array('action'=>'index'));?></li>
	</ul>
</div>
