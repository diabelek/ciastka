<?php 
	$yesNo = array(
		'0' => __('No', true),
		'1' => __('Yes', true)
	);
?>

<div class="calendars index">
	<h2><?php __('Calendars'); ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Calendar', true), array('action' => 'add')); ?></li>
		</ul>
	</div>
	
	<?php echo $this->Form->create('Calendar'); ?>
	<div class="inline filter right" title="<?php __("Filters"); ?>">
		<?php echo $this->Form->input('Filter.calendarCategory_id', array('empty' => true)); ?>
	</div>
	<table cellpadding="0" cellspacing="1">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('published'); ?></th>
			<th><?php echo $this->Paginator->sort('publish_date'); ?></th>
			<th><?php echo $this->Paginator->sort('featured'); ?></th>
			<th><?php echo $this->Paginator->sort('highlight'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('area_id'); ?></th>
			<th class="actions"><?php __('Delete'); ?></th>
		</tr>
		<tr class="filter">
			<td><?php echo $this->Form->input('Filter.id', array('label' => '')) ?></td>
			<td><?php echo $this->Form->input('Filter.title', array('label' => '')) ?></td>
			<td><?php echo $this->Form->input('Filter.published', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td>&nbsp;<?php //echo $this->Form->input('Filter.publish_date', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td><?php echo $this->Form->input('Filter.featured', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td><?php echo $this->Form->input('Filter.highlight', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td>&nbsp;<?php //echo $this->Form->input('Filter.created', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td>&nbsp;<?php //echo $this->Form->input('Filter.modified', array('label' => '', 'options' => $yesNo, 'empty' => true)) ?></td>
			<td><?php echo $this->Form->input('Filter.area_id', array('label' => '', 'empty' => true)) ?></td>
			<td>&nbsp;</td>
		</tr>
		<tr class="filter">
			<td colspan="10"><?php echo $this->Form->submit(__('Apply', true), array('title' => __('Apply', true))); ?></td>
		</tr>
		<?php
		$i = 0;
		foreach ($calendars as $calendar):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr<?php echo $class; ?>>
				<td><?php echo $this->Html->link($calendar['Calendar']['id'], array('action' => 'edit', $calendar['Calendar']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
				<td><?php echo $this->Html->link($calendar['Calendar']['title'], array('action' => 'edit', $calendar['Calendar']['id']), array('class' => 'linkedit')); ?>&nbsp;</td>
				<td><?php
					if ($calendar['Calendar']['published']) {
						echo $this->Html->link(__('Yes', true), array('action' => 'publish', $calendar['Calendar']['id'], 0));
					} else {
						echo $this->Html->link(__('No', true), array('action' => 'publish', $calendar['Calendar']['id'], 1));
					}
				?>&nbsp;</td>
				<td><?php echo $calendar['Calendar']['publish_date']; ?>&nbsp;</td>
				<td><?php
					if ($calendar['Calendar']['featured']) {
						echo $this->Html->link(__('Yes', true), array('action' => 'featured', $calendar['Calendar']['id'], 0));
					} else {
						echo $this->Html->link(__('No', true), array('action' => 'featured', $calendar['Calendar']['id'], 1));
					}
				?>&nbsp;</td>
				<td><?php
					if ($calendar['Calendar']['highlight']) {
						echo $this->Html->link(__('Yes', true), array('action' => 'highlight', $calendar['Calendar']['id'], 0));
					} else {
						echo $this->Html->link(__('No', true), array('action' => 'highlight', $calendar['Calendar']['id'], 1));
					}
				?>&nbsp;</td>
				<td><?php echo $calendar['Calendar']['created']; ?>&nbsp;</td>
				<td><?php echo $calendar['Calendar']['modified']; ?>&nbsp;</td>
				<td><?php echo $calendar['Area']['name']; ?>&nbsp;</td>
				<td class="actions">
					<?php 
						echo $this->Html->link(
							$html->image(
								'icons/delete.png', 
								array('alt' => __('Delete', true), 'title' => __('Delete', true))
							),
							array('action' => 'delete', $calendar['Calendar']['id']), 
							array('escape' => false), 
							sprintf(__('Are you sure you want to delete # %s?', true), $calendar['Calendar']['id'])
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
	<?php echo $this->Form->end(); ?>
</div>