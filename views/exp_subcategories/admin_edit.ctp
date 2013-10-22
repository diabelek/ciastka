<div class="exp_subcategories form">
	<?php echo $this->Form->create('ExpSubcategory'); ?>	
	<fieldset>
		<legend><?php __('Edit Subcategory'); ?></legend>
		<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('category_id');
		echo $this->Form->input('expert_id');
		?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>