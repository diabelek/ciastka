<?php echo $javascript->link('lightbox/prototype', null, array('inline' => false)); ?>
<?php echo $javascript->link('lightbox/scriptaculous.js?load=effects,builder', null, array('inline' => false)); ?>
<?php echo $javascript->link('lightbox/lightbox', null, array('inline' => false)); ?>

<?php echo $this->Html->css('lightbox/lightbox', null, array('inline' => false)); ?>

<div class="photos index view">
	<h2><?php echo $gallery_name; ?></h2>
	<div class="content">
		<div class="grid">
		<?php
			foreach ($photos as $photo) : ?>
				<a href="<?php echo $this->webroot; ?>img/photos/<?php echo $gallery_id; ?>/big/<?php echo $photo['Photo']['fileName'] ?>" rel="lightbox[gallery]" title="<?php echo $photo['Photo']['name'] ?>">
					<?php echo $html->image('photos/'.$gallery_id.'/small/'.$photo['Photo']['fileName'], array('alt' => $photo['Photo']['name'], 'title' => $photo['Photo']['name'])); ?>
				</a>
			<?php endforeach; ?>
			<div style="clear: both"></div>
		</div>
		<?php $hasPages = ($this->params['paging']['Photo']['pageCount'] > 1); ?>
		<?php if ($hasPages): ?>
		<div class="paging">
			<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled')); ?> | 
			<?php echo $this->Paginator->numbers(); ?> | 
			<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
		</div>
		<?php endif; ?>
	</div>
</div>