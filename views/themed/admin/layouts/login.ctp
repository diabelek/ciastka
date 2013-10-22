<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php __('CactusCMS'); ?>
			<?php echo $title_for_layout; ?>
		</title>
		<?php
			echo $this->Html->meta('icon');

			echo $this->Html->css('login');
			echo $this->Html->css('cake-basic');

			echo $scripts_for_layout;
		?>
		</head>
		<body>
			<div id="logo">
			<?php
				echo $this->Html->link(
					$html->image(
							'login/logo_cs.gif',
							array(
								'alt' => 'Cactus Studio',
								'title' => 'Cactus Studio'
							)
					) . '<br />www.cactusstudio.pl',
					'http://www.cactusstudio.pl/',
					array('target' => '_blank', 'escape' => false));
			?>
			</div>
			<div id="content">
				<?php echo $content_for_layout; ?>
			<?php
				echo $this->Session->flash();
				echo $session->flash('auth');
			?>
			</div>
			<div id="footer">
				Copyright <?php echo $copyrights ?>
			</div>
		</div>
		<?php echo $this->element('sql_dump');  ?>
	</body>
</html>