<?php $modules = Configure::read('Settings.modules'); ?>
<?php
	echo $this->Javascript->codeBlock('
		$(document).ready(function(){ 
			$("ul.sf-menu").supersubs({
				minWidth:	12,		// minimum width of sub-menus in em units 
				maxWidth:	27,		// maximum width of sub-menus in em units 
				extraWidth:	1		// extra width can ensure lines don\'t sometimes turn over 
									// due to slight rounding differences and font-family 
			}).superfish({
				delay:	0,			// one second delay on mouseout
				speed:	\'fast\',	// faster animation speed
			}).find("ul");
		});
	');
?>
<div class="admin_menu">
	<ul class="sf-menu">
		<li>
			<?php echo $html->link(__("Start", true), array("plugin" => false, "controller" => "pages", "action" => "start")); ?>
		</li>
		<?php if (isset($modules['articles']) && $modules['articles'] == true): ?>
		<li>
			<?php echo $html->link(__("CMS", true), array("plugin" => false, "controller" => "articles", "action" => "index")); ?>
		</li>
		<?php endif; ?>
		<?php if (isset($modules['newsletter']) && $modules['newsletter'] == true) : ?>
		<li>
			<?php echo $html->link(__("Newsletter", true), array("plugin" => false, "controller" => "mails", "action" => "index")); ?>
		</li>
		<?php endif; ?>
		<?php if (isset($modules['permissions']) && $modules['permissions'] == true) : ?>
		<li>
			<?php echo $html->link(__("Permissions", true), array("plugin" => false, "controller" => "users", "action" => "index")); ?>
		</li>
		<?php endif; ?>
		<?php if (isset($modules['settings']) && $modules['settings'] == true) : ?>
		<li>
			<?php echo $html->link(__("Settings", true), array("plugin" => false, "controller" => "configurations", "action" => "index")); ?>
		</li>
		<?php endif; ?>
	</ul>
	<div style="clear: both"></div>
</div>