<div class="mails form">
	<?php echo $this->Form->create('Mail'); ?>
	<fieldset>
		<legend><?php __('Add Mail'); ?></legend>
		<?php
			echo $this->Form->input('email');
			echo $this->Form->input('confirmed');
		?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>