<div class="categories index">
	<h2><?php __('Select Calendar Category'); ?></h2>
	<table cellpadding="0" cellspacing="1">
		<tr>
			<th><?php echo __('id'); ?></th>
			<th><?php echo __('name'); ?></th>
			<th><?php echo __('alias'); ?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($calendar_category_list as $key => $value): ?>
		<?php
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}

			foreach ($calendar_category_flat_list as $category) {
				if ($category['CalendarCategory']['id'] == $key) {
					$curcategory = $category;
					break;
				}
			}
		?>
			<tr <?php echo $class; ?>>
				<td><a href="#" class="item-selection" title="array('plugin'=>false, 'controller'=>'calendars', 'action'=>'category', '<?php echo $curcategory['CalendarCategory']['alias']; ?>')"><?php echo $key; ?></a></td>
				<td><a href="#" class="item-selection" title="array('plugin'=>false, 'controller'=>'calendars', 'action'=>'category', '<?php echo $curcategory['CalendarCategory']['alias']; ?>')"><?php echo $curcategory['CalendarCategory']['name']; ?></a></td>
				<td><a href="#" class="item-selection" title="array('plugin'=>false, 'controller'=>'calendars', 'action'=>'category', '<?php echo $curcategory['CalendarCategory']['alias']; ?>')"><?php echo $curcategory['CalendarCategory']['alias']; ?></a></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>