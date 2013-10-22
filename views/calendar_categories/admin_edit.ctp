<div class="calendar_categories form">
<?php echo $this->Form->create('CalendarCategory');?>
	<fieldset>
		<legend><?php __('Edit Calendar Category'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('alias');
				$this->Language->createLangTabs(
					array (
						'name' => array('label' => __('Name', true)),
						'desc' => array('type' => 'textarea', 'class' => 'ckeditor', 'label' => __('Description', true))
					)
				);
		echo $this->Form->input('parent_id', array('empty'=>true));
		echo $this->Form->input('Calendar');
		echo $this->Form->input('area_id');
		echo $this->Form->input('banner', array('type' => 'select'), array('options' => $banners));

		echo $this->element('meta');
	?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true));?>
</div>