<div class="exp_categories form">
	<?php echo $this->Form->create('ExpCategory'); ?>	
	<fieldset>
		<legend><?php __('Edit Category'); ?></legend>
		<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>