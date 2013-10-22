<?php 
	$yesNo = array(
		'0' => __('No', true),
		'1' => __('Yes', true)
	);
?>

<div class="articles index">
	<h2><?php __('Articles'); ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Article', true), array('action' => 'add')); ?></li>
		</ul>
	</div>

	<?php echo $this->Form->create('Article'); ?>
	<div class="inline filter right" title="<?php __("Filters"); ?>">
		<?php echo $this->Form->input('Filter.category_id', array('empty' => true)); ?>
	</div>
	<table cellpadding="0" cellspacing="1">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('alias'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php __('Author'); ?></th>
			<th><?php echo $this->Paginator->sort('startpage'); ?></th>
			<th><?php echo $this->Paginator->sort('published'); ?></th>
			<th><?php echo $this->Paginator->sort('publish_date'); ?></th>
			<th><?php echo $this->Paginator->sort('archive'); ?></th>
			<th><?php echo $this->Paginator->sort('public'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('area_id'); ?></th>
			<th class="actions"><?php __('Delete'); ?></th>
		</tr>
		<tr class="filter">
			<td><?php echo $this->Form->input('Filter.id', array('label' => '')) ?></td>
			<td><?php echo $this->Form->input('Filter.alias', array('label' => '')) ?></td>
			<td><?php echo $this->Form->input('Filter.title', array('label' => '')) ?></td>
			<td><?php echo $this->Form->input('Filter.author', array('label' => '', 'empty' => true)) ?></td>
			<td><?php echo $this->Form->input('Filter.startpage', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td><?php echo $this->Form->input('Filter.published', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td>&nbsp;<?php //echo $this->Form->input('Filter.publish_date', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td><?php echo $this->Form->input('Filter.archive', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td><?php echo $this->Form->input('Filter.public', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td>&nbsp;<?php //echo $this->Form->input('Filter.created', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td>&nbsp;<?php //echo $this->Form->input('Filter.modified', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td><?php echo $this->Form->input('Filter.area_id', array('label' => '', 'empty' => true)) ?></td>
			<td>&nbsp;</td>
		</tr>
		<tr class="filter">
			<td colspan="13"><?php echo $this->Form->submit(__('Apply', true), array('title' => __('Apply', true))); ?></td>
		</tr>
		<?php
		$i = 0;
		foreach ($articles as $article):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class; ?>>
			<td><?php echo $this->Html->link($article['Article']['id'], array('action' => 'edit', $article['Article']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($article['Article']['alias'], array('action' => 'edit', $article['Article']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($article['Article']['title'], array('action' => 'edit', $article['Article']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
			<td><?php echo $article['User']['firstname']." ".$article['User']['lastname']; ?>&nbsp;</td>
			<td><?php
				if ($article['Article']['startpage']) {
					echo $this->Html->link(__('Yes', true), array('action' => 'startpage', $article['Article']['id'], 0));
				} else {
					echo $this->Html->link(__('No', true), array('action' => 'startpage', $article['Article']['id'], 1));
				}
			?>&nbsp;</td>
			<td><?php
				if ($article['Article']['published']) {
					echo $this->Html->link(__('Yes', true), array('action' => 'publish', $article['Article']['id'], 0));
				} else {
					echo $this->Html->link(__('No', true), array('action' => 'publish', $article['Article']['id'], 1));
				}
			?>&nbsp;</td>
			<td><?php echo $article['Article']['publish_date']; ?>&nbsp;</td>
			<td><?php
				if ($article['Article']['archive']) {
					echo $this->Html->link(__('Yes', true), array('action' => 'archive', $article['Article']['id'], 0));
				} else {
					echo $this->Html->link(__('No', true), array('action' => 'archive', $article['Article']['id'], 1));
				}
			?>&nbsp;</td>
			<td><?php
				if ($article['Article']['public']) {
					echo $this->Html->link(__('Yes', true), array('action' => 'public', $article['Article']['id'], 0));
				} else {
					echo $this->Html->link(__('No', true), array('action' => 'public', $article['Article']['id'], 1));
				}
			?>&nbsp;</td>
			<td><?php echo $article['Article']['created']; ?>&nbsp;</td>
			<td><?php echo $article['Article']['modified']; ?>&nbsp;</td>
			<td><?php echo $article['Area']['name']; ?>&nbsp;</td>
			<td class="actions">
				<?php 
					echo $this->Html->link(
						$html->image(
							'icons/delete.png', 
							array('alt' => __('Delete', true), 'title' => __('Delete', true))
						),
						array('action' => 'delete', $article['Article']['id']), 
						array('escape' => false), 
						sprintf(__('Are you sure you want to delete # %s?', true), $article['Article']['id'])
					);
				?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->Form->end(); ?>
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