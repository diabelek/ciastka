<?php 
	if (!isset($link))
		$link = "http://www.facebook.com/platform";

	if (!isset($height))
		$height = 258;
		
	if (!isset($width))
		$width = 300;

	if (!isset($show_faces) || $show_faces == true)
		$show_faces = "true";
	else
		$show_faces = "false";
		
	if (!isset($show_stream) || $show_stream == true)
		$show_stream = "true";
	else
		$show_stream = "false";

	if (!isset($show_header) || $show_header == true)
		$show_header = "true";
	else
		$show_header = "false";
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/pl_PL/all.js#xfbml=1";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-href="<?php echo $link; ?>" data-width="<?php echo $width; ?>" data-height="<?php echo $height; ?>" data-show-faces="<?php echo $show_faces; ?>" data-stream="<?php echo $show_stream; ?>" data-header="<?php echo $show_header; ?>"></div>