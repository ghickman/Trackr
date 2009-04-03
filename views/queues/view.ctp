<div class="queues view">
	<h2><?php echo $queue['Queue']['name'];?></h2>
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
</div>