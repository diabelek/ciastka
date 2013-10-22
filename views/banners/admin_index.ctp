<div class="banners index">
	<h2><?php __('Banners'); ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Banner', true), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="1">
		<tr>
			<th><?php __('id'); ?></th>
			<th><?php __('name'); ?></th>
			<th><?php __('link'); ?></th>
			<th><?php __('Sorting'); ?></th>
			<th><?php __('published'); ?></th>
			<th><?php __('publish_date'); ?></th>
			<th class="actions"><?php __('Delete'); ?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($banners as $banner):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class; ?>>
			<td><?php echo $this->Html->link($banner['Banner']['id'], array('action' => 'edit', $banner['Banner']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($banner['Banner']['name'], array('action' => 'edit', $banner['Banner']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
			<td><?php echo $banner['Banner']['link']; ?>&nbsp;</td>
			<td>
				<?php echo $this->Html->link($html->image(
						'icons/arrow_up.png', 
						array('alt' => __('up', true), 'title' => __('up', true))
					), array('action' => 'move', $banner['Banner']['id'], 'up'), array('escape' => false)); ?>
				<?php echo $this->Html->link($html->image(
						'icons/arrow_down.png', 
						array('alt' => __('down', true), 'title' => __('down', true))
					), array('action' => 'move', $banner['Banner']['id'], 'down'), array('escape' => false)); ?>
			</td>
			<td><?php
				if ($banner['Banner']['published']) {
					echo $this->Html->link(__('Yes', true), array('action' => 'publish', $banner['Banner']['id'], 0));
				} else {
					echo $this->Html->link(__('No', true), array('action' => 'publish', $banner['Banner']['id'], 1));
				}
			?>&nbsp;</td>
			<td><?php echo $banner['Banner']['publish_date']; ?>&nbsp;</td>
			<td class="actions">
			<?php 
				echo $this->Html->link(
					$html->image(
						'icons/delete.png', 
						array('alt' => __('Delete', true), 'title' => __('Delete', true))
					), 
					array('action' => 'delete', $banner['Banner']['id']), 
					array('escape' => false), 
					sprintf(__('Are you sure you want to delete # %s?', true), $banner['Banner']['id'])); ?>
			</td>
		</tr>
		<?php endforeach; ?>
			</table>
			<p>
		<?php
				echo $this->Paginator->counter(array(
					'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
				));
		?>	</p>

			<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled')); ?>
			 | 	<?php echo $this->Paginator->numbers(); ?>
				|
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
	</div>
</div>