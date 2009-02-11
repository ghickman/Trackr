<div class="releases index">
<h2><?php __('Releases');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('date_of');?></th>
	<th><?php echo $paginator->sort('slug');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($releases as $release):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $release['Release']['id']; ?>
		</td>
		<td>
			<?php echo $release['Release']['date_of']; ?>
		</td>
		<td>
			<?php echo $release['Release']['slug']; ?>
		</td>
		<td>
			<?php echo $release['Release']['created']; ?>
		</td>
		<td>
			<?php echo $release['Release']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $release['Release']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $release['Release']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $release['Release']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $release['Release']['id'])); ?>
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
		<li><?php echo $html->link(__('New Release', true), array('action'=>'add')); ?></li>
	</ul>
</div>
