<div class="photos index">
	<h2><?php __('Photos'); ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Photo', true), array('action' => 'add', $gallery_id)); ?></li>
			<li><?php echo $this->Html->link(__('Add Photos', true), array('action' => 'manage', $gallery_id)); ?></li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="1">
		<tr>
			<th><?php __('id'); ?></th>
			<th><?php __('name'); ?></th>
			<th class="actions"><?php __('Delete'); ?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($photos as $photo):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr<?php echo $class; ?>>
				<td><?php echo $this->Html->link($photo['Photo']['id'], array('action' => 'edit', $photo['Photo']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
				<td><?php echo $this->Html->link($photo['Photo']['name'], array('action' => 'edit', $photo['Photo']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
				<td class="actions">
				<?php 
					echo $this->Html->link(
						$html->image(
							'icons/delete.png', 
							array('alt' => __('Delete', true), 'title' => __('Delete', true))
						), 
						array('action' => 'delete', $photo['Photo']['id']), 
						array('escape' => false), 
						sprintf(__('Are you sure you want to delete # %s?', true), $photo['Photo']['id'])); ?>
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