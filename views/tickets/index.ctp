<div class="tickets index">
<h2><?php __('Tickets');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<?php pr($tickets);?>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('title');?></th>
	<th><?php echo $paginator->sort('problem');?></th>
	<th><?php echo $paginator->sort('date_completed');?></th>
	<th><?php echo $paginator->sort('release_id');?></th>
	<th><?php echo $paginator->sort('status_id');?></th>
	<th><?php echo $paginator->sort('queue_id');?></th>
	<th><?php echo $paginator->sort('user_id');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($tickets as $ticket):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $ticket['Ticket']['id']; ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['title']; ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['problem']; ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['date_completed']; ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['release_id']; ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['status_id']; ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['queue_id']; ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['user_id']; ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['created']; ?>
		</td>
		<td>
			<?php echo $ticket['Ticket']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $ticket['Ticket']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $ticket['Ticket']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $ticket['Ticket']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ticket['Ticket']['id'])); ?>
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
		<li><?php echo $html->link(__('New Ticket', true), array('action'=>'add')); ?></li>
	</ul>
</div>
