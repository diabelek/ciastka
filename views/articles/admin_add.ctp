<div class="articles form">
	<?php echo $this->Form->create('Article', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php __('Add Article'); ?></legend>
	<?php
		echo $this->Form->input('alias');
		$this->Language->createLangTabs(
				array(
					'title' => array('label' => __('Title', true)),
					'content' => array('type' => 'textarea', 'class' => 'ckeditor', 'label' => __('Description', true))
				)
		);
		echo $this->Form->input('cutShortText', array('label' => 'Wytnij tekst wstępu'));
		echo $this->Form->input('startpage', array('label' => 'Pokaż na stronie startowej'));
		echo $this->Form->input('published');
		echo $this->Form->input('archive');
		echo $this->Form->input('Category');
		echo $this->Form->input('public');
		echo $this->Form->input('area_id');
		echo $form->input('Image.fileName', array('type' => 'file', 'label' => __("Custom banner", true))); 
		echo $this->element('meta');
	?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>