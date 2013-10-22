<?php 
	$this->Html->css('ajaxUpdatePanel', null, array('inline' => false));
	$this->Javascript->link('ajaxUpdatePanel', false);
?>
<div class="calendars form">
	<?php echo $this->Form->create('Calendar'); ?>
	<fieldset>
		<legend><?php __('Edit Calendar'); ?></legend>
		<?php
		echo $this->Form->input('id');
		echo $this->Form->input('old-published', array('type' => 'hidden'));

		$this->Language->createLangTabs(
				array(
					'title' => array('label' => __('Title', true)),
					'description' => array('type' => 'textarea', 'class' => 'ckeditor', 'label' => __('Content', true))
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

<div id="terms">
	<?php echo $this->Cool->UpdateBoxCreate("calendar_terms", $this->webroot . "admin/terms/index/" . $this->data['Calendar']['id'], 1); ?>
</div>