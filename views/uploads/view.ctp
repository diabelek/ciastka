<div class="uploads view">
	<h2><?php echo $upload['Upload']['title'] ?></h2>
	<?php
		echo $this->Text->getShortText($upload['Upload']['description'], true);

		$filename_explode_array = explode('.', $upload['Upload']['filename']);
		$file_ext = $filename_explode_array[count($filename_explode_array) - 1];
	?>
	
	<?php if ($file_ext == "flv") : ?>
	<div class="video_player">
		<?php //echo $this->element("flowvideoplayer", array('link' => 'files/upload/mainpage/' . $upload['Upload']['filename'])); ?>
	</div>
	<?php else : ?>
	<div class="file">
		<?php
			$fileicon = "unknown";
			$explode_array = explode('/', $upload['Upload']['filetype']);
			if ($explode_array[0] == "video")
			{
				$fileicon = "video";
			} 
			else if ($explode_array[1] == "pdf")
			{
				$fileicon = "pdf";
			}
			
			echo '<a href="'.$this->webroot.$uploadDir.$upload['Upload']['path'].'/'.$upload['Upload']['filename'].'" >'.
				$html->image('download/'.$fileicon.'.png', array('alt' => $upload['Upload']['filename'], 'title' => $upload['Upload']['filename'])).'<span>'.$upload['Upload']['filename'].'</span></a>';
		?>
	</div>
	<?php endif; ?>
</div>
