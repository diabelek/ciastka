<div class="banners form">
	<?php echo $this->Form->create('Banner', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php __('Add Banner'); ?></legend>
		<?php
		$this->Language->createLangTabs(
				array(
					'name' => array('label' => __('Name', true)),
				)
		);
		echo $this->Form->input('link');
		echo $this->Form->input('published');
		?>
		<fieldset>
			<legend><?php __('Image'); ?></legend>
			<?php
			echo $form->input('Image.fileName', array('type' => 'file', 'label' => __("Image", true))); 
			?>
			<div class="inline">
				<?php
				echo $this->Form->input('bannerBigSizeX', array('label' => __("Size:", true)));
				echo $this->Form->input('bannerBigSizeY', array('label' => __("x", true)));
				?>
			</div>
			<div class="inline">
				<?php
				echo $this->Form->input('bannerSmallSizeX', array('label' => __("Thumbnail size:", true)));
				echo $this->Form->input('bannerSmallSizeY', array('label' => __("x", true)));
				?>
			</div>
		</fieldset>
		<fieldset>
			<legend><?php __('Hover image'); ?></legend>
			<?php
			echo $form->input('Image.hoverFileName', array('type' => 'file', 'label' => __("Image", true))); 
			?>
			<div class="inline">
				<?php
				echo $this->Form->input('bannerHoverBigSizeX', array('label' => __("Size:", true)));
				echo $this->Form->input('bannerHoverBigSizeY', array('label' => __("x", true)));
				?>
			</div>
			<div class="inline">
				<?php
				echo $this->Form->input('bannerHoverSmallSizeX', array('label' => __("Thumbnail size:", true)));
				echo $this->Form->input('bannerHoverSmallSizeY', array('label' => __("x", true)));
				?>
			</div>
		</fieldset>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>