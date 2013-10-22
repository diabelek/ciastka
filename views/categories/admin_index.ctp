<?php 
	$yesNo = array(
		'0' => __('No', true),
		'1' => __('Yes', true)
	);
?>

<div class="categories index">
	<h2><?php __('Categories'); ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Category', true), array('action' => 'add')); ?></li>
		</ul>
	</div>

	<?php echo $this->Form->create('Category'); ?>
	<table cellpadding="0" cellspacing="1">
		<tr>
			<th><?php __('ID'); ?></th>
			<th><?php __('Alias'); ?></th>
			<th><?php __('Name'); ?></th>
			<th><?php __('Sorting'); ?></th>
			<th><?php __('Published'); ?></th>
			<th><?php __('Publish date'); ?></th>
			<th><?php __('Area'); ?></th>
			<th><?php __('Delete'); ?></th>
		</tr>
		<tr class="filter">
			<td><?php echo $this->Form->input('Filter.id', array('label' => '')) ?></td>
			<td><?php echo $this->Form->input('Filter.alias', array('label' => '')) ?></td>
			<td><?php echo $this->Form->input('Filter.name', array('label' => '')) ?></td>
			<td>&nbsp;<?php //echo $this->Form->input('Filter.sorting', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td><?php echo $this->Form->input('Filter.published', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td>&nbsp;<?php //echo $this->Form->input('Filter.publish_date', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td><?php echo $this->Form->input('Filter.area_id', array('label' => '', 'empty' => true)) ?></td>
			<td>&nbsp;</td>
		</tr>
		<tr class="filter">
			<td colspan="8"><?php echo $this->Form->submit(__('Apply', true), array('title' => __('Apply', true))); ?></td>
		</tr>
		<?php
		$i = 0;
		foreach ($category_list as $key => $node):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}

			$curcategory = null;
			foreach ($category_flat_list as $category) {
				if ($category['Category']['id'] == $key) {
					$curcategory = $category;
					break;
				}
			}
			
			if ($curcategory == null)
				continue;
		?>
		<tr <?php echo $class; ?>>
			<td style="text-align: center;"><?php echo $this->Html->link($key, array('action' => 'edit', $key), array('class' => 'linkedit', 'escape' => false)); ?></td>
			<td style="text-align: left"><?php echo $this->Html->link($node, array('action' => 'edit', $key), array('class' => 'linkedit', 'escape' => false)); ?></td>
			<td style="text-align: left"><?php echo $this->Html->link($curcategory['Category']['name'], array('action' => 'edit', $key), array('class' => 'linkedit', 'escape' => false)); ?></td>
			<td>
				<?php 
					echo $this->Html->link(
						$html->image(
							'icons/arrow_up.png', 
							array('alt' => __('up', true), 'title' => __('up', true))
						),
						array('action' => 'move', $key, 'up'), array('escape' => false)
					);

					echo $this->Html->link(
						$html->image(
							'icons/arrow_down.png',
							array('alt' => __('down', true), 'title' => __('down', true))
						),
						array('action' => 'move', $key, 'down'), array('escape' => false)
					);
				?>
			</td>
			<td>
				<?php
					if ($curcategory['Category']['published']) {
						echo $this->Html->link(__('Yes', true), array('action' => 'publish', $curcategory['Category']['id'], 0));
					} else {
						echo $this->Html->link(__('No', true), array('action' => 'publish', $curcategory['Category']['id'], 1));
					}
				?>
			</td>
			<td><?php echo $curcategory['Category']['publish_date']; ?></td>
			<td><?php echo $curcategory['Area']['name']; ?></td>
			<td class="actions">
				<?php 
					echo $this->Html->link(
						$html->image(
							'icons/delete.png', 
							array('alt' => __('Delete', true), 'title' => __('Delete', true))
						),
						array('action' => 'delete', $key),
						array('escape' => false), 
						sprintf(__('Are you sure you want to delete # %s?', true), $key)
					);
				?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->Form->end(); ?>
</div>