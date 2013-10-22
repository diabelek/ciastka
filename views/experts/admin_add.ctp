<div class="experts form">
	<?php echo $this->Form->create('Expert'); ?>
	<fieldset>
		<legend><?php __('Add Expert'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('email');
	?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>