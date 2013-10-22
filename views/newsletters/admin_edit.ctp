<div class="newsletters form">
<?php echo $this->Form->create('Newsletter');?>
	<fieldset>
 		<legend><?php __('Edit Newsletter'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('content', array('type' => 'textarea', 'class' => 'ckeditor', 'label' => __('Content', true)));
	?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true));?>
</div>