<?php 
	if (!isset($scroll_over))
		$scroll_over = false;
		
	if (!isset($scroll_on))
		$scroll_on = false;
?>

<?php $banners = $this->requestAction('banners/index'); ?>

<div id="slide_widget">
	<?php if (isset($title)): ?>
	<h2><?php echo $title; ?></h2>
	<?php endif; ?>
	<div id="thslide_banner" class="thslide">
		<div class="thslide_nav_previous">
			<a href="#"> </a>
		</div>
		<div class="thslide_list">
			<ul>
				<?php foreach ($banners as $banner) : ?>
					<li>
						<?php if ($banner['Banner']['link'] != ''): ?>
						<a href="<?php echo $banner['Banner']['link']; ?>" class="thwrapper">
						<?php endif; ?>
						<?php
						$hover = (isset($banner['Banner']['hoverFileName']) && $banner['Banner']['hoverFileName'] != '');
						if ($hover) 
							echo $html->image('banners/big/'.$banner['Banner']['fileName'], array('alt' => $banner['Banner']['name'], 'title' => $banner['Banner']['name'], 'class' => 'baseImage'));
						else
							echo $html->image('banners/big/'.$banner['Banner']['fileName'], array('alt' => $banner['Banner']['name'], 'title' => $banner['Banner']['name']));

						if ($hover)
							echo $html->image('banners/hover/big/'.$banner['Banner']['hoverFileName'], array('alt' => $banner['Banner']['name'], 'title' => $banner['Banner']['name'], 'class' => 'hoverImage')); 
						?>
						<?php if ($banner['Banner']['link'] != ''): ?>
						</a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="thslide_nav_next">
			<a href="#"> </a>
		</div>
	</div>

	<?php 
		if ($scroll_over == true) 
			$scroll_echo = '1';
		else 
			$scroll_echo = '0';
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#thslide_banner').thslide({
				itemOffset: 175,
				itemVisible: 1,
				infiniteScroll: 1,
				scrollOver: <?php echo $scroll_echo; ?>,
				slideSpeedSlow: 2000,
				slideSpeedFast: 200
			})
		});
	</script>
</div>