<div class="featured">
<?php foreach ($calendars as $calendar) : ?>
	<div class="event<?php if($calendar['Calendar']['highlight'] == true) echo " highlight"; ?>">
		<?php if ($calendar['Calendar']['title'] != null && $calendar['Calendar']['title'] != '') : ?>
		<h2><?php echo $this->Html->link($calendar['Calendar']['title'], array('action' => 'show', $calendar['Calendar']['id'])); ?></h2>
		<?php endif; ?>
		<div class="content">
		<?php 
			$show_more = false;
			$content = $this->Text->getShortText($calendar['Calendar']['description'], false, false, $show_more);
			echo $content;
			//if ($show_more == true)
			//{
			//	echo "<div class=\"more\">";
			//	echo $this->Html->link(__("more", true), array ("controller" => "calendars", "action" => "show", $calendar['Calendar']['id']));
			//	echo '</div>';
			//}
		?>
		</div>
	</div>
<?php endforeach; ?>
	<div style="clear: both"></div>
</div>