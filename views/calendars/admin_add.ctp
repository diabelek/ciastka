<div class="calendars form">
	<?php echo $this->Form->create('Calendar'); ?>
	<fieldset>
		<legend><?php __('Add Calendar'); ?></legend>
		<?php
		$this->Language->createLangTabs(
				array(
					'title' => array('label' => __('Title', true)),
					'description' => array('type' => 'textarea', 'class' => 'ckeditor', 'label' => __('Description', true))
				)
		);
		echo $this->Form->input('published');
		echo $this->Form->input('featured');
		echo $this->Form->input('highlight');
		echo $this->Form->input('CalendarCategory');

		echo $this->Form->input('area_id');
		echo $this->Form->input('banner', array('type' => 'select'), array('options' => $banners));

		echo $this->element('meta');
	?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>