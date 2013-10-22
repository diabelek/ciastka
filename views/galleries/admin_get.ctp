<div class="galleries index" id="box">
	<h2><?php __('Select Gallery'); ?></h2>
	<table cellpadding="0" cellspacing="1">
		<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($galleries as $gallery):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr<?php echo $class; ?>>
				<td><a href="#" class="item-selection" title="array('plugin'=>false, 'controller'=>'photos', 'action'=>'show', '<?php echo $gallery['Gallery']['id']; ?>')"><?php echo $gallery['Gallery']['id'] ?>&nbsp;</a></td>
				<td><a href="#" class="item-selection" title="array('plugin'=>false, 'controller'=>'photos', 'action'=>'show', '<?php echo $gallery['Gallery']['id']; ?>')"><?php echo $gallery['Gallery']['name'] ?>&nbsp;</a></td>
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