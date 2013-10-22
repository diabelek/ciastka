<div class="galleries form">
<?php echo $this->Form->create('Gallery');?>
	<fieldset>
		<legend><?php __('Add Gallery'); ?></legend>
	<?php
		$this->Language->createLangTabs(
			array(
				'name' => array('label' => __('Name', true)),
				'description' => array('label' => __('Description', true))
			)
		);
		echo $this->Form->input('published');
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