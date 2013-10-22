<div class="category index">
	<h2><?php echo $category[0]['Category']['name']; ?></h2>

	<?php echo $this->Menu->generateCategory($category[0]['children'], array('alias' => 'Category', 'controller' => 'articles')); ?>
</div>