<?php //pr($ticket);?>

<div class="actions">
	<ul>
		<li><?php echo $html->link('Edit Ticket', array('action'=>'edit', $ticket['Ticket']['id'])); ?></li>
		<li><?php echo $html->link('Queue', array('controller'=>'queues','action'=>'view', $ticket['Queue']['slug']));?></li>
		<li><?php echo $html->link('New Ticket', array('action'=>'add'));?></li>
	</ul>
</div>

<h2 class="ticket_title"><?php echo $ticket['Ticket']['title'];?></h2>
<p>Raised by: <?php echo $ticket['User']['username'];?></p>
<br />
<p><?php echo $ticket['Ticket']['problem'];?></p>

<h2>Comments</h2>
<?php echo $html->link('New Comment', array('controller'=>'comments', 'action'=>'add'));?>

<?php
foreach($comments as $comment) {
	//pr($comment);
	echo $comment['Comment']['text'];
	echo "Posted by: " . $comment['User']['username'];
	echo "<br />";
	echo "<br />";
}
?>