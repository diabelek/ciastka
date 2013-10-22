<?php $this->Html->script('swfupload/swfupload', $inline=false); ?>
<?php $this->Html->script('handlers', $inline=false); ?>
<?php $this->Html->script('jquery/jquery.jeditable.min', $inline=false); ?>
<?php $this->Html->script('jsmaster/json2', $inline=false); ?>
<?php $this->Html->css('thumbnails', null, array('inline' => false)); ?>
<?php $this->Html->css('../js/swfupload/css/progress', null, array('inline' => false)); ?>

<script type="text/javascript">
		var swfu;
		window.onload = function () {
			swfu = new SWFUpload({
				// Backend Settings
				upload_url: "<?php echo $this->webroot; ?>js/swfupload/php/upload.php",
				//upload_url: "<?php echo $this->Html->url(array('action' => 'upload')) ?>",
				post_params: {"PHPSESSID": "<?php echo session_id(); ?>"},

				// File Upload Settings
				file_size_limit : "2 MB",	// 2MB
				file_types : "*.jpg",
				file_types_description : "JPG Images",
				file_upload_limit : "0",

				// Event Handler Settings - these functions as defined in Handlers.js
				//  The handlers are not part of SWFUpload but are part of my website and control how
				//  my website reacts to the SWFUpload events.
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,

				// Button Settings
				//button_image_url : "images/SmallSpyGlassWithTransperancy_17x18.png",
				button_placeholder_id : "spanButtonPlaceholder",
				button_width: 95,
				button_height: 19,
				button_text : '<span class="t">'+__('SelectImages')+'</span>',
				button_text_style : '.t { font-family: Arial; font-size: 12pt; color: #ffffff; font-weight: bold; }',
				button_text_top_padding: 0,
				button_text_left_padding: 0,
				button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
				button_cursor: SWFUpload.CURSOR.HAND,
				
				// Flash Settings
				flash_url : "<?php echo $this->webroot; ?>js/swfupload/swfupload.swf",

				custom_settings : {
					upload_target : "divFileProgressContainer"
				},
				
				// Debug Settings
				debug: false
			});
		};
	</script>

	<div id="thumbnails">
		<?php foreach($uploaded as $file_id => $file_data): ?>
		<div class="thumbnail">
			<img src="<?php echo $this->Html->url(array('action' => 'thumbnail', $file_id)); ?>" />
			<div class="title"><?php echo $file_data["title"]; ?></div>
			<div class="img_id"><?php echo $file_id; ?></div>
			<?php 
					echo $this->Html->link(
						$html->image(
							'icons/delete.png', 
							array('alt' => __('Delete', true), 'title' => __('Delete', true))
						),
						array('action' => 'remove', $file_id),
						array('escape' => false, 'class' => 'remLink'), 
						__('Are you sure you want to delete?', true)
					);
				?>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="clear"></div>
	<script>
		$(document).ready(function(){
			$('.remLink').click(function(){
				var $self = $(this);
				$.get($(this).attr('href'), function(data) {
					if (data == "OK"){
						var $removed = $self.parent();
						$removed.remove();
					}else{
						alert('Błąd');
					}
				});
				return false;
			})
		});
	</script>
	<?php if( !function_exists("imagecopyresampled") ): ?>
	<div class="message">
		<h4><strong>Error:</strong> </h4>
		<p>Application Demo requires GD Library to be installed on your system.</p>
		<p>Usually you only have to uncomment <code>;extension=php_gd2.dll</code> by removing the semicolon <code>extension=php_gd2.dll</code> and making sure your extension_dir is pointing in the right place. <code>extension_dir = "c:\php\extensions"</code> in your php.ini file. For further reading please consult the <a href="http://ca3.php.net/manual/en/image.setup.php">PHP manual</a></p>
	</div>
	<?php else: ?>
	<form id="uploadButtonForm">
		<div class="buttonLink">
			<span id="spanButtonPlaceholder"></span>
		</div>
	</form>
	<?php endif; ?>
	<div id="divFileProgressContainer" style="height: 75px;"></div>
	<div class="clear"></div>

	<?php echo $this->Form->create('Photo'); ?>
	<?php echo $this->Form->input('gallery_id', array('type' => 'hidden')); ?>
	<?php echo $this->Form->input('titles', array('type' => 'hidden')); ?>
	<?php echo $this->Form->end(__('Submit', true)); ?>
	
	<script>
	$(document).ready(function() {
		$('#thumbnails > .thumbnail > .title').editable(function(value, settings) { return(value); });
		
		$('#PhotoAdminManageForm .submit > input').click(function(){
			var $image_data_array = new Array(); 
			$('.thumbnail').each(function(i, thumb){
				var image_data = new Object();
				image_data.id = $('.img_id', this).text();
				image_data.title = $('.title', this).text();

				$image_data_array[i] = image_data;
			});

			var myJsonString = JSON.stringify($image_data_array)
			$('#PhotoTitles').val(myJsonString);
		});
	});
	</script>