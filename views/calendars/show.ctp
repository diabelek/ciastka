<div class="calendars view">
	<h2><?php echo $calendar['Calendar']['title'] ?></h2>

	<?php echo $this->Text->getShortText($calendar['Calendar']['description'], true, false); ?>
	
	<div class="write_in_link">
		<?php echo $this->Html->link('Zapisz się na szkolenie', array('controller' => 'calendars', 'action' => 'writein', $calendar['Calendar']['id'])); ?>
	</div>
</div>
