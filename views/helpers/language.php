<?php

class LanguageHelper extends AppHelper {

	var $helpers = array('Form');

	/* expected param array struct
	 * $languages -> Array ("pol" => "Polish", "eng" => "English",... )
	 * $fields -> Array ("field1 => Array(params), field2 => Array(params),...)
	 */

	function createLangTabs($fields) {
		$languages = Configure::read('Settings.languages');
?>
	<script>
		$(function() {
			$( "#tabs" ).tabs();
		});
	</script>
	<div class="languages">
		<div id="tabs">
			<ul>
				<?php
					$i = 0;
					foreach ($languages as $language => $label)
					{
						echo "<li><a href=\"#tabs-".++$i."\">";
						__($label);
						echo "</a></li>";
					}
				?>
			</ul>
			<?php
				$i = 0;
				foreach ($languages as $language => $label)
				{
					echo "<div id=\"tabs-".++$i."\">";
					foreach ($fields as $field => $params)
					echo $this->Form->input($language.'-'.$field, $params);
					echo "</div>";
				}
			?>
		</div>
	</div>
<?php
	}
}
?>