<div class="releases view">
<h2><?php  __('Release');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $release['Release']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Of'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $release['Release']['date_of']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $release['Release']['slug']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $release['Release']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $release['Release']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Release', true), array('action'=>'edit', $release['Release']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Release', true), array('action'=>'delete', $release['Release']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $release['Release']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Releases', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Release', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Tickets', true), array('controller'=> 'tickets', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Ticket', true), array('controller'=> 'tickets', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Applications', true), array('controller'=> 'applications', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Application', true), array('controller'=> 'applications', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Tickets');?></h3>
	<?php if (!empty($release['Ticket'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Slug'); ?></th>
		<th><?php __('Problem'); ?></th>
		<th><?php __('Is Complete'); ?></th>
		<th><?php __('Release Id'); ?></th>
		<th><?php __('Queue Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($release['Ticket'] as $ticket):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $ticket['id'];?></td>
			<td><?php echo $ticket['name'];?></td>
			<td><?php echo $ticket['slug'];?></td>
			<td><?php echo $ticket['problem'];?></td>
			<td><?php echo $ticket['is_complete'];?></td>
			<td><?php echo $ticket['release_id'];?></td>
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
<div class="related">
	<h3><?php __('Related Applications');?></h3>
	<?php if (!empty($release['Application'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Slug'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($release['Application'] as $application):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $application['id'];?></td>
			<td><?php echo $application['name'];?></td>
			<td><?php echo $application['slug'];?></td>
			<td><?php echo $application['created'];?></td>
			<td><?php echo $application['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'applications', 'action'=>'view', $application['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'applications', 'action'=>'edit', $application['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'applications', 'action'=>'delete', $application['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $application['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Application', true), array('controller'=> 'applications', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
