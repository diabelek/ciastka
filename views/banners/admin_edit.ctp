<div class="banners form">
	<?php echo $this->Form->create('Banner', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php __('Edit Banner'); ?></legend>
		<?php
		echo $this->Form->input('id');
		echo $this->Form->input('old-published', array('type' => 'hidden'));
		$this->Language->createLangTabs(
				array(
					'name' => array('label' => __('Name', true)),
				)
		);
		echo $this->Form->input('link');
		echo $this->Form->input('published');
		if ($this->data['Banner']['fileName'] != '')
			echo $html->image('banners/small/'.$this->data['Banner']['fileName'], array('class' => 'input'));
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
		<?php 
			if ($this->data['Banner']['hoverFileName'] != '')
				echo $html->image('banners/hover/small/'.$this->data['Banner']['hoverFileName'], array('class' => 'input')); 
		?>
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
		<?php
		echo $form->input('deleteimage', array('type' => 'checkbox', 'label' => __("Delete image", true)));
		echo $form->input('fileName', array('type'=>'hidden'));
		?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>