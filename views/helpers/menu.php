<?php

class MenuHelper extends AppHelper {
	var $helpers = array('Html', 'Javascript');
	var $orientation = 'horizontal'; //could be horizontal, vertical or navbar
	
	function libs($type = null, $theme = null) {
		if($type != null){
			$this->orientation = $type;
		}
		if ($theme != null)
			$output = $this->Html->css('/js/superfish/css/superfish-'.$theme);
		else
			$output = $this->Html->css('/js/superfish/css/superfish');

		switch($this->orientation){
			case 'vertical':
				if ($theme != null)
					$output .= $this->Html->css('/js/superfish/css/superfish-vertical-'.$theme);
				else
					$output .= $this->Html->css('/js/superfish/css/superfish-vertical');
				break;
			case 'navbar':
//				$output .= $this->Html->css('/js/superfish/css/superfish-navbar');
				break;
			case 'horizontal':
			default:
		}
		//$output .= $this->Javascript->link('/js/superfish/js/hoverIntent');
		$output .= $this->Javascript->link('/js/superfish/js/superfish');
		$output .= $this->Javascript->link('/js/superfish/js/supersubs');
		$output .= $this->Javascript->codeBlock('
				$(document).ready(function(){ 
					$("ul.sf-menu").supersubs({ 
						minWidth:	12,	// minimum width of sub-menus in em units 
						maxWidth:	27,	// maximum width of sub-menus in em units 
						extraWidth:	1	// extra width can ensure lines don\'t sometimes turn over 
										// due to slight rounding differences and font-family 
					}).superfish({ 
						delay:	0,			// one second delay on mouseout
						speed:	\'fast\',	// faster animation speed  
					}).find("ul"); 
				});
			');
		return $output;
	}

	function generate($data, $options = null, $level = 0, $path = array()) {
		if($data == null){
			return '';
		}
		
		$alias = 'Menu';
		if (isset($options['alias']))
			$alias = $options['alias'];
		
		foreach($data as $key => $value){
			
			$sub = '';
			if(isset($value['children']) && count($value['children']) > 0) {
				$sub = $this->generate($value['children'], $options, $level + 1);
			}
			
			$class = '';
			if(isset($sub)){
				$class = 'sf-with-ul';
			}
			
			$image = '';
			if(isset($value[$alias]['icon']) && $value[$alias]['icon'] != '') {
				$image = $this->Html->tag('span',
					$this->Html->image('menus_icons/small/'.$value[$alias]['icon']),
					array('class' => 'menu_image')
				);
			}
			
			$desc = '';
			if(isset($value[$alias]['description']) && $value[$alias]['description'] != '') {
				$desc = $this->Html->tag('span',
					$value[$alias]['description'],
					array('class' => 'menu_description')
				);
			}
			
			if($value[$alias]['link'] != '') {
				//Try to evaluate the link (if starts with array)
				if(eregi('^array', $value[$alias]['link'])) {
					eval("\$parse = " . $value[$alias]['link'] . ";");
					if(is_array($parse)) {
						$value[$alias]['link'] = $parse;
						$value[$alias]['link'][] = $value[$alias]['id'];
					}
				}

				$link = $this->Html->link($image . $this->Html->tag('span', __($value[$alias]['name'], true), array('class' => 'menu_name')) . $desc, $value[$alias]['link'], array('class' => $class, 'escape' => false)); //has link
			} else {
				$link = $this->Html->link($image . $this->Html->tag('span', __($value[$alias]['name'], true), array('class' => 'menu_name')) . $desc, "#", array('class' => $class, 'onclick' => 'return false', 'escape' => false)); //has link
			}
			
			if(isset($sub)) {
				$link = $link.$sub;
			}
			
			$class = "";
			if(in_array($value[$alias]['id'], $path)) {
				$class = 'current';
			}
			
			$id = 'item-' . $value[$alias]['id'];
			
			$li[] = "\n" . str_repeat("\t", ($level+1)) . 
					$this->Html->tag('li', $link, array('class' => $class, 'id' => $id)) .
				"\n" . str_repeat("\t", $level);
		
			if($level == 0) {
				switch($this->orientation) {
					case 'vertical':
						$class = 'sf-menu sf-vertical sf-shadow';
						break;
					case 'navbar':
						$class = 'sf-menu sf-navbar sf-shadow';
						break;
					case 'horizontal':
					default:
						$class = 'sf-menu sf-shadow';
				}
			}
		}
		
		$tree = "\n".str_repeat("\t", $level) . 
				$this->Html->tag('ul', implode("\n", $li), array('class' => 'cakemenu ' . $class . ' ')) . 
			"\n" . str_repeat("\t", $level);
		return $tree;
	}

	function generateNoSf($data, $options = null, $level = 0, $path = array()) {
		if($data == null) {
			return '';
		}
		
		$alias = 'Menu';
		if (isset($options['alias']))
			$alias = $options['alias'];
			
		$icon = 'true';
		if (isset($options['icon']))
			$icon = $options['icon'];
		
		foreach($data as $key => $value){
			
			$sub = '';
			if(isset($value['children']) && count($value['children']) > 0) {
				$sub = $this->generateNoSf($value['children'], $options, $level + 1);
			}
			
			$class = '';
			if(isset($sub)){
				$class = 'parrent';
			}
			
			$image = '';
			if ($icon == true){
				if(isset($value[$alias]['icon']) && $value[$alias]['icon'] != '') {
					$image = $this->Html->tag('span',
						$this->Html->image($value[$alias]['icon']),
						array('class' => 'menu_image')
					);
				}
			}
			
			$desc = '';
			if(isset($value[$alias]['description']) && $value[$alias]['description'] != '') {
				$desc = $this->Html->tag('span',
					$value[$alias]['description'],
					array('class' => 'menu_description')
				);
			}
			
			if($value[$alias]['link'] != ''){
				//Try to evaluate the link (if starts with array)
				if(eregi('^array', $value[$alias]['link'])){
					eval("\$parse = ".$value[$alias]['link'].";");
					if(is_array($parse)){
						$value[$alias]['link'] = $parse;
						$value[$alias]['link'][] = $value[$alias]['id'];
					}
				}

				$link = $this->Html->link($image . $this->Html->tag('span', __($value[$alias]['name'], true), array('class' => 'menu_name')) . $desc, $value[$alias]['link'], array('class' => $class, 'escape' => false)); //has link
			} else {
				$link = $this->Html->tag('span', $image . $this->Html->tag('span', __($value[$alias]['name'], true), array('class' => 'menu_name')) . $desc, array('class' => $class.' no_link_menu')); //no link
			}
			if(isset($sub)){
				$link = $link.$sub;
			}
			$class = "";
			if(in_array($value[$alias]['id'], $path)){
				$class = 'current';
			}
			
			$id = 'item-' . $value[$alias]['id'];
			
			$li[] = "\n" . str_repeat("\t", ($level + 1)) . 
					$this->Html->tag('li', $link, array('class' => $class, 'id' => $id)) .
				"\n" . str_repeat("\t", $level);
		}
		
		$tree = "\n".str_repeat("\t", $level) . 
				$this->Html->tag('ul', implode("\n", $li), array('class' => 'cakemenu ' . $class . ' ')) . 
			"\n" . str_repeat("\t", $level);
		return $tree;
	}

	function generateCategory($data, $options = null, $level = 0, $path = array()) {
		if($data == null) {
			return '';
		}

		$alias = 'Category';
		if (isset($options['alias']))
			$alias = $options['alias'];

		$action = 'category';
		if (isset($options['action']))
			$action = $options['action'];

		$controller = 'articles';
		if (isset($options['controller']))
			$controller = $options['controller'];
		
		foreach($data as $key => $value) {
			
			$sub = '';
			if(isset($value['children']) && count($value['children']) > 0) {
				$sub = $this->generateCategory($value['children'], $options, $level + 1);
			}
			
			$class = '';
			if(isset($sub)) {
				$class = 'parrent';
			}
			
			$link = $this->Html->link($this->Html->tag('span', __($value[$alias]['name'], true)), array('controller' => $controller, 'action' => $action, $value[$alias]['alias']), array('class' => $class, 'escape' => false)); //has link
			
			if(isset($sub)) {
				$link = $link.$sub;
			}
			
			$class = "";
			if(in_array($value[$alias]['id'], $path)){
				$class = 'current';
			}
			
			$id = 'category-' . $value[$alias]['id'];
			
			$li[] = "\n" . str_repeat("\t", ($level + 1)) . 
					$this->Html->tag('li', $link, array('class' => $class, 'id' => $id)) .
				"\n" . str_repeat("\t", $level);
		}
		
		$tree = "\n".str_repeat("\t", $level) . 
				$this->Html->tag('ul', implode("\n", $li), array('class' => $class)) . 
			"\n" . str_repeat("\t", $level);
			
		return $tree;
	}

	function generateCategorySF($data, $options = null, $level = 0, $path = array()) {
		if($data == null){
			return '';
		}
		
		$alias = 'Category';
		if (isset($options['alias']))
			$alias = $options['alias'];

		$action = 'category';
		if (isset($options['action']))
			$action = $options['action'];

		$controller = 'articles';
		if (isset($options['controller']))
			$controller = $options['controller'];
		
		foreach($data as $key => $value){
			
			$sub = '';
			if(isset($value['children']) && count($value['children']) > 0) {
				$sub = $this->generateCategorySF($value['children'], $options, $level + 1);
			}
			
			$class = '';
			if(isset($sub)){
				$class = 'sf-with-ul';
			}

			$desc = '';
			if(isset($value[$alias]['description']) && $value[$alias]['description'] != '') {
				$desc = $this->Html->tag('span',
					$value[$alias]['description'],
					array('class' => 'menu_description')
				);
			}
			
			$link = $this->Html->link($this->Html->tag('span', __($value[$alias]['name'], true)), array('controller' => $controller, 'action' => $action, $value[$alias]['alias']), array('class' => $class, 'escape' => false)); //has link
			
			if(isset($sub)) {
				$link = $link.$sub;
			}
			
			$class = "";
			if(in_array($value[$alias]['id'], $path)) {
				$class = 'current';
			}
			
			$id = 'item-' . $value[$alias]['id'];
			
			$li[] = "\n" . str_repeat("\t", ($level+1)) . 
					$this->Html->tag('li', $link, array('class' => $class, 'id' => $id)) .
				"\n" . str_repeat("\t", $level);
		
			if($level == 0) {
				switch($this->orientation) {
					case 'vertical':
						$class = 'sf-menu sf-vertical sf-shadow';
						break;
					case 'navbar':
						$class = 'sf-menu sf-navbar sf-shadow';
						break;
					case 'horizontal':
					default:
						$class = 'sf-menu sf-shadow';
				}
			}
		}

		$tree = "\n".str_repeat("\t", $level) . 
				$this->Html->tag('ul', implode("\n", $li), array('class' => 'cakemenu ' . $class . ' ')) . 
			"\n" . str_repeat("\t", $level);
		return $tree;
	}

	function getCurrentMenuItem($data, $id, $options = null) {
		$alias = 'Menu';
		if (isset($options['alias']))
			$alias = $options['alias'];

		foreach($data as $key => $value){
			if ($value[$alias]['id'] == $id){
				return $value;
			}

			if(isset($value['children']) && count($value['children']) > 0) {
				$result = $this->getCurrentMenuItem($value['children'], $id, $options);
				if ($result != null)
					return $result;
			}
		}
		
		return null;
	}
}