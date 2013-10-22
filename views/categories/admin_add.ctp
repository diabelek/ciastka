<div class="categories form">
<?php echo $this->Form->create('Category');?>
	<fieldset>
		<legend><?php __('Add Category'); ?></legend>
		<?php
			echo $this->Form->input('alias');
			$this->Language->createLangTabs(
				array (
					'name' => array('label' => __('Name', true)),
					'desc' => array('type' => 'textarea', 'class' => 'ckeditor', 'label' => __('Description', true))
				)
			);
			echo $this->Form->input('published');
			echo $this->Form->input('parent_id', array('empty' => true));
			echo $this->Form->input('Article');
			echo $this->Form->input('area_id');
		?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true));?>
</div>