<?php $this->Html->css('../js/markitup/skins/simple/style.css', null, array('inline' => false)); ?>
<?php $this->Html->css('../js/markitup/sets/bbcode/style.css', null, array('inline' => false)); ?>

<?php $this->Javascript->link('markitup/jquery.markitup', false); ?>
<?php $this->Javascript->link('markitup/sets/bbcode/set', false); ?>

<div class="users form">
	<?php echo $form->create('User', array('action' => 'edit', 'type' => 'file')); ?>
	<fieldset>
		<legend><?php __('Edit User'); ?></legend>

		<?php
			echo $form->input('id');
			echo $form->input('username', array('type' => 'text', 'readonly' => 'readonly'));
			echo $form->input('firstname');
			echo $form->input('lastname');
			echo $form->input('password_new', array('type' => 'password', 'label' => __('Password', true)));
			echo $form->input('password_new_confirm', array('type' => 'password', 'label' => __('Password Confirm', true)));
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
