<?php 
	$yesNo = array(
		'0' => __('No', true),
		'1' => __('Yes', true)
	);
	
	$groups = Configure::read('Settings.menu_groups');
?>

<div class="menu index">
	<h2><?php __('Menu tree'); ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Menu', true), array('action' => 'add')); ?></li>
		</ul>
		<div style="clear: both"></div>
	</div>
	<?php echo $this->Form->create('Menu'); ?>
	<table cellpadding="0" cellspacing="1">
		<tr>
			<th><?php __('ID'); ?></th>
			<th><?php __('Menu'); ?></th>
			<th><?php __('Banner'); ?></th>
			<th><?php __('Group'); ?></th>
			<th><?php __('Sorting'); ?></th>
			<th><?php __('Published'); ?></th>
			<th><?php __('Publish date'); ?></th>
			<th><?php __('Delete'); ?></th>
		</tr>
		<tr class="filter">
			<td><?php echo $this->Form->input('Filter.id', array('label' => '')) ?></td>
			<td><?php echo $this->Form->input('Filter.name', array('label' => '')) ?></td>
			<td><?php echo $this->Form->input('Filter.banner', array('label' => '')) ?></td>
			<td><?php echo $this->Form->input('Filter.group', array('label' => '', 'options' => $groups, 'empty' => true)) ?></td>
			<td>&nbsp;<?php //echo $this->Form->input('Filter.sorting', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td><?php echo $this->Form->input('Filter.published', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td>&nbsp;<?php //echo $this->Form->input('Filter.publish_date', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td>&nbsp;</td>
		</tr>
		<tr class="filter">
			<td colspan="7"><?php echo $this->Form->submit(__('Apply', true), array('title' => __('Apply', true))); ?></td>
		</tr>
		<?php
		$i = 0;
		foreach ($menu_list as $key => $node): ?>
		<?php
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
			
			$curmenu = null;
			foreach ($menu_flat_list as $menu) {
				if ($menu['Menu']['id'] == $key) {
					$curmenu = $menu;
					break;
				}
			}
			
			if ($curmenu == null)
				continue;
		?>
			<tr <?php echo $class; ?>>
				<td><?php echo $this->Html->link($key, array('action' => 'edit', $key), array('class' => 'linkedit', 'escape' => false)); ?></td>
				<td style="text-align: left"><?php echo $this->Html->link($node, array('action' => 'edit', $key), array('class' => 'linkedit', 'escape' => false)); ?></td>
				<td style="text-align: left"><?php echo $curmenu['Menu']['banner']; ?></td>
				<td style="text-align: left"><?php echo $groups[$curmenu['Menu']['group_id']]; ?></td>
				<td>
					<?php echo $this->Html->link($html->image(
							'icons/arrow_up.png', 
							array('alt' => __('up', true), 'title' => __('up', true))
						), array('action' => 'move', $key, 'up'), array('escape' => false)); ?>
					<?php echo $this->Html->link($html->image(
							'icons/arrow_down.png', 
							array('alt' => __('down', true), 'title' => __('down', true))
						), array('action' => 'move', $key, 'down'), array('escape' => false)); ?>
				</td>
				<td><?php
					if ($curmenu['Menu']['published']) {
						echo $this->Html->link(__('Yes', true), array('action' => 'publish', $curmenu['Menu']['id'], 0));
					} else {
						echo $this->Html->link(__('No', true), array('action' => 'publish', $curmenu['Menu']['id'], 1));
					}
				?></td>
				<td><?php echo $curmenu['Menu']['publish_date']; ?></td>
			<td class="actions">
				<?php 
					echo $this->Html->link(
						$html->image(
							'icons/delete.png', 
							array('alt' => __('Delete', true), 'title' => __('Delete', true))
						), 
						array('action' => 'delete', $key), 
						array('escape' => false), 
						sprintf(__('Are you sure you want to delete # %s?', true), $key)); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->Form->end(); ?>
</div>