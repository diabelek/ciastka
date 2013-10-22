<div class="articles archive">
	<h2><?php __('Archive'); ?></h2>
	<?php
		echo $this->Form->create('Article');
		echo $this->Form->input('keywords');
		echo $this->Form->input('datefrom', array('class' => 'datepicker'));
		echo $this->Form->input('dateto', array('class' => 'datepicker'));
		
		echo $this->Form->input('Category');
		echo $this->Form->input('username');
		echo $this->Form->end(__('Show', true));
	?>
	<script>
		$(document).ready(function() {			
			$( ".datepicker" ).datepicker({
				buttonImage: '/img/calendar.png',
				dateFormat: 'yy-mm-dd'
			});
		});
	</script>
		<hr />
	<?php
		if (count($years) > 0) {
			echo '<table>';

			foreach ($years as $year => $months) {
				echo '<tr>';
				echo "<th><a herf='#' class='formSubmit' name='".$year."'>".$year."</a></th>";

				for ($i = 1; $i <= 12; $i++) {
					switch ($i) {
						case 1: $monthLabel = __('January', true);
							break;
						case 2: $monthLabel = __('February', true);
							break;
						case 3: $monthLabel = __('March', true);
							break;
						case 4: $monthLabel = __('April', true);
							break;
						case 5: $monthLabel = __('May', true);
							break;
						case 6: $monthLabel = __('June', true);
							break;
						case 7: $monthLabel = __('July', true);
							break;
						case 8: $monthLabel = __('August', true);
							break;
						case 9: $monthLabel = __('September', true);
							break;
						case 10: $monthLabel = __('October', true);
							break;
						case 11: $monthLabel = __('November', true);
							break;
						case 12: $monthLabel = __('December', true);
							break;
					}

					echo '<td>';
					if (isset($months[$i])) {
						echo "<a herf='#' class='formSubmit' name='".$year."/".$i."' title = '".$months[$i]."'>".$monthLabel."</a>";
					} else {
						echo $monthLabel;
					}
					echo '</td>';
				}
				echo '</tr>';
			}
			echo '</table>';
		}
	?>
		<script>
			$('.formSubmit').click(function() {
				var dateparts = this.name.split("/");
				var year = new Number(dateparts[0]);
				if (dateparts.length > 1)
				{
					var month = new Number(dateparts[1]);

					var d = new Date();
					d.setFullYear(year, month, 0);

					month = d.getMonth() + 1;
					if (month < 10) {
						month = '0' + month;
					}

					$( "#ArticleDatefrom" ).val(year + '-' + month + '-01');
					$( "#ArticleDateto" ).val(year + '-' + month + '-' + d.getDate());
				} else {
					$( "#ArticleDatefrom" ).val(year + '-01-01');
					$( "#ArticleDateto" ).val(year + '-12-31');
				}
				document.getElementById("ArticleArchiveForm").submit();
		});
		</script>
		<h3><?php __('Results'); ?></h3>
<?php
		foreach ($articles as $article) {
?>
	<div class="article index">
		<h2><?php echo $this->Html->link($article['Article']['title'], array('action' => 'show', $article['Article']['alias'])); ?></h2>
		<?php 
			$show_more = false;
			$content = $this->Text->getShortText($article['Article']['content'], false, false, $show_more);
			echo $content;
			if ($show_more == true)
			{
				echo "<div class=\"more\">";
				echo $this->Html->link(__("read more...", true), array ("controller" => "articles", "action" => "show", $article['Article']['alias']));
				echo '</div>';
			}
		?>
			</div>
<?php } ?>
</div>