<?php
	$isMain = false;
	$params = $this->params;
	if ($this->params['controller'] == "pages" &&
		$this->params['action'] == "start"){
		$isMain = true;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title><?php echo $title_for_layout; ?></title>
		
		<!-- META -->
		<?php echo $this->Html->meta('icon'); ?>
		<?php echo $this->Html->meta('keywords', $meta_for_layout['keywords']); ?>
		<?php echo $this->Html->meta('description', $meta_for_layout['description']); ?>

		<?php echo $javascript->link('jquery/jquery-1.8.3.min'); ?>
		<?php echo $javascript->link('jquery/jquery.cycle.all'); ?>
		<?php echo $javascript->link('jquery/carousel/jquery.carousel.min'); ?>

		<?php echo $this->Html->css('style'); ?>
		<?php echo $this->Html->css('cycle'); ?>
		<?php echo $this->Html->css('tables'); ?>
		<?php echo $this->Html->css('carousel'); ?>

		<?php echo $scripts_for_layout; ?>

		<?php echo $this->Menu->libs(); ?>
	</head>
	<body>
		<div id="white">
			<div id="header" class="wrapper">
				<a href="<?php echo $this->webroot; ?>" title="Air Fair - Bydgoszcz" id="home">
					<?php echo $html->image('logo.png', 
						array('alt' => 'Air Fair - Bydgoszcz', 
							'title' => 'Air Fair - Bydgoszcz')); 
					?>
				</a>
				<?php echo $this->widget('search', array('icon' => 'lupka.png')); ?>
				<?php echo $this->widget('languages', array('image' => true, 'filetype' => 'png')); ?>
				<div id="banner">
					<?php echo $this->widget('cycle',
							array("id" => "cycle",
								"categoryalias" => "start",
								"showtitle" => true,
								"prev" => false,
								"next" => false,
								"pager" => true,
								"delay" => 0,
								"timeout" => 8000
							)
						); ?>
				</div>
				<div id="menu_out" class="wrapper">
					<div id="menu_in">
						<?php echo $this->Menu->generate($appmenu[0]); ?>
					</div>
				</div>
			</div>
			<div id="content" class="wrapper">
				<?php if ($isMain == true) : ?>
				<div id="links">
					<?php echo $this->Menu->generate($appmenu[1]); ?>
				</div>
				<div id="main">
					<?php echo $this->widget('category',
							array("alias" => "aktualnosci",
								'limit' => 3
							)
						); ?>
				</div>
				<?php else: ?>
				<div id="sub">
					<?php echo $content_for_layout; ?>
					<div class="clear"></div>
				</div>
				<?php endif; ?>
			</div>
			<?php if ($isMain == true) : ?>
			<div id="boxes" class="wrapper clear">
				<?php echo $this->widget('article',
						array("alias" => "connect",
							'more_link' => false,
							'title_link' => false
						)
					); ?>
				<?php echo $this->widget('article',
						array("alias" => "kontakt",
							'more_link' => false,
							'title_link' => false
						)
					); ?>
				<?php echo $this->widget('article',
						array("alias" => "patrons",
							'more_link' => false,
							'title_link' => false
						)
					); ?>
			</div>
			<div id="slider" class="clear wrapper">
				<h1><?php __('Partners'); ?></h1>
				<?php echo $this->widget('carousel'); ?>
			</div>
			<?php endif; ?>
		</div>
		<div id="footer" class="wrapper">
			<?php echo $this->widget('article',
						array("alias" => "stopka",
							'more_link' => false
						)
					); ?>
		</div>
		<script type="text/javascript">
		
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-39905109-1']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();

		</script>
		<script type="text/javascript" src="cookies.js"></script>
	<div id="cookieOpacity" style="display: none; background-color: black; opacity: 0.8; position: fixed; bottom: 0; width: 100%; height: 40px; z-index:1000"></div>
	<div id="cookieHolder" style="display: none; position: fixed; bottom: 0; width: 100%; height: 30px; color: #B7B7B7; font-size: 9pt; font-family: tahoma; padding: 5px 0; z-index:1000">
		<div style="width: 980px; margin: 0 auto; line-height: 1.3">
			<div style="border-right: 1px solid #B7B7B7; float: left; padding: 0 5px;">
				<a href="http://airfair.pl/cookies.pdf" target="_blank" style="color: #B7B7B7; font-size: 18pt; text-decoration: none;" rel="nofollow">Pliki Cookies (?)</a>
			</div>
			<div style="float: left; padding: 0 5px;">
				Używamy plików cookies, by ułatwić korzystanie z serwisu.<br/>Jeśli nie chcesz, by pliki cookies były zapisywane na Twoim dysku zmień ustawienia swojej przeglądarki.
			</div>
			<div style="float: right; padding: 0 5px;">
				<a href="#"  onClick="zamknij()" style="color: #B7B7B7; font-size: 18pt; text-decoration: none; border: 1px solid #B7B7B7; padding: 1px 5px;">OK</a>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function zamknij() {
			document.getElementById('cookieOpacity').style.display = 'none';
			document.getElementById('cookieHolder').style.display = 'none';
			
			setCookie('cookiesAccepted', true, 360);
			return false;
		}
		
		widzial = getCookie('cookiesAccepted');
		if (widzial == null || widzial == '') {
			document.getElementById('cookieOpacity').style.display = 'block';
			document.getElementById('cookieHolder').style.display = 'block';
		}
	</script>
		<?php echo $this->element('sql_dump'); ?>
	</body>
</html>