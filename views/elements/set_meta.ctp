<?php
	if (isset($model) && is_array($model))
	{
		$meta_for_layout = array();
		if (array_key_exists('meta_keyowrds', $model))
		{
			$meta_for_layout['meta_keyowrds'] = $model['meta_keyowrds'];
		}
		if (array_key_exists('meta_description', $model))
		{
			$meta_for_layout['meta_description'] = $model['meta_description'];
		}
		$this->set($meta_for_layout, 'meta_for_layout');
	}
?>