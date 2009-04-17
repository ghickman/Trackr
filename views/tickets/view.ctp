<div id="test">
<div id="view_heading">
	<h2 class="ticket_title" class="ticket_view"><?php echo $ticket['Ticket']['title'];?></h2>
	<p class="edit_link"> - <?php echo $html->link('Edit', array('action'=>'edit', $ticket['Ticket']['id']));?></p>
</div>
<br />
<p id="ticket_problem"><?php echo $ticket['Ticket']['problem'];?></p>

<div id="view_sidebar">
	<p>Raised by: <?php echo $ticket['User']['name'];?></p>
	<p>On: <?php echo $time->niceShort($ticket['Ticket']['created']);?></p>
	<p>For: <?php echo $ticket['Application']['title'];?></p>
	<?php if($ticket['Ticket']['modified'] != $ticket['Ticket']['created']):?>
		<p>Last Edited: <?php echo $time->niceShort($ticket['Ticket']['modified']);?></p>
	<?php endif;?>
	<p>Current Status: <?php echo $ticket['Status']['name'];?></p>
	<?php if($ticket['Ticket']['release_id']):?>
		<p>Due for release: <?php echo $ticket['Release']['date_of'];?></p>
	<?php else:?>
		<p>Not currently due for release</p>
	<?php endif;?>
</div>

<div class="comments_form">
	<h3 class="ticket_view">Comments</h3>
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
</div>