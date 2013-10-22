<div class="calendars index" id="box">
	<h2><?php __('Select Calendar'); ?></h2>
	<table cellpadding="0" cellspacing="1">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
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
				<td><a href="#" class="item-selection" title="array('plugin'=>false, 'controller'=>'calendars', 'action'=>'show', '<?php echo $calendar['Calendar']['id']; ?>')"><?php echo $calendar['Calendar']['id'] ?>&nbsp;</a></td>
				<td><a href="#" class="item-selection" title="array('plugin'=>false, 'controller'=>'calendars', 'action'=>'show', '<?php echo $calendar['Calendar']['id']; ?>')"><?php echo $calendar['Calendar']['title'] ?>&nbsp;</a></td>
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