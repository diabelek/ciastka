<?php $banners = $this->requestAction('banners/index'); ?>

	<div id="images">
		<?php foreach ($banners as $banner) : ?>
			<a href="<?php echo $banner['Banner']['link']; ?>" class="splitedimage">
				<?php echo $html->image('banners/big/'.$banner['Banner']['fileName'], array('alt' => $banner['Banner']['name'], 'title' => $banner['Banner']['name'])); ?>
			</a>
		<?php endforeach; ?>
	</div>
	
	<script>
		var curentImage = $('div#images a:first-child');
		var nextImage = null;

		$(document).ready(function() {
			$('div#images > a:not(:first-child)').hide();
		});

		$(document).everyTime(6000, function() {

			nextImage = $(curentImage).next();
			
			if ($(nextImage).length == 0)
				nextImage = $('div#images a:first-child');

			$(nextImage).addClass('nextimage');
			$(nextImage).show();
			$(curentImage).fadeOut('slow', function() {
				$(nextImage).removeClass('nextimage');
			});
			curentImage = nextImage;
		});
	</script>