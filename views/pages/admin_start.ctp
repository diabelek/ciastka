<?php $modules = Configure::read('Settings.modules'); ?>

<div class="pages start">
	<h2><?php __('Welcome to Cactus CMS Administration panel.'); ?></h2>
	<h2><?php __('What do You want to do.'); ?></h2>
	<div class="panels">
		<?php if (isset($modules['articles']) && $modules['articles'] == true) :
			?>
		<div class="box">
			<?php 
				echo $this->Html->link(
					$this->Html->image('modules/cms.png') . __("CMS", true),
					array("controller" => "articles", "action" => "index"),
					array('escape' => false)
				);
			?>
		</div>
		<?php endif; ?>
		<?php if (isset($modules['articles']) && $modules['newsletter'] == true) : ?>
		<div class="box">
			<?php 
				echo $this->Html->link(
					$this->Html->image('modules/newsletter.png') . __("Newsletter", true),
					array("controller" => "mails", "action" => "index"),
					array('escape' => false)
				);
			?>
		</div>
		<?php endif; ?>
		<?php if (isset($modules['permissions']) && $modules['permissions'] == true) : ?>
		<div class="box">
			<?php 
				echo $this->Html->link(
					$this->Html->image('modules/users.png') . __("Permissions", true),
					array("controller" => "users", "action" => "index"),
					array('escape' => false)
				);
			?>
		</div>
		<?php endif; ?>
		<?php if (isset($modules['settings']) && $modules['settings'] == true) : ?>
		<div class="box">
			<?php 
				echo $this->Html->link(
					$this->Html->image('modules/settings.png') . __("Settings", true),
					array("controller" => "configurations", "action" => "index"),
					array('escape' => false)
				);
			?>
		</div>
		<?php endif; ?>
		<div style="clear: both"></div>
	</div>
</div>