<div class="applications view">
<h2><?php  __('Application');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $application['Application']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $application['Application']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Slug'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $application['Application']['slug']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $application['Application']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $application['Application']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Application', true), array('action'=>'edit', $application['Application']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Application', true), array('action'=>'delete', $application['Application']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $application['Application']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Applications', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Application', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Releases', true), array('controller'=> 'releases', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Release', true), array('controller'=> 'releases', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Releases');?></h3>
	<?php if (!empty($application['Release'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Date Of'); ?></th>
		<th><?php __('Slug'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($application['Release'] as $release):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $release['id'];?></td>
			<td><?php echo $release['date_of'];?></td>
			<td><?php echo $release['slug'];?></td>
			<td><?php echo $release['created'];?></td>
			<td><?php echo $release['modified'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'releases', 'action'=>'view', $release['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'releases', 'action'=>'edit', $release['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'releases', 'action'=>'delete', $release['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $release['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Release', true), array('controller'=> 'releases', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
