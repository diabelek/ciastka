<?php if (isset($link)) : ?>

<?php echo $javascript->link('flowplayer/flowplayer-3.2.6.min') . "\n\n\t\t"; ?>

<a 
	href="<?php echo $link; ?>" 
	style="display:block;width:425px;height:300px;" 
	id="player">
</a>

<script language="JavaScript">
	flowplayer("player", 
		"<?php echo $this->webroot; ?>js/flowplayer/flowplayer-3.2.7.swf",
		{
			clip : {
				baseUrl: '<?php echo $this->webroot; ?>'
			}
		}
	);
</script>

<?php endif; ?>