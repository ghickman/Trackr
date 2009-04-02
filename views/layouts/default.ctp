<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
		echo $html->css('layout');
		echo $html->css('main');
		echo $html->css('forms');
		echo $html->css('flash_messages');

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
			<p>Logged in as: <?php echo $session->read('Auth.User.name');?> | <?php echo $html->link('Logout', array('controller'=>'users', 'action'=>'logout'));?></p>
			<?php endif;?>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>