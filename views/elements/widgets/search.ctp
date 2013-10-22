<?php
	if(!isset($label))
		$label = __('search', true);
		
	if(!isset($phrase))
		$phrase = __('Write searching phrase...', true);
?>

<div id="search">
	<?php echo $form->create('Article', array('action' => 'search')); ?>
		<div id="search_wrapper">
			<?php
				echo $form->input('searchString', array('label' => '', 'default' => $phrase, 'class' => 'searchField empty'));
			?>
		</div>
	<?php 
		if (isset($icon)){
			echo $form->end($icon);
		}else{
			echo $form->end($label);
		}?>
	<script>
		$('input.searchField').focusin(function(){
			if ($('input.searchField').val() == '<?php echo $phrase; ?>'){
				$('input.searchField').val('');
				$('input.searchField').removeClass('empty');
			}
		});

		$('input.searchField').focusout(function() {
			if ($('input.searchField').val() == ''){
				$('input.searchField').val('<?php echo $phrase; ?>');
				$('input.searchField').addClass('empty');
			}
		});
	</script>
</div>