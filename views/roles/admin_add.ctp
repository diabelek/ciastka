<div class="roles form">
<?php echo $this->Form->create('Role');?>
	<fieldset>
		<legend><?php __('Add Role'); ?></legend>

	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('rules');
		echo $this->Form->input('User');
	?>

	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true));?>
</div>