<div class="login">
<h2>Login</h2>	
	<?php
	    if  ($session->check('Message.auth')) $session->flash('auth');
	    echo $form->create('User', array('action' => 'login'));
		echo '<fieldset>';
	    echo $form->input('username');
	    echo $form->input('password');
	    echo $form->end('Login');
		echo '</fieldset>';
	?>
</div>