<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');

		echo $html->css('cake.generic');
		echo $html->css('main');
		echo $html->css('header');
		echo $html->css('menu');
		echo $html->css('footer');
		echo $html->css('forms');
		echo $html->css('flash_messages');
		echo $html->css('centre_content');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container" class="wrapper">
		<div id="header">
			<?php if($session->read('Auth.User')):?>
			<ul id="menu">
				<li><?php echo $html->link('Home', array('controller'=>'users', 'action'=>'home'));?></li>
				<li><?php echo $html->link('New Ticket', array('controller'=>'tickets', 'action'=>'add'));?></li>
				<?php if($session->check('queue')):?>
					<li id="home_queue"><?php echo $html->link('Your Queue', array('controller'=>'queues', 'action'=>'view', $session->read('queue')));?></li>
				<?php endif;?>
			</ul>
			<?php endif;?>
		</div>
		<div id="content">

			<?php $session->flash('auth');?>
			<?php echo $mysession->flash();?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php if($session->read('Auth.User')):?>
			<p>Logged in as: <?php echo $session->read('Auth.User.name');?> | 
			<?php echo $html->link('Change Password', array('controller' => 'users', 'action' => 'password'));?> | 
			<?php echo $html->link('Logout', array('controller'=>'users', 'action'=>'logout'));?></p>
			<?php endif;?>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>