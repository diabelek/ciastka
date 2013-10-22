<?php 
	$address = 'articles/category/'.$alias;

	if (isset($limit)){
		$address .= '/limit:'.$limit;
	}

	$result = $this->requestAction($address);
	$path = $result['path'];
	$articles = $result['articles'];
	$category = $result['category'];
?>

<div class="article category">
	<h1><?php echo $this->Html->link($category[0]["Category"]["name"], array ("controller" => "articles", "action" => "category", $alias)); ?></h1>
	<?php $i = 0; ?>
	<?php foreach ($articles as $article): ?>
		<?php $mod = ($i++ % 3) + 1; ?>
		<div class="article box pos-<?php echo $mod; ?>">
			<?php echo $this->Html->image('articles/small/'.$article['Article']['custom_banner_file'], array('class' => 'custom_banner')); ?>
			<h2><?php echo $this->Html->link($article['Article']['title'], array ("controller" => "articles", "action" => "show", $article['Article']['alias'])); ?></h2>
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
</div>