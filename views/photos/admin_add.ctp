<div class="photos form">
	<?php echo $this->Form->create('Photo', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php __('Add Photo'); ?></legend>
		<?php
		echo $this->Form->input('gallery_id', array('type' => 'hidden'));
		$this->Language->createLangTabs(
				array(
					'name' => array('label' => __('Name', true)),
					'description' => array('label' => __('Description', true))
				)
			);
		?>
		<fieldset>
			<legend><?php __('Photo'); ?></legend>
			<?php
			echo $form->input('Image.fileName', array('type' => 'file', 'label' => __("Photo", true))); 
			?>
			<div class="inline">
				<?php
				echo $this->Form->input('photoBigSizeX', array('label' => __("Size:", true)));
				echo $this->Form->input('photoBigSizeY', array('label' => __("x", true)));
				?>
			</div>
			<div class="inline">
				<?php
				echo $this->Form->input('photoSmallSizeX', array('label' => __("Thumbnail size:", true)));
				echo $this->Form->input('photoSmallSizeY', array('label' => __("x", true)));
				?>
			</div>
		<?php
			echo $this->Form->input('area_id');
			echo $this->Form->input('banner', array('type' => 'select'), array('options' => $banners));

			echo $this->element('meta');
		?>
		</fieldset>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>