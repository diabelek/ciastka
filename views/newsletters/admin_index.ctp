<div class="newsletters index">
	<h2><?php __('Newsletters');?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Newsletter', true), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<table cellpadding="0" cellspacing="1">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('author');?></th>
			<th class="actions"><?php __('Delete');?></th>
			<th class="actions"><?php __('Send');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($newsletters as $newsletter):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link($newsletter['Newsletter']['id'], array('action' => 'edit', $newsletter['Newsletter']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($newsletter['Newsletter']['title'], array('action' => 'edit', $newsletter['Newsletter']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
		<td><?php echo $newsletter['Newsletter']['created']; ?>&nbsp;</td>
		<td><?php echo $newsletter['Newsletter']['modified']; ?>&nbsp;</td>
		<td><?php echo $newsletter['User']['username']; ?></td>		
		<td class="actions">
		<?php 
			echo $this->Html->link(
				$html->image(
					'icons/delete.png', 
					array('alt' => __('Delete', true), 'title' => __('Delete', true))
				), 
				array('action' => 'delete', $newsletter['Newsletter']['id']), 
				array('escape' => false), 
				sprintf(__('Are you sure you want to delete # %s?', true), $newsletter['Newsletter']['id'])); ?>
		</td>
		<td class="actions">
		<?php 
			echo $this->Html->link(
				//$html->image(
				//	'icons/delete.png', 
				//	array('alt' => __('Delete', true), 'title' => __('Delete', true))
				//), 
				__('Send', true),
				array('action' => 'send', $newsletter['Newsletter']['id'])//, 
				//array('escape' => false), 
				); ?>
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