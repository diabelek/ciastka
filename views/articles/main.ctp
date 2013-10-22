<div class="articles main">
<?php
	$i = 1;
	foreach ($articles as $article)
	{
		if ($i++ % 2 == 0)
			echo '<div class="article main right">';
		else
			echo '<div class="article main">';
		
		echo "<h2>".$article['Article']['title']."</h2>";
		
		$show_more = false;
		$content = $this->Text->getShortText($article['Article']['content'], false, false, $show_more);
		echo $content;
		if ($show_more == true)
		{
			echo "<div class=\"more\">";
			echo $this->Html->link(__("read more...", true), array ("controller" => "articles", "action" => "show", $article['Article']['alias']));
			echo '</div>';
		}
		echo '</div>';
	}
?>
	<div style="clear: both;"></div>
</div>