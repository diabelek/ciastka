<div class="uploads form">
<?php echo $this->Form->create('Upload');?>
	<fieldset>
		<legend><?php __('Edit Upload'); ?></legend>
		<?php
			echo $this->Form->input('id');
			$this->Language->createLangTabs(
				array(
					'title' => array('label' => __('Title', true)),
					'description' => array('type' => 'textarea', 'class' => 'ckeditor', 'label' => __('Description', true))
				)
			);
			echo $this->Form->input('filename', array('type' => 'text', 'readonly' => 'readonly'));
			echo $this->Form->input('filetype', array('type' => 'text', 'readonly' => 'readonly'));
			echo $this->Form->input('filesize', array('type' => 'text', 'readonly' => 'readonly'));
			echo $this->Form->input('path', array('type' => 'text', 'readonly' => 'readonly'));
		?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true));?>
</div>