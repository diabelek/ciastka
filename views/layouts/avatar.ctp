<?php
	header('Content-type: ' . $file['Profile']['avatarType']);
	if(!isset($inpage)) 
		header('Content-Disposition: attachment; filename="'.$file['Profile']['avatarName'].'"');
	echo $content_for_layout;
	die();
?>