<div class="queues view">
<fieldset>
	<legend>Current Tickets</legend>
	<table>
		<tr>
			<th>Ticket</th>
			<th>Status</th>
		</tr>
		<?php foreach($tickets as $ticket):?>
			<tr>
				<td><?php echo $html->link($ticket['Ticket']['title'], array('controller'=>'tickets', 'action'=>'view', $ticket['Ticket']['id']));?></td>
				<td><?php echo $ticket['Status']['name'];?></td>
			</tr>
		<?php endforeach;?>
	</table>
	<?php //pr($tickets);?>
</fieldset>

<h2><?php  __('Queue');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $queue['Queue']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $queue['Queue']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $queue['Queue']['slug']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Is First Line'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $queue['Queue']['is_first_line']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $queue['Queue']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $queue['Queue']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Queue', true), array('action'=>'edit', $queue['Queue']['id'])); ?></li>
		<li><?php echo $html->link(__('Delete Queue', true), array('action'=>'delete', $queue['Queue']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $queue['Queue']['id'])); ?></li>
		<li><?php echo $html->link(__('List Queues', true), array('action'=>'index')); ?></li>
		<li><?php echo $html->link(__('New Queue', true), array('action'=>'add')); ?></li>
	</ul>
</div>
