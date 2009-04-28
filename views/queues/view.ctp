<div class="queues view">
	<h2><?php echo $queue['Queue']['name'];?></h2>
	<table>
		<tr>
			<th>Ticket</th>
			<th>Status</th>
			<th>Actions</th>
		</tr>
		<?php foreach($tickets as $ticket):?>
			<tr>
				<td><?php echo $html->link($ticket['Ticket']['title'], array('controller'=>'tickets', 'action'=>'view', $ticket['Ticket']['id']));?></td>
				<td><?php echo $ticket['Status']['name'];?></td>
				<td>
					<?php echo $html->link('Edit', array('controller'=>'tickets', 'action'=>'edit', $ticket['Ticket']['id']));?>
					|
					<?php echo $html->link('Complete', array('controller'=>'tickets', 'action'=>'complete', $ticket['Ticket']['id']), null, sprintf(__('Are you sure you want to complete %s?', true), $ticket['Ticket']['title']));?>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
</div>