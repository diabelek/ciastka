<?php
	$articleAddress = 'articles/show/'.$alias;
	$article = $this->requestAction($articleAddress);
?>

<div id="article-link-<?php echo $alias; ?>">
	<?php echo $this->Html->link($article['Article']['title'], array('controller' => 'articles', 'action' => 'show', $article['Article']['alias'])); ?>
</div>