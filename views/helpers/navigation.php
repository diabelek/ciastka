<?php

class NavigationHelper extends AppHelper {
	var $helpers = array('Html', 'Javascript');

	function arrayToTreeList($data, $alias, $display, $currentPath, $options = null) {
		
		$this->Html->css('storagetree', null, array('inline' => false));
		
		$output = $this->Html->tag('div', $this->createTreeNode($data, $alias, $display, $currentPath, $options), array('class' => 'dir_tree'));
		$output .= $this->Javascript->link('storagetree');
		
		return $output;
	}
	
	function arrayToNavigation($data, $alias, $display, $currentPath, $options = null) {
	
		$this->Html->css('storagenav', null, array('inline' => false));
		
		$output = $this->Html->tag('div', $this->Html->tag('ul', $this->createNavNode($data, $alias, $display, $currentPath, $options)), array('class' => 'dir_navbar'));
		//$output .= $this->Javascript->link('storagenav');
		
		return $output;
	}
	
	private function createTreeNode($data, $alias, $display, $currentPath, $options = null) {
		if($data == null){
			return '';		
		}
		
		if(count($data) == 0) {
			return '';
		}
		
		//options
		$useDirImage = true;
		if (isset($options['useDirImage']))
			$useDirImage = $options['useDirImage'];
			
		$useDirLinks = true;
		if (isset($options['useDirLinks']))
			$useDirLinks = $options['useDirLinks'];
		
		$output = '';
		
		$li = '';
		foreach ($data as $node)
		{
			$liclass = '';
			$lioptions = array();
			
			if ($currentPath != null)
			{
				if ($currentPath[0] == $node[$alias]['id'])
					$liclass = 'current';
					
				if ($node[$alias]['childs'] != null && count($node[$alias]['childs']) > 0)
				{
					if ($liclass != '')
						$liclass .= ' ';
						
					$liclass .= 'haschild';
					
					if (in_array($node[$alias]['id'], $currentPath) == true) 
					{
						$liclass .= ' uncollapsed';
					}
					else
					{
						$liclass .= ' collapsed';
					}
				}
			}
			else
			{
				if ($node[$alias]['childs'] != null && count($node[$alias]['childs']) > 0)
				{
					$liclass .= 'haschild collapsed';
				}
			}
			
			if ($liclass != '')
				$lioptions['class'] = $liclass;
					
			if ($useDirImage == true)
				$linktext = $this->Html->image('dirtree/dir.png') . " " . $node[$alias][$display];
			else
				$linktext = $node[$alias][$display];
				
			$divtext = $this->Html->link($linktext, array('action' => 'index', $node[$alias]['id']), array('escape' => false));
			if ($useDirLinks == true)
			{
				$divtext = $divtext . " " . 
					$this->Html->link(__('Edit', true), array('action' => 'edit', $node[$alias]['id'])) . " " . 
					$this->Html->link(__('Add subfolder', true), array('action' => 'add', $node[$alias]['id']));
			}
			
			$li .= $this->Html->tag('li', 
				$this->Html->tag('div', $divtext) . 
				$this->createTreeNode($node[$alias]['childs'], $alias, $display, $currentPath, $options),
				$lioptions
			);
		}
		
		$output .= $this->Html->tag('ul', $li);		
		
		return $output;
	}
	
	private function createNavNode($data, $alias, $display, $currentPath, $options = null) {
		if($data == null){
			return '';		
		}
		
		if(count($data) == 0) {
			return '';
		}
		
		//options
		$useDirImage = true;
		if (isset($options['useDirImage']))
			$useDirImage = $options['useDirImage'];
		
		$output = '';
		foreach ($data as $node)
		{
			if ($currentPath != null)
			{
				if (in_array($node[$alias]['id'], $currentPath) == true) 
				{
					if ($useDirImage == true)
						$linktext = $this->Html->image('dirtree/dir.png') . " " . $node[$alias][$display];
					else
						$linktext = $node[$alias][$display];
					
					$inner = $this->Html->link($linktext, array('action' => 'index', $node[$alias]['id']), array('escape' => false));
					
					if ($node[$alias]['childs'] != null && count($node[$alias]['childs']) > 0) {
						$childs = '';
						foreach ($node[$alias]['childs'] as $child)
						{
							if ($useDirImage == true)
								$childlinktext = $this->Html->image('dirtree/dir.png') . " " . $child[$alias][$display];
							else
								$childlinktext = $child[$alias][$display];
								
							$childs .= $this->Html->tag('li', 
								$this->Html->link($childlinktext, array('action' => 'index', $child[$alias]['id']), array('escape' => false))
							);
						}
						
						$inner .= $this->Html->tag('ul', $childs);
					}
					
					$output .= $this->Html->tag('li', $inner);
					
					if ($node[$alias]['childs'] != null && count($node[$alias]['childs']) > 0)
					{
						if ($currentPath[0] != $node[$alias]['id'])
							$output .= $this->Html->tag('li', '>');	

						$output .= $this->createNavNode($node[$alias]['childs'], $alias, $display, $currentPath, $options);
					}
				}				
			}
		}
		
		return $output;
	}

	function treearrayToTreeList($data, $alias, $display, $activeId = null, $options = null) {
		print_r($data);
	}
}