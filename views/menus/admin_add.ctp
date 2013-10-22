<script>
	var dialog = $('<div class ="loading" style="display:none" title="Wybierz cel menu"></div>');
	$("a.display-in-box").live("click", function() {
		var url = this.href;
		dialog.appendTo('body');

		dialog.dialog({
			// add a close listener to prevent adding multiple divs to the document
			close: function(event, ui) {
				dialog.html('');
				dialog.addClass('loading');
				dialog.remove();
			},
			height: 600,
			width: 650,
			modal: true
		});
		// load remote content
		dialog.load(
			url, 
			{},
			function (responseText, textStatus, XMLHttpRequest) {
				dialog.removeClass('loading');
			}
		);

		return false;
	});
	
	$("a.allow-edit").live("click", function() {	
		$('#MenuLink').attr("readonly", false);
		$('#MenuLink').val("");
		$('#MenuLink').removeClass("readonly");
		return false;
	});

	$(".item-selection").live("click", function() {
		$('#MenuLink').attr("readonly", true);
		$('#MenuLink').val(this.title);
		$('#MenuLink').addClass("readonly");
		dialog.dialog("close");
		return false;
	});

	$('.ui-dialog-content .paging a').live('click', function() { 
		dialog.html('');
		dialog.addClass('loading');
		var url = $(this).attr('href');
		dialog.load(
			url, 
			{},
			function (responseText, textStatus, XMLHttpRequest) {
				dialog.removeClass('loading');
			}
		);
		return false;  
	});

	$('.ui-dialog-content th a').live('click', function() {
		dialog.html('');
		dialog.addClass('loading');
		var url = $(this).attr('href');
		dialog.load(
			url, 
			{},
			function (responseText, textStatus, XMLHttpRequest) {
				dialog.removeClass('loading');
			}
		);
		return false;  
	});
</script>
<div class="menus form">
	<?php echo $this->Form->create('Menu', array('type' => 'file', 'url' => array('controller' => 'menus', 'action' => 'add'))); ?>
	<fieldset>
		<legend><?php __('Add Menu'); ?></legend>
		<?php
			$this->Language->createLangTabs(
				array(
					'name' => array('label' => __('name', true)),
					'description' => array('type' => 'textarea', 'class' => 'ckeditor', 'label' => __('Content', true))
				)
			);
			echo $form->input('Image.fileName', array('type' => 'file', 'label' => __("Icon", true)));
			echo $this->Form->input('link', array('readonly' => 'readonly'));

			echo $this->element('menu_types');
			echo $this->Form->input('published');
			echo $this->Form->input('parent_id', array('empty' => true));
			echo $this->Form->input('area_id');
			echo $this->Form->input('group_id');

			echo $this->element('meta');
		?>
	</fieldset>
	<div class="submit_cancel">
		<?php echo $this->Html->link(__("Cancel", true), array('action' => 'cancel')); ?>
	</div>
	<?php echo $this->Form->end(__('Submit', true)); ?>
</div>