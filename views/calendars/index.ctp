<div class="calendarWrapper">
	<div class="calendarHeader">
		<?php 
			if ($month == 1)
				echo $this->Html->link("<", array('action' => 'index', $year-1, 12), array('class' => 'calNav'));
			else
				echo $this->Html->link("<", array('action' => 'index', $year, $month-1), array('class' => 'calNav'));
		?>
		<h3><?php echo $this->Month->getMonthName($month).' '.$year; ?></h3>
		<?php
			if ($month == 12)
				echo $this->Html->link(">", array('action' => 'index', $year+1, 1), array('class' => 'calNav'));
			else
				echo $this->Html->link(">", array('action' => 'index', $year, $month+1), array('class' => 'calNav'));
		?>
	</div>
<?php
	$calendarDates = array();
	foreach ($calendars as $calendar)
	{
		$eventDate = $calendar['Term']['eventdate'];
		if (array_key_exists($eventDate, $calendarDates) == true) {
			$calendarDates[$eventDate] = $calendarDates[$eventDate] + 1;
		} else {
			$calendarDates[$eventDate] = 1;
		}
	}

	$firstDay = mktime(0,0,0,$month,1,$year);
	list($y,$m,$t) = split('-',date('Y-m-t',$firstDay));
	$lastDay = mktime(0,0,0,$m,$t,$y);

	$currentDay = $firstDay;
	
	?>
	<table class="calendar">
		<tr>
			<th>Pn</th><th>Wt</th><th>Śr</th><th>Czw</th><th>Pt</th><th>Sb</th><th>Nd</th>
		</tr>
		<tr>
			<?php
		$weekOfDay = date("N", $firstDay);
		$i = 1;
		for ($i = 1; $i < $weekOfDay; $i++)
			echo "<td>&nbsp;</td>";

		while ($currentDay <= $lastDay || date("N", $currentDay) != 7) {
			$currentDate = date("Y-m-d", $currentDay);
			$test = array_key_exists($currentDate, $calendarDates);
			if ($test == true) {
				$tdClass = ' class="active"';
				$cellText = $this->Html->link(intval(date("d", $currentDay)), array('action' => 'day', $year, $month, intval(date("d", $currentDay))));
			} else {
				$tdClass = '';
				$cellText = intval(date("d", $currentDay));
			}

			if ($currentDay <= $lastDay) {
				echo "<td".$tdClass.">".$cellText."</td>";
			} else {
				echo "<td>&nbsp;</td>";
			}
			
			if ($i % 7 == 0)
			{
				if ($currentDay >= $lastDay) {
					break;
				} else {
					echo "\n\t\t</tr>\n\t\t<tr>\n\t\t\t";
				}
			}
			
			$i++;
			$currentDay = strtotime(date("Y-m-d", $currentDay) . " +1 day");
		}
		
		if (date("N", $lastDay) != 7) {
			echo "<td>&nbsp;</td>";
		}
	?>
		</tr>
	</table>
</div>