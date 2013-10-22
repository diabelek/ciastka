<div class="users form">
	<?php echo $form->create('User', array('action' => 'add')); ?>
	<fieldset>
		<legend><?php __('Add User'); ?></legend>

	<?php
		echo $form->input('username', array('type' => 'text'));
		echo $form->input('firstname');
		echo $form->input('lastname');
		echo $form->input('password', array('type' => 'password'));
		echo $form->input('password_confirm', array('type' => 'password'));
		echo $form->input('email');
		echo $form->input('activ');
		echo $form->input('Role');
	?>

	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>