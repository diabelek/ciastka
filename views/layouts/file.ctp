<?php
	header('Content-type: ' . $file['Storagefile']['type']);
	if(!isset($inpage)) 
		header('Content-Disposition: attachment; filename="'.$file['Storagefile']['name'].'"');
	echo $content_for_layout;
	die();
?>