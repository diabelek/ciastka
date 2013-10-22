<?php
App::import('View', 'Theme');

class CmsView extends ThemeView {
	
	function widget($name, $params = array(), $loadHelpers = false) {
		return $this->element("widgets/$name", $params, $loadHelpers);
	}
}
?>