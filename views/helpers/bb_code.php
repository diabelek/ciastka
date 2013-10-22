<?php
class BbCodeHelper extends Object
{
	var $parser = null;
	var $initialized = false;
	var $helpers = array();
	
	function init(){
		if (!$this->initialized) {
			App::import('Lib','BbCode');
			$this->parser = new BbCode();
			
			$this->initialized = true;
		}
	}
	
	function parse($text){
		$this->init();
		
		return $this->parser->parse($text);
	}
}
?>