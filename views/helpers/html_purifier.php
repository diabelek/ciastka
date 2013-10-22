<?php
class HtmlPurifierHelper extends Object
{
	var $parser = null;
	var $initialized = false;
	var $helpers = array();
	
	function init(){
		if (!$this->initialized) {
			App::import('Lib','HtmlPurifier');
			$this->parser = new HTMLPurifier();
			
			$this->initialized = true;
		}
	}
	
	function clean_html($text) {
		$this->init();
		
		return $this->parser->purify($text);
	}
}
?>