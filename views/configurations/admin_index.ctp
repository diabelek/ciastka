<div class="configurations form">
<?php echo $this->Form->create('Configuration');?>
	<fieldset>
		<legend><?php __('Edit Configuration'); ?></legend>
		<script>
			$(function() {
				$( "#tabs" ).tabs();
			});
		</script>

	<?php
		echo $this->Form->input('id');
	?>
		
		<div id="tabs">
			<ul>
				<li><a href="#tabs-page"><?php __('Page') ?></a></li>
				<li><a href="#tabs-themes"><?php __('Themes') ?></a></li>
				<li><a href="#tabs-menus"><?php __('Menus') ?></a></li>
				<li><a href="#tabs-articles"><?php __('Articles') ?></a></li>
				<li><a href="#tabs-newsletter"><?php __('Newsletter') ?></a></li>
				<li><a href="#tabs-calendar"><?php __('Contact e-mails') ?></a></li>
				<li><a href="#tabs-banners"><?php __('Banners') ?></a></li>
				<li><a href="#tabs-gallery"><?php __('Gallery') ?></a></li>
				<li><a href="#tabs-system"><?php __('System') ?></a></li>
			</ul>
			<div id="tabs-page">
			<?php
				echo $this->Form->input('page_title');
				echo $this->Form->input('meta_keywords');
				echo $this->Form->input('meta_description');
				echo $this->Form->input('banner', array('type' => 'select'), array('options' => $banners));

				echo $this->Form->input('copyright');
			?>
			</div>
			<div id="tabs-themes">
			<?php
				echo $this->Form->input('admin_theme');
				echo $this->Form->input('theme');
			?>
			</div>
			<div id="tabs-menus">
				<fieldset>
					<legend><?php __('Menus'); ?></legend>
					<div class="inline">
						<?php
						echo $this->Form->input('menu_icon_size_x', array('label' => __("Size:", true)));
						echo $this->Form->input('menu_icon_size_y', array('label' => __("x", true)));
						?>
					</div>
				</fieldset>
			</div>
			<div id="tabs-articles">
				<fieldset>
					<legend><?php __('Articles'); ?></legend>
					<div class="inline">
						<?php
						echo $this->Form->input('custom_banner_size_x', array('label' => __("Size:", true)));
						echo $this->Form->input('custom_banner_size_y', array('label' => __("x", true)));
						?>
					</div>
					<div class="inline">
						<?php
						echo $this->Form->input('custom_banner_thumb_size_x', array('label' => __("Thumbnail size:", true)));
						echo $this->Form->input('custom_banner_thumb_size_y', array('label' => __("x", true)));
						?>
					</div>
				</fieldset>
			</div>
			<div id="tabs-newsletter">
			<?php
				echo $this->Form->input('newsletter_reply');
				echo $this->Form->input('newsletter_from');
			?>
			</div>
			<div id="tabs-calendar">
			<?php
				echo $this->Form->input('calendar_mail');
			?>
			</div>
			<div id="tabs-banners">
				<fieldset>
					<legend><?php __('Image'); ?></legend>
					<div class="inline">
						<?php
						echo $this->Form->input('banner_big_size_x', array('label' => __("Size:", true)));
						echo $this->Form->input('banner_big_size_y', array('label' => __("x", true)));
						?>
					</div>
					<div class="inline">
						<?php
						echo $this->Form->input('banner_small_size_x', array('label' => __("Thumbnail size:", true)));
						echo $this->Form->input('banner_small_size_y', array('label' => __("x", true)));
						?>
					</div>
				</fieldset>
				<fieldset>
					<legend><?php __('Hover image'); ?></legend>
					<div class="inline">
						<?php
						echo $this->Form->input('banner_hover_big_size_x', array('label' => __("Size:", true)));
						echo $this->Form->input('banner_hover_big_size_y', array('label' => __("x", true)));
						?>
					</div>
					<div class="inline">
						<?php
						echo $this->Form->input('banner_hover_small_size_x', array('label' => __("Thumbnail size:", true)));
						echo $this->Form->input('banner_hover_small_size_y', array('label' => __("x", true)));
						?>
					</div>
				</fieldset>
			</div>
			<div id="tabs-gallery">
				<fieldset>
					<legend><?php __('Gallery'); ?></legend>
					<div class="inline">
						<?php
						echo $this->Form->input('photo_big_size_x', array('label' => __("Size:", true)));
						echo $this->Form->input('photo_big_size_y', array('label' => __("x", true)));
						?>
					</div>
					<div class="inline">
						<?php
						echo $this->Form->input('photo_small_size_x', array('label' => __("Thumbnail size:", true)));
						echo $this->Form->input('photo_small_size_y', array('label' => __("x", true)));
						?>
					</div>
				</fieldset>
			</div>
			<div id="tabs-system">
			<?php
				echo $this->Form->input('guest_id');
				echo $this->Form->input('default_language', array('type' => 'select', 'options' => $languages));
				echo $this->Form->input('area_id');
				//echo $this->Form->input('default_language');
			?>
			</div>
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>