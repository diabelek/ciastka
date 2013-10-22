<?php

class TextHelper extends AppHelper {
	
	function getShortText($text, $getall = false, $cutShortText = false, &$addMoreButton = false) {
		
		$addMoreButton = false;
		
		$splitter = "<div style=\"page-break-after: always;\">";
		$splitter2 = "<div style=\"page-break-after: always\">";
		$splitterpart2 = "<span style=\"display: none;\">&nbsp;</span></div>";

		$splitpos = strpos($text, $splitter);

		if ($splitpos === false)
		{
			$splitter = $splitter2;
			$splitpos = strpos($text, $splitter2);
		}

		if ($splitpos !== false && $getall == false)
		{
			$addMoreButton = true;
			return $this->closeTags(substr($text , 0 , $splitpos));
		}
		else
		{
			$result_text = str_replace($splitter , "" , str_replace($splitterpart2 , "" , $text));
			if ($cutShortText)
			{
				return $this->closeTags(substr($result_text , $splitpos));
			}
			else
			{
				return $this->closeTags($result_text);
			}
		}
		
		return $this->closeTags($text);
	}

	function getShortTextNum($text, $pos) {
		$splitter = "<div style=\"page-break-after: always;\">";
		$splitterpart2 = "<span style=\"display: none;\">&nbsp;</span></div>";

		return $this->closeTags(substr(str_replace($splitter , "" , str_replace($splitterpart2 , "" , $text)), 0 , $pos));
	}
	
	function formatSize($size) {
		$result = '';
		
		$gb = 1024 * 1024 * 1024;
		$mb = 1024 * 1024;
		$kb = 1024;
		if ($size >= $gb) //GB
		{
			return number_format($size / $gb, 1, ',', ' ') . ' GB';
		}
		elseif ($size >= $mb) //MB
		{
			return number_format($size / $mb, 1, ',', ' ') . ' MB';
		}
		elseif ($size >= $kb) //MB
		{
			return number_format($size / $kb, 1, ',', ' ') . ' KB';
		}		
		else //B
		{
			return number_format($size, 1, ',', ' ') . ' B';
		}
		
		return $result;
	}
	
	function closeTags($html)
	{
		App::import('Lib','HtmlPurifier');
		$parser = new HTMLPurifier();
		$parser->config->set('Attr.AllowedFrameTargets', array('_blank'));
		$parser->config->set('HTML.SafeObject', true);
		$parser->config->set('Output.FlashCompat', true);
		$parser->config->set('Filter.Custom', array( new HTMLPurifier_Filter_GoogleMaps() )); 

		return $parser->purify($html);
	}
}
?>
