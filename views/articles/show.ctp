<div class="articles view">
	<h2><?php echo $article['Article']['title'] ?></h2>
	<div class="content">
		<?php echo $this->Text->getShortText($article['Article']['content'], true, $article['Article']['cutShortText']); ?>
	</div>
	<div class="clear"></div>
</div>
