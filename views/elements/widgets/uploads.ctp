<?php
	$uploadsAddress = 'uploads/index/'.base64_encode($path);
	if (isset($limit))
		$uploadsAddress .= "/limit:" . $limit;

	$uploads = $this->requestAction($uploadsAddress);
?>

<ul id="uploads-<?php echo $path; ?>">
	<?php foreach ($uploads as $upload): ?>
	<li class="upload">
		<h2><?php echo $this->Html->link($upload['Upload']['title'], array('controller' => 'uploads', 'action' => 'view', $upload['Upload']['id'])); ?></h2>
	</li>
	<?php endforeach; ?>
</ul>