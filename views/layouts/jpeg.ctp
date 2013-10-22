<?php
	header("Content-type: image/jpeg") ;
	header("Content-Length: ".strlen($content_for_layout));
	echo $content_for_layout;
	die();
?>