<div class="uploads index">
	<h2><?php __('Uploads');?></h2>
		<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Upload', true), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="1">
	<tr>
			<th><?php __('id'); ?></th>
			<th><?php __('title'); ?></th>
			<th><?php __('filename'); ?></th>
			<th><?php __('Sorting'); ?></th>
			<th><?php __('filetype'); ?></th>
			<th><?php __('filesize'); ?></th>
			<th><?php __('path'); ?></th>
			<th class="actions"><?php __('Delete'); ?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($uploads as $upload):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link($upload['Upload']['id'], array('action' => 'edit', $upload['Upload']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($upload['Upload']['title'], array('action' => 'edit', $upload['Upload']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($upload['Upload']['filename'], array('action' => 'edit', $upload['Upload']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
		<td>
		<?php echo $this->Html->link($html->image(
					'icons/arrow_up.png', 
					array('alt' => __('up', true), 'title' => __('up', true))
				), array('action' => 'move', $upload['Upload']['id'], 'up'), array('escape' => false)); ?>
		<?php echo $this->Html->link($html->image(
					'icons/arrow_down.png', 
					array('alt' => __('down', true), 'title' => __('down', true))
				), array('action' => 'move', $upload['Upload']['id'], 'down'), array('escape' => false)); ?>
		</td>
		<td><?php echo $upload['Upload']['filetype']; ?>&nbsp;</td>
		<td><?php echo $upload['Upload']['filesize']; ?>&nbsp;</td>
		<td><?php echo $upload['Upload']['path']; ?>&nbsp;</td>
		<td class="actions">
			<?php 
				echo $this->Html->link(
					$html->image(
						'icons/delete.png', 
						array('alt' => __('Delete', true), 'title' => __('Delete', true))
					), 
					array('action' => 'delete', $upload['Upload']['id']), 
					array('escape' => false), 
					sprintf(__('Are you sure you want to delete # %s?', true), $upload['Upload']['id'])); ?>
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
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>