<div class="calendar category">
	<h1><?php echo $category[0]['CalendarCategory']['name']; ?></h1>
	
	<?php if (isset($category[0]['children']) && count($category[0]['children']) > 0) : ?>
	
	<?php foreach($category[0]['children'] as $child): ?>
	<div class="inner">
		<h3>
			<?php echo $this->Html->link($child['CalendarCategory']['name'], array('controller' => 'calendars', 'action' => 'category', $child['CalendarCategory']['alias'])); ?>
		</h3>
		<div class="content">
			<?php echo $child['CalendarCategory']['desc']; ?>
			
			<?php if (isset($child['children']) && count($child['children']) > 0) : ?>
			<div class="toggle_link_show"><a href="#">Zobacz listę szkoleń <?php echo $child['CalendarCategory']['name']; ?></a></div>
			<div style="display: none">
				<?php echo $this->Menu->generateCategory($child['children'], array('alias' => 'CalendarCategory', 'controller' => 'calendars')) ?>
				<div class="toggle_link_hide"><a href="#">zwiń</a></div>
			</div>
			<?php endif; ?>

		</div>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
	
	<script>
		$('.toggle_link_show a').click(function() {
			$(this).parent().slideUp('slow');
			$(this).parent().next().slideDown('slow');
			return false;
		});
		
		$('.toggle_link_hide a').click(function() {
			$(this).parent().parent().prev().slideDown('slow');
			$(this).parent().parent().slideUp('slow');
			return false;
		});
	</script>
	
	<?php if (isset($calendars) && count($calendars) > 0) : ?>

	<?php foreach($calendars as $calendar): ?>
	<div class="inner">
		<h3>
			<?php echo $this->Html->link($calendar['Calendar']['title'], array('controller' => 'calendars', 'action' => 'show', $calendar['Calendar']['id'])); ?>
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
				<?php echo $this->Html->link("Zapisz się na szkolenie", array('controller' => 'calendars', 'action' => 'writein', $calendar['Calendar']['id'])); ?>
			</div>
		</div>
	</div>
	<?php endforeach; ?>

	<?php endif; ?>
</div>