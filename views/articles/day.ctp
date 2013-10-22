<div class="calendars day">
	<h1>Szkolenia zaplanowane na <?php echo $day; ?></h1>
	<?php $lastDay = '' ?>
	<?php foreach ($calendars as $calendar): ?>
		<div class="inner">
			<h3>
				<?php echo $this->Html->link($calendar['Calendar']['title'], array('action' => 'show', $calendar['Calendar']['id'])); ?>
			</h3>
			<div class="content">
				<?php 
					$show_more = false;
					$content = $this->Text->getShortText($calendar['Calendar']['description'], false, false, $show_more);
					echo $content;
					if ($show_more == true)
					{
						echo "<div class=\"more\">";
						echo $this->Html->link(__("more", true), array ("controller" => "calendars", "action" => "show", $calendar['Calendar']['id']));
						echo '</div>';
					}
				?>

				<div class="write_in_link">
					<?php echo $this->Html->link("Zapisz siê na szkolenie", array('controller' => 'calendars', 'action' => 'writein', $calendar['Calendar']['id'])); ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
	
	<?php foreach($calendars as $calendar): ?>
	<div class="inner">
		
	<?php endforeach; ?>

	<?php endif; ?>
</div>