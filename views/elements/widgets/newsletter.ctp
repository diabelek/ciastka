<div id="newsletter_widget">
	<h2><?php __('Newsletter'); ?></h2>
	<?php	
		echo $form->create('Mail', array('action' => 'add'));
		echo $form->input('emailString', array('label' => '', 'class' => 'emailField', 'placeholder' => __('add  e-mail address', true)));
		echo $form->end(__('add', true));
	?>
	<div id="newsletter_info">
		<?php __('If You want get the newsletters add Your e-mail address.'); ?>
	</div>
</div>