<div class="articles index">
	<h2><?php __('Articles');?></h2>
<?php
	foreach ($articles as $article)
	{
?>
	<div class="article search">
		<h2><?php echo $this->Html ->link($article['Article']['title'], array('action' => 'show', $article['Article']['alias'])); ?></h2>
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