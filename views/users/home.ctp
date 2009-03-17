<?php
//echo $user;
//pr($group['Group']['queue_id']);
//pr($group['Ticket']);
//pr($test);
//pr($tickets);
?>

<?php echo $html->link('New Ticket', array('controller'=>'tickets', 'action'=>'add'));?>
<?php echo $html->link('View Queue', array('controller'=>'queues', 'action'=>'view', $queue[0]));?>


<div id="ticket_list">
<h2>Your Tickets</h2>
<ul>
	<?php foreach($tickets as $ticket):?>
		<li>
			<ul>
				<li class="ticket"><?php echo $html->link($ticket['Ticket']['title'], array('controller'=>'tickets', 'action'=>'view', $ticket['Ticket']['id']));?></li>
				<li class="ticket"><?php echo $ticket['Ticket']['problem'];?></li>
				<li class="ticket"><?php echo $ticket['Status']['name'];?></li>
			</ul>
		</li>
	<?php endforeach;?>
</ul>
<table>
	<tr>
		<th></th>
		<th></th>
	</tr>
	<tr>
		<td></td>
	</tr>
</table>
</div>