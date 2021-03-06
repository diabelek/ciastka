<div class="exp_categories index">
	<h2><?php __('Expoert Categories'); ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Category Category', true), array('action' => 'add')); ?></li>
		</ul>
	</div>
	
	<table cellpadding="0" cellspacing="1">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php __('Delete'); ?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($categories as $category):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class; ?>>
			<td><?php echo $this->Html->link($category['ExpCategory']['id'], array('action' => 'edit', $category['ExpCategory']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($category['ExpCategory']['name'], array('action' => 'edit', $category['ExpCategory']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
			<td class="actions">
				<?php 
					echo $this->Html->link(
						$html->image(
							'icons/delete.png', 
							array('alt' => __('Delete', true), 'title' => __('Delete', true))
						),
						array('action' => 'delete', $category['ExpCategory']['id']), 
						array('escape' => false), 
						sprintf(__('Are you sure you want to delete # %s?', true), $category['ExpCategory']['id'])
					);
				?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<p>
		<?php
				echo $this->Paginator->counter(array(
					'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
				));
		?>
	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled')); ?>
		 | <?php echo $this->Paginator->numbers(); ?>
		 | <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
	</div>
</div>