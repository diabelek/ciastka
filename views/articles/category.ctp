<div class="article category">
	<h1><?php echo $category[0]["Category"]["name"]; ?></h1>
	<?php foreach ($articles as $article): ?>
		<div class="article box">
			<h2><?php echo $this->Html->link($article['Article']['title'], array('action' => 'show', $article['Article']['alias'])); ?></h2>
			<div class="article content">
			<?php 
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
		</div>
	<?php endforeach; ?>
	<div class="paging">
		<?php echo $this->Paginator->numbers(array('separator' => " ")); ?>
	</div>
</div>
