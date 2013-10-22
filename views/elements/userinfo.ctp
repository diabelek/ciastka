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
<?php 
	$user = $session->read('Auth.User'); 
	if ($user != null) :
?>
<div class="userinfo">
	<ul class="sf-menu">
		<li>
			<span><?php __("Language"); ?></span>
			<ul>
				<?php $languages = Configure::read('Settings.languages'); ?>
				<?php foreach ($languages as $code => $label) : ?>
				<li>
					<?php echo $html->link(__($label, true), array("plugin" => false, "controller" => "languages", "action" => "change", $code)); ?>
				</li>
				<?php endforeach; ?>
			</ul>
		</li>
		<li>
			<?php echo $html->link(sprintf(__("Profile (%s)", true), $session->read('Auth.User.username')), array("plugin" => false, "controller" => "users", "action" => "profile")); ?>
			<ul>
				<li>
					<?php echo $html->link(__("Logout", true), array("plugin" => false, "controller" => "users", "action" => "logout")); ?>
				</li>
			</ul>
		</li>
		<li>
			<a href="<?php echo $this->webroot; ?>" title="Air Fair - Bydgoszcz" id="home"><?php __("Website"); ?></a>
		</li>
	</ul>
</div>
<?php endif; ?>