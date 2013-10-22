<?php 
if (!isset($more_link))
	$more_link = true;

if (!isset($title_link))
	$title_link = true;

?>

<?php if (!isset($alias)): ?>
	<strong>Error:</strong> Brak artyku³u!
<?php else: ?>

<?php 
	$article = $this->requestAction('articles/show/'.$alias);

	if ($title_link == true){
		if (!isset($link))
			$link = array('controller' => 'articles', 'action' => 'show', $article['Article']['alias']);
			
		$h2 = $this->Html->link($article['Article']['title'], $link);
	}else{
		$h2 = $article['Article']['title'];
	}
?>

<div class="article show widget">
	<?php if ($article['Article']['title'] != null && $article['Article']['title'] != '') : ?>
	<h2><?php echo $h2; ?></h2>
	<?php endif; ?>

	<div class="content">
		<?php 
			$show_more = false;
			$content = $this->Text->getShortText($article['Article']['content'], false, false, $show_more);
			echo $content;
			if ($show_more == true && $more_link == true)
			{
				echo "<div class=\"more\">";
				echo $this->Html->link(__("more", true), array ("controller" => "articles", "action" => "show", $article['Article']['alias']));
				echo '</div>';
			}
		?>
	</div>
	<div style="clear: both"></div>
</div>
<?php endif; ?>