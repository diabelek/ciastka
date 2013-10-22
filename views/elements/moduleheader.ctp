<?php 
	if (isset($module) && 
		($module == 'articles' || 
		$module == 'calendars' ||
		$module == 'ask_expert' ||
		$module == 'uploads' ||
		$module == 'banners' ||
		$module == 'galleries'||
		$module == 'areas')
	) :
?>
<h1><?php __("CMS"); ?></h1>
<?php 
	elseif (isset($module) && 
		($module == 'newsletter')
	) : 
?>
<h1><?php __("Newsletter"); ?></h1>
<?php 
	elseif (isset($module) && 
		($module == 'permissions')
	) :
?>
<h1><?php __("Permissions"); ?></h1>
<?php 
	elseif (isset($module) && 
		($module == 'settings')
	) :
?>
<h1><?php __("Settings"); ?></h1>
<?php endif; ?>