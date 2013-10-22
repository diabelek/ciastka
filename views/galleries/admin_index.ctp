<div class="galleries index">
	<h2><?php __('Galleries');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gallery', true), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="1">
		<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('published');?></th>
			<th><?php echo $this->Paginator->sort('publish_date');?></th>
			<th class="actions"><?php __('Delete'); ?></th>
			<th class="actions"><?php __('Photos'); ?></th>
		</tr>
	<?php
	$i = 0;
	foreach ($galleries as $gallery):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Html->link($gallery['Gallery']['id'], array('action' => 'edit', $gallery['Gallery']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($gallery['Gallery']['name'], array('action' => 'edit', $gallery['Gallery']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
			<td><?php echo $gallery['Gallery']['created']; ?>&nbsp;</td>
			<td><?php echo $gallery['Gallery']['modified']; ?>&nbsp;</td>
			<td><?php
					if ($gallery['Gallery']['published']) {
						echo $this->Html->link(__('Yes', true), array('action' => 'publish', $gallery['Gallery']['id'], 0));
					} else {
						echo $this->Html->link(__('No', true), array('action' => 'publish', $gallery['Gallery']['id'], 1));
					}
				?>&nbsp;</td>
			<td><?php echo $gallery['Gallery']['publish_date']; ?>&nbsp;</td>
			<td class="actions">
				<?php 
					echo $this->Html->link(
						$html->image(
							'icons/delete.png', 
							array('alt' => __('Delete', true), 'title' => __('Delete', true))
						), 
						array('action' => 'delete', $gallery['Gallery']['id']), 
						array('escape' => false), 
						sprintf(__('Are you sure you want to delete # %s?', true), $gallery['Gallery']['id'])); ?>
			</td>
			<td class="actions">
				<?php 
					echo $this->Html->link(
						$html->image(
							'icons/photos.png', 
							array('alt' => __('Photos', true), 'title' => __('Photos', true))
						), 
						array('controller' => 'photos', 'action' => 'index', $gallery['Gallery']['id']),
						array('escape' => false)); ?>
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