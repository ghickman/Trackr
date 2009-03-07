<div class="priorities view">
<h2><?php  __('Priority');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $priority['Priority']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $priority['Priority']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $priority['Priority']['slug']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $priority['Priority']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $priority['Priority']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Priority', true), array('action'=>'edit', $priority['Priority']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Priority', true), array('action'=>'delete', $priority['Priority']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $priority['Priority']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Priorities', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Priority', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Tickets', true), array('controller'=> 'tickets', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Ticket', true), array('controller'=> 'tickets', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Tickets');?></h3>
	<?php if (!empty($priority['Ticket'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Problem'); ?></th>
		<th><?php __('Date Completed'); ?></th>
		<th><?php __('Release Id'); ?></th>
		<th><?php __('Status Id'); ?></th>
		<th><?php __('Queue Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($priority['Ticket'] as $ticket):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $ticket['id'];?></td>
			<td><?php echo $ticket['title'];?></td>
			<td><?php echo $ticket['problem'];?></td>
			<td><?php echo $ticket['date_completed'];?></td>
			<td><?php echo $ticket['release_id'];?></td>
			<td><?php echo $ticket['status_id'];?></td>
			<td><?php echo $ticket['queue_id'];?></td>
			<td><?php echo $ticket['created'];?></td>
			<td><?php echo $ticket['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'tickets', 'action'=>'view', $ticket['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'tickets', 'action'=>'edit', $ticket['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'tickets', 'action'=>'delete', $ticket['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ticket['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Ticket', true), array('controller'=> 'tickets', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
