<div class="contact form">
	<?php echo $this->Form->create('ContactForm', array('action' => 'send')); ?>
	<h2><?php __('Write to us'); ?></h2>

	<?php
		echo $this->Form->input('name', array('label' => '', 'default' => __('Name...', true)));
		echo $this->Form->input('email', array('label' => '', 'default' => __('E-mail address...', true)));
		echo $this->Form->input('question', array('type' => 'textbox', 'label' => '', 'default' => __('Your question...', true)));
	?>

	<script>
		$('#ContactName').focusin(function() {
			if ($(this).val() == '<?php __('Name...') ?>')
			{
				$(this).val('');
				$(this).removeClass('empty');
			}
		});
	
		$('#ContactName').focusout(function() {
			if ($(this).val() == '') {
				$(this).val('<?php __('Name...') ?>');
				$(this).addClass('empty');
			}
		});
		
		$('#ContactEmail').focusin(function() {
			if ($(this).val() == '<?php __('E-mail address...') ?>')
			{
				$(this).val('');
				$(this).removeClass('empty');
			}
		});
	
		$('#ContactEmail').focusout(function() {
			if ($(this).val() == '') {
				$(this).val('<?php __('E-mail address...') ?>');
				$(this).addClass('empty');
			}
		});
		
		$('#ContactQuestion').focusin(function() {
			if ($(this).val() == '<?php __('Your question...') ?>')
			{
				$(this).val('');
				$(this).removeClass('empty');
			}
		});
	
		$('#ContactQuestion').focusout(function() {
			if ($(this).val() == '') {
				$(this).val('<?php __('Your question...') ?>');
				$(this).addClass('empty');
			}
		});
	</script>

	<?php echo $this->Form->end(__('Send', true)); ?>
</div>