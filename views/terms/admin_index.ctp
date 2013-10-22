<div class="terms index">
	<h2><?php __('Terms'); ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Term', true), array('action' => 'add', $calendar_id)); ?></li>
		</ul>
	</div>
	
	<table cellpadding="0" cellspacing="1">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('eventdate'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php __('Delete'); ?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($terms as $term):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr<?php echo $class; ?>>
				<td><?php echo $this->Html->link($term['Term']['id'], array('action' => 'edit', $term['Term']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
				<td><?php echo $this->Html->link($term['Term']['eventdate'], array('action' => 'edit', $term['Term']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
				<td><?php echo $term['Term']['created']; ?>&nbsp;</td>
				<td><?php echo $term['Term']['modified']; ?>&nbsp;</td>
				<td class="actions">
					<?php 
						echo $this->Html->link(
							$html->image(
								'icons/delete.png', 
								array('alt' => __('Delete', true), 'title' => __('Delete', true))
							),
							array('action' => 'delete', $term['Term']['id']), 
							array('escape' => false), 
							sprintf(__('Are you sure you want to delete # %s?', true), $term['Term']['id'])
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
		?>	</p>

			<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled')); ?>
		 | <?php echo $this->Paginator->numbers(); ?>
		 | <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
	</div>
</div>