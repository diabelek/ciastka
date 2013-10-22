<?php $this->Html->css('../js/markitup/skins/simple/style.css', null, array('inline' => false)); ?>
<?php $this->Html->css('../js/markitup/sets/bbcode/style.css', null, array('inline' => false)); ?>

<?php $this->Javascript->link('markitup/jquery.markitup', false); ?>
<?php $this->Javascript->link('markitup/sets/bbcode/set', false); ?>

<div class="users form">
	<?php echo $form->create('User', array('action' => 'edit', 'type' => 'file')); ?>
	<fieldset>
		<legend><?php __('Edit User'); ?></legend>

		<script>
			$(function() {
				$( "#tabs" ).tabs();
			});
		</script>

		<script language="javascript">
			$(document).ready(function()	{
				$('.bbcode').markItUp(mySettings);
		
				/*$('#emoticons a').click(function() {
					emoticon = $(this).attr("title");
					$.markItUp( { replaceWith:emoticon } );
				});*/
			});
		</script>

		<?php
			echo $form->input('id');
			echo $form->input('Profile.id', array('type' => 'hidden'));
		?>
		<div id="tabs">
			<ul>
				<li><a href="#tabs-user"><?php __('User') ?></a></li>
				<li><a href="#tabs-profile"><?php __('Profile') ?></a></li>
			</ul>
			<div id="tabs-user">
			<?php
				echo $form->input('username', array('type' => 'text', 'readonly' => 'readonly'));
				echo $form->input('firstname');
				echo $form->input('lastname');
				echo $form->input('password_new', array('type' => 'password', 'label' => __('Password', true)));
				echo $form->input('password_new_confirm', array('type' => 'password', 'label' => __('Password Confirm', true)));
				echo $form->input('email');
			?>
			</div>
			<div id="tabs-profile">
			<?php
				echo $form->input('Profile.displayname');
				echo $form->input('Profile.rank');
				echo $form->input('Profile.ggnumber');
				echo $form->input('Profile.icqnumber');
				echo $form->input('Profile.skypelogin');
				echo $form->input('Profile.website');
				echo $form->input('Profile.location');
				echo $form->input('Profile.Genders');
				/*<div id="emoticons">
					<a href="#" title=":p"><img src="images/emoticon-happy.png" /></a>
					<a href="#" title=":("><img src="images/emoticon-unhappy.png" /></a>
					<a href="#" title=":o"><img src="images/emoticon-surprised.png" /></a>
					<a href="#" title=":p"><img src="images/emoticon-tongue.png" /></a>
					<a href="#" title=";)"><img src="images/emoticon-wink.png" /></a>
					<a href="#" title=":D"><img src="images/emoticon-smile.png" /></a>
				</div>*/
				echo $form->input('Profile.signature', array('type' => 'textarea', 'class' => 'bbcode', 'label' => __('Signature', true)));

				if (isset($this->data['Profile']['old_avatarSize']) && $this->data['Profile']['avatarSize'] != null)
					echo $html->image('/profiles/avatar/' . $this->data['Profile']['id']);

				echo $form->input('Profile.File', array('type' => 'file'));
				echo $form->input('Profile.delete_avatar', array('type' => 'checkbox', 'label' => __('Delete avatar', true)));
				echo $form->input('Profile.old_avatarSize', array('type' => 'hidden'));
			?>
			</div>
		</div>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>