<div class="banners index">
	<h2><?php __('Banners');?></h2>
<?php
	foreach ($banners as $banner)
	{
		echo $html->image('banners/big/'.$banner['Banner']['fileName'], array('alt' => $banner['Banner']['name'], 'title' => $banner['Banner']['name']));
		echo '<br/>';
	} 
?>
</div>