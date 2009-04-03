<h2 class="ticket_title" class="ticket_view"><?php echo $ticket['Ticket']['title'];?></h2><p class="edit"> - <?php echo $html->link('Edit', array('action'=>'edit', $ticket['Ticket']['id']));?></p>
<p>Raised by: <?php echo $ticket['User']['name'];?></p>
<br />
<p><?php echo $ticket['Ticket']['problem'];?></p>

<h3 class="ticket_view">Comments</h3>
<div class="comments_form">
<?php
echo $form->create('Comment');
	echo $form->input('text', array('label'=>'', 'default'=>'Add a comment'));
	echo $form->hidden('ticket_id', array('default'=>$id));
	echo $form->hidden('queue_id', array('default'=>$ticket['Ticket']['queue_id']));
echo $form->end('Submit');
?>
</div>
<ul id="comments_block">
	<?php foreach($comments as $comment):?>
		<li class="comment_block" id=<?php echo 'comment-'.$comment['Comment']['id'];?>>
			<p class="divider">.........................................................................................................................</p>
			<p class="comment"><?php echo $comment['Comment']['text'];?></p>
			<p class="comment_info"><?php echo "Posted by " . $comment['User']['name'] . " on " . $time->niceShort($comment['Comment']['created']);?></p>
			<br />
		</li>
	<?php endforeach;?>
</ul>