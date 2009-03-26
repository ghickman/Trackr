<div class="queues index">
<h2><?php __('Queues');?></h2>
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
	<th><?php echo $paginator->sort('is_first_line');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($queues as $queue):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $queue['Queue']['id']; ?>
		</td>
		<td>
			<?php echo $queue['Queue']['name']; ?>
		</td>
		<td>
			<?php echo $queue['Queue']['slug']; ?>
		</td>
		<td>
			<?php echo $queue['Queue']['is_first_line']; ?>
		</td>
		<td>
			<?php echo $queue['Queue']['created']; ?>
		</td>
		<td>
			<?php echo $queue['Queue']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $queue['Queue']['slug'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $queue['Queue']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $queue['Queue']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $queue['Queue']['id'])); ?>
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
		<li><?php echo $html->link(__('New Queue', true), array('action'=>'add')); ?></li>
	</ul>
</div>
