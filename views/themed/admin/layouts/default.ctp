<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $title_for_layout; ?>
		</title>
		<?php echo $this->Html->meta('icon'); ?>

		<?php echo $javascript->link('jquery/jquery-1.6.1.min'); ?>
		<?php echo $javascript->link('jquery/jquery-ui-1.8.14.custom.min'); ?>
		<?php echo $javascript->link('superfish/js/superfish'); ?>
		<?php echo $javascript->link('superfish/js/supersubs'); ?>
		<?php echo $javascript->link('../scripts/js/config'); ?>
		<?php echo $javascript->link('ckeditor/ckeditor'); ?>
		<?php //js locale ?>
		<?php echo $javascript->link('locale/manager'); ?>
		<?php $lang = $this->Session->read('Config.language'); ?>
		<?php echo $javascript->link("locale/$lang/resources"); ?>

		<?php echo $this->Html->css('jquery/jquery-ui-1.8.14.custom'); ?>
		<?php echo $this->Html->css('/js/superfish/css/superfish'); ?>
		<?php echo $this->Html->css('style'); ?>
		<?php echo $this->Html->css('superfish'); ?>

		<?php echo $scripts_for_layout; ?>
	</head>
	<body>
		<div id="container">
			<div id="menu">
				<?php echo $this->element('userinfo'); ?>
				<div style="clear: both"></div>
			</div>
			<div id="header">
				<div id="clientlogo">
					<?php
						echo $html->image('logo.png',
								array(
									'alt' => $title_for_layout,
									'title' => $title_for_layout
								)
						);
					?>
				</div>
				<div id="logo">
					<?php
						echo $this->Html->link(
								$html->image(
										'logo_cs.gif',
										array(
											'alt' => 'Cactus Studio',
											'title' => 'Cactus Studio'
										)
								) . '<br />www.cactusstudio.pl',
								'http://www.cactusstudio.pl/',
								array('target' => '_blank', 'escape' => false));
					?>
				</div>
				<div style="clear: both"></div>
			</div>
			<div id="menubar">
				<div id="menu">
					<?php echo $this->element('sfmenu'); ?>
					<div style="clear: both"></div>
				</div>
			</div>
			<?php if ($this->params['controller'] != 'pages') : ?>
			<?php echo $this->element('moduleheader'); ?>
			<div id="menubar">
				<div id="menu">
					<?php echo $this->element('modulemenu'); ?>
					<div style="clear: both"></div>
				</div>
			</div>
			<?php endif; ?>
			<div id="content">
				<?php
					echo $this->Session->flash();
					echo $session->flash('auth');
					echo $content_for_layout;
				?>
			</div>
			<div id="footer">
				<?php echo $this->element('version'); ?>
			</div>
		</div>
		<?php echo $this->element('sql_dump'); ?>
	</body>
</html>