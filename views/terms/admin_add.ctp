<div class="terms form">
	<?php echo $this->Form->create('Term'); ?>
	<fieldset>
		<legend><?php __('Add Term'); ?></legend>
		<?php echo $this->Form->input('calendar_id', array('type' => 'hidden')); ?>
		<div class="inline">
			<?php echo $this->Form->input('eventdate', array('type' => 'date', 'dateFormat' => 'DMY', 'label' => __('Event Date', true))); ?>
		</div>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>