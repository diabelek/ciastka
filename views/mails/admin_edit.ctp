<div class="mails form">
	<?php echo $this->Form->create('Mail'); ?>
	<fieldset>
		<legend><?php __('Edit Mail'); ?></legend>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('email');
			echo $this->Form->input('confirmed');
			echo $this->Form->input('operation_key', array('type' => 'text', 'readonly' => 'readonly'));
		?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>