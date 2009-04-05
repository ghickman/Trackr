<div class="ticket_edit">
<?php echo $form->create('Ticket');?>
	<fieldset>
 		<legend><?php __('Edit Ticket');?></legend>
		<?php
			echo $form->input('title');
			echo $form->input('problem');
		?>
		
		<div id="actions">
		<?php
			echo $form->input('status_id');
			echo $form->input('queue_id', array('div'=>array('id'=>'queue')));
		?>		
			<div class="input select">
			<?php
				echo $form->label('Releases');
				echo $form->select('release_id', $releases, $release, null, true);
			?>
			</div>
		
			<div id="complete" class="input checkbox">
			<?php 
				echo $form->label('Complete?');
				echo $form->checkbox('Ticket.date_completed');
			?>
			</div>
		</div>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
