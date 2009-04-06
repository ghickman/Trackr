<div id="change_password">
<?php echo $form->create('User', array('action'=>'password'));?>
	<fieldset>
		<legend>Please enter your new password</legend>
		<?php
			echo $form->label('Your Current Password');
			echo $form->password('old_password', array('autocomplete'=>'off'));
			//echo $form->error('old_password', $old);
						
			echo $form->label('New Password');
			echo $form->password('password', array('autocomplete'=>'off'));
			//echo $form->error('password');
			
			echo $form->label('Repeat Password');
			echo $form->password('repeat_password', array('autocomplete'=>'off'));
			//echo $form->error('repeat_password', $repeat);
		?>
	</fieldset>
<?php echo $form->end('Update');?>
</div>