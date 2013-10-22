<?php 
	if (!isset($image))
		$image = false; 

	if (!isset($languages))
		$languages = Configure::read('Settings.languages');

	if (!isset($filetype))
		$filetype = 'jpg';

	$urlparams = array('language' => '', 'controller' => $this->params['controller'], 'action' => $this->params['action']);
	$urlparams = am($urlparams, $this->params['pass'])
?>
<ul id="languages">
	<?php foreach ($languages as $code => $label) : ?>
	<li>
		<?php 
			$urlparams['language'] = $code;
			if ($image === true)
				echo $html->link($html->image("langs/$code.$filetype", array('alt' => __($label, true), 'title' => __($label, true))), $urlparams, array('escape' => false));
			else
				echo $html->link(__($label, true), $urlparams);
		?>
	</li>
	<?php endforeach; ?>
</ul>