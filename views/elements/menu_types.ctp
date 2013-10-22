<?php $modules = Configure::read('Settings.modules'); ?>
		<div class='input buttonLinks'>
			<a href="#" class="item-selection buttonLink" title="/"><?php __('Main page'); ?></a>
			<a href="#" class="allow-edit buttonLink" title="link"><?php __('Link'); ?></a>
			<a href="#" class="item-selection buttonLink" title="array('plugin'=>false, 'controller'=>'articles', 'action'=>'archive')"><?php __('Archive'); ?></a>
			<a href="#" class="item-selection buttonLink" title="array('plugin'=>false, 'controller'=>'menus', 'action'=>'sitemap')"><?php __('Site map'); ?></a>
			<?php
				echo $this->Html->link(__('Article', true), array('plugin' => false, 'controller' => 'articles', 'action' => 'get'), array('class' => 'display-in-box buttonLink', 'title' => __('link', true)));
				echo $this->Html->link(__('Category', true), array('plugin' => false, 'controller' => 'categories', 'action' => 'get'), array('class' => 'display-in-box buttonLink', 'title' => __('link', true)));
			?>
			<?php if (isset($modules['calendars']) && $modules['calendars'] == true): ?>
			<?php
				echo $this->Html->link(__('Calendar', true), array('plugin' => false, 'controller' => 'calendars', 'action' => 'get'), array('class' => 'display-in-box buttonLink', 'title' => __('link', true)));
				echo $this->Html->link(__('Calendar Category', true), array('plugin' => false, 'controller' => 'calendar_categories', 'action' => 'get'), array('class' => 'display-in-box buttonLink', 'title' => __('link', true)));
			?>
			<?php endif; ?>
			<?php if (isset($modules['galleries']) && $modules['galleries'] == true): ?>
			<a href="#" class="item-selection buttonLink" title="array('plugin'=>false, 'controller'=>'galleries', 'action'=>'index')"><?php __('Galleries'); ?></a>
			<?php
				echo $this->Html->link(__('Gallery', true), array('plugin' => false, 'controller' => 'galleries', 'action' => 'get'), array('class' => 'display-in-box buttonLink', 'title' => __('link', true)));
			?>
			<?php endif; ?>
			<?php if (isset($modules['uploads']) && $modules['uploads'] == true): ?>
			<?php
				echo $this->Html->link(__('Upload', true), array('plugin' => false, 'controller' => 'uploads', 'action' => 'get'), array('class' => 'display-in-box buttonLink', 'title' => __('link', true)));
			?>
			<?php endif; ?>
		</div>
		<div class="clear"></div>