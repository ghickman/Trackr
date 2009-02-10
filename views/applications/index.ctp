<div class="applications index">
<h2><?php __('Applications');?></h2>
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
foreach ($applications as $application):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $application['Application']['id']; ?>
		</td>
		<td>
			<?php echo $application['Application']['name']; ?>
		</td>
		<td>
			<?php echo $application['Application']['slug']; ?>
		</td>
		<td>
			<?php echo $application['Application']['created']; ?>
		</td>
		<td>
			<?php echo $application['Application']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $application['Application']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $application['Application']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $application['Application']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $application['Application']['id'])); ?>
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
		<li><?php echo $html->link(__('New Application', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Releases', true), array('controller'=> 'releases', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Release', true), array('controller'=> 'releases', 'action'=>'add')); ?> </li>
	</ul>
</div>
