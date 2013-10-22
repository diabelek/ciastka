<div class="galleries index view">
	<h2><?php __('Galleries'); ?></h2>
	<div class="content">
		<?php foreach ($galleries as $gallery) : ?>
			<?php echo $this->Html->link(
				$html->image(
					'photos/'.$gallery['Gallery']['id'].'/small/'.$gallery['Photo'][0]['fileName'], 
					array('alt' => $gallery['Photo'][0]['name'], 'title' => $gallery['Photo'][0]['name'])
				) . '<h3>' . $gallery['Gallery']['name'] . '</h3>', 
				array('controller' => 'photos', 'action' => 'show', $gallery['Gallery']['id']),
				array('escape' => false)); 
			?>
		<?php endforeach; ?>
		<div style="clear: both"></div>
	</div>
</div>