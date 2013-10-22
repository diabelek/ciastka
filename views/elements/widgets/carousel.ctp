<?php $banners = $this->requestAction('banners/index'); ?>

<div id="carousel_widget">
	<?php if (isset($title)): ?>
	<h2><?php echo $title; ?></h2>
	<?php endif; ?>
	<ul class="carousel">
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

	<script type="text/javascript">
		$(document).ready(function(){
			// Using custom configuration
			var elem = $("ul.carousel");
			
			elem.carouFredSel({
				align: false,
				items: {
					visible: 5,
					minimum: 5,
					width: 178,
					height: 75
				},
				scroll: {
					items: 1,
					duration: 1500,
					timeoutDuration: 0,
					play: true,
					easing: 'linear',
					pauseOnHover: 'immediate'
				}
			});
		});
	</script>
</div>