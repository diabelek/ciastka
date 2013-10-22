<div class="uploads form">
<?php echo $this->Form->create('Upload', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php __('Add Upload'); ?></legend>
		<?php
			$this->Language->createLangTabs(
				array(
					'title' => array('label' => __('Title', true)),
					'description' => array('type' => 'textarea', 'class' => 'ckeditor', 'label' => __('Description', true))
				)
			);
			echo $this->Form->input('path');
			echo $form->input('FilesUpload.fileName', array('type' => 'file', 'label' => __("File", true)));		
		?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true));?>
</div>