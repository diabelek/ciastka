<div class="areas form">
<?php echo $this->Form->create('Area');?>
	<fieldset>
		<legend><?php __('Add Area'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true));?>
</div>