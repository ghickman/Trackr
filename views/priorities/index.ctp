<div class="priorities index">
<h2><?php __('Priorities');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('slug');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($priorities as $priority):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $priority['Priority']['id']; ?>
		</td>
		<td>
			<?php echo $priority['Priority']['name']; ?>
		</td>
		<td>
			<?php echo $priority['Priority']['slug']; ?>
		</td>
		<td>
			<?php echo $priority['Priority']['created']; ?>
		</td>
		<td>
			<?php echo $priority['Priority']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $priority['Priority']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $priority['Priority']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $priority['Priority']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $priority['Priority']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Priority', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Tickets', true), array('controller'=> 'tickets', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Ticket', true), array('controller'=> 'tickets', 'action'=>'add')); ?> </li>
	</ul>
</div>
