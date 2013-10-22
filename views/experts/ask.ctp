<div class="experts ask">

	<h2>Zapytaj eksperta</h2>

	<div id="result_box" style="display:none"></div>
	<div id="loading_box" class="loading" style="display:none"></div>
	<div id="send_next" style="display:none">
		<a href="#" title="Wyślij kolejne zgłoszenie">Wyślij kolejne zgłoszenie</a>
	</div>
	<div id="form_box">
			<?php 
				echo $this->Form->create('Expert', array('action' => 'sendask'));

				echo $this->Form->input('email', array('label' => 'e-mail'));
				echo $this->Form->input('name', array('label' => 'imię nazwisko'));
				echo $this->Form->input('company', array('label' => 'organizacja'));
				echo $this->Form->input('category_id', array('label' => 'kategoria', 'empty' => true));
				echo $this->Form->input('subcategory', array('label' => 'wybierz podkategorię', 'disabled' => true, 'type' => 'select'));
				echo $this->Form->input('content', array('label' => 'treść', 'type' => 'textarea'));
			?>
			<div id="recaptchaBox">
				<?php $recaptcha->display_form('echo'); ?>
			</div>
		<?php echo $this->Form->end('send.png');?>
	</div>
	<script>
		$('#ExpertCategoryId').change(function() {
			$val = $(this).val();
			if ($val != '') {
				$url = '<?php echo $this->webroot; ?>exp_subcategories/get_by_category_id/' + $val;
				$.getJSON($url, function(data) {
					$('#ExpertSubcategory').html('');
					$.each(data, function(key, val) {
						$('#ExpertSubcategory').append('<option value="' + key + '">' + val + '</option>');
					});
					$('#ExpertSubcategory').attr('disabled', false);
				});
			}
			else
			{
				$('#ExpertSubcategory').html('');
				$('#ExpertSubcategory').attr('disabled', true);
			}
		});

		function validate(){
			$('.error-message').remove();

			var email = $('#ExpertEmail').val();
			if ($.trim(email) == '')
			{
				$('#ExpertEmail').parent().append('<div class="error-message">Adres e-mail nie może być pusty</div>');
				return;
			}

			if (!checkEmail(email))
			{
				$('#ExpertEmail').parent().append('<div class="error-message">Wprowadź poprawny adres e-mail</div>');
				return;
			}

			var content = $('#ExpertName').val();
			if ($.trim(content) == '')
			{
				$('#ExpertName').parent().append('<div class="error-message">Imię nazwisko nie może być puste</div>');
				return;
			}
			
			var content = $('#ExpertCompany').val();
			if ($.trim(content) == '')
			{
				$('#ExpertCompany').parent().append('<div class="error-message">Organizacja nie może być pusta</div>');
				return;
			}
				
			var category_id = $('#ExpertCategoryId').val();
			if ($.trim(category_id) == '')
			{
				$('#ExpertCategoryId').parent().append('<div class="error-message">Kategoria nie może być pusta</div>');
				return;
			}

			var subcategory_id = $('#ExpertSubcategory').val();
			if ($.trim(subcategory_id) == '')
			{
				$('#ExpertSubcategory').parent().append('<div class="error-message">Podkategoria nie może być pusta</div>');
				return;
			}

			var content = $('#ExpertContent').val();
			if ($.trim(content) == '')
			{
				$('#ExpertContent').parent().append('<div class="error-message">Treść nie może być pusta</div>');
				return;
			}
			
			var form = $("#ExpertSendaskForm");
			$.ajax({
				type:'POST', 
				url: '<?php echo $this->webroot; ?>calendars/checkcaptcha', 
				data: form.serialize(), 
				success: captchaResult
			});
		}

		function captchaResult(data){
			if (data == false){
				Recaptcha.reload();
				$('#recaptchaBox').append('<div class="error-message">Tekst obrazka nie zgadza się</div>');
			} else {
				send();
			}
		}

		function send(){
			var form = $("#ExpertSendaskForm");
			var action = form.attr('action');
			$('#form_box').hide();
			$('#loading_box').show();
			$.ajax({
				type:'POST', 
				url: action, 
				data: form.serialize(), 
				success: sendResult
			});
		}
		
		function sendResult(data){
			$('#result_box').html(data);
			$('#result_box').show();
			$('#loading_box').hide();
		}
		
		$('#ExpertSendaskForm').submit(function() {
			$('#result_box').html('');
			validate();

			return false;
		});
	</script>
</div>
