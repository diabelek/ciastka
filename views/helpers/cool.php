<?php

class CoolHelper extends AppHelper {

	var $helpers = array('Html', 'Javascript');

	function UpdateBoxCreate($name = null, $url = null, $ajaxId = null, $options = array()) {
		if ($name == null)
			return "";
			
		if ($url == null)
			return "";
		
		$startHidden = "true";
		if (isset($options['startHidden']) && $options['startHidden'] == false)
			$startHidden = "false";

		$loading_div = $this->Html->tag("div", '', array ('id' => $name));
		
		$ajaxUrl = $url;
		if ($ajaxId != null)
			$ajaxUrl .= '/ajaxId:' . $ajaxId;

		$script = "
		<script>
			$('#$name').ajaxUpdatePanel('$ajaxUrl', $startHidden, $ajaxId);
		</script>";

		$result = $loading_div ."\n".$script."\n";

		return $result;
	}
}
?>