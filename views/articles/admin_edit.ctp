<div class="articles form">
	<?php echo $this->Form->create('Article', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php __('Edit Article'); ?></legend>
		<?php
		echo $this->Form->input('id');
		echo $this->Form->input('old-published', array('type' => 'hidden'));
		echo $this->Form->input('alias');
		$this->Language->createLangTabs(
				array(
					'title' => array('label' => __('Title', true)),
					'content' => array('type' => 'textarea', 'class' => 'ckeditor', 'label' => __('Content', true))
				)
		);
		echo $this->Form->input('cutShortText', array('label' => 'Wytnij tekst wstępu'));
		echo $this->Form->input('startpage', array('label' => 'Pokaż na stronie startowej'));
		echo $this->Form->input('published');
		echo $this->Form->input('archive');
		echo $this->Form->input('public');
		echo $this->Form->input('Category');
		echo $this->Form->input('area_id');

		if ($this->data['Article']['custom_banner_file'] != '')
			echo $html->image('articles/small/'.$this->data['Article']['custom_banner_file'], array('class' => 'input'));
		
		echo $form->input('Image.fileName', array('type' => 'file', 'label' => __("Image", true))); 
		echo $form->input('deleteimage', array('type' => 'checkbox', 'label' => __("Delete image", true)));
		echo $form->input('custom_banner_file', array('type'=>'hidden'));

		echo $this->element('meta');
		//echo $this->Form->input('User.fullname', array('type' => 'text', 'readonly' => 'readonly', 'label' => __('Author', true)));
		?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>