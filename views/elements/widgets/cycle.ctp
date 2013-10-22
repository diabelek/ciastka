<?php 
	if (!isset($delay))
		$delay = 2000;
		
	if (!isset($timeout))
		$timeout = 2000;

	$result = $this->requestAction('articles/category/'.$categoryalias); 
	$articles = $result['articles'];
?>

<div id="<?php echo $id ?>" class="cycle">
	<ul id="<?php echo $id ?>-holder" class="cycle-holder">
		<?php foreach ($articles as $article): ?>
			<li class="article category">
				<?php if (strlen($article['Article']['title']) > 0 && isset($showtitle) && $showtitle == true) : ?>
				<h2><?php echo $article['Article']['title']; ?></h2>
				<?php endif; ?>
				<div>
					<?php echo $this->Text->getShortText($article['Article']['content']); ?>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php if(isset($prev) && $prev == true): ?><div class="swPrev" id="<?php echo $id ?>-prev"></div><?php endif; ?>
	<?php if(isset($pager) && $pager == true): ?><div class="swControls" id="<?php echo $id ?>-nav"></div><?php endif; ?>
	<?php if(isset($next) && $next == true): ?><div class="swNext" id="<?php echo $id ?>-next"></div><?php endif; ?>
</div>

<?php 
	if(!isset($effect))
		$effect = 'scrollLeft';
?>

<script type="text/javascript">
	$('#<?php echo $id ?>-holder').cycle({ 
		fx: '<?php echo $effect; ?>', 
		delay: <?php echo $delay ?>,
		timeout: <?php echo $timeout ?>,
		<?php if(isset($pager) && $pager == true) echo "pager:  '#".$id."-nav',"; ?>
		<?php if(isset($prev) && $prev == true) echo "prev:  '#".$id."-prev',"; ?>
		<?php if(isset($next) && $next == true) echo "next:  '#".$id."-next',"; else echo "next: null"; ?>
	});
</script>