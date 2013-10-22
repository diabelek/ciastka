<div class="calendars writein">

	<h2>Zapisy na szkolenia</h2>

	<div id="result_box" style="display:none"></div>
	<div id="loading_box" class="loading" style="display:none"></div>
	<div id="send_next" style="display:none">
		<a href="#" title="Wyślij kolejne zgłoszenie">Wyślij kolejne zgłoszenie</a>
	</div>
	<div id="form_box">
		<?php echo $this->Form->create('Calendar', array('action' => 'sendwritein'));?>
		
			<div id="event">
				<h3>Wybierz szkolenie na które chcesz się zapisać</h3>
				<div id="event-title">
				<?php
					$options = array('label' => 'wybierz szkolenie', 'empty' => true);
					if (isset($calendar_id)) {
						$options['selected'] = $calendar_id;
					}
					echo $this->Form->input('calendar_id', $options);
				?>
				</div>
				<div id="event-date">
				<?php
					$options = array('label' => 'wybierz datę', 'disabled' => true, 'type' => 'select');
					if (isset($terms)) {
						$options['options'] = $terms;
						$options['disabled'] = false;
					}

					echo $this->Form->input('date', $options);
				?>
				</div>
				<div>
					Jeśli brak terminu lub interesuje Cię innym termin szkolenia zadaj pytanie.
				</div>
				<script>
					$('#CalendarCalendarId').change(function() {
						$val = $(this).val();
						if ($val != '') {
							$url = '<?php echo $this->webroot; ?>terms/get_dates/' + $val;
							$.getJSON($url, function(data) {
								$('#CalendarDate').html('');
								$.each(data, function(key, val) {
									$('#CalendarDate').append('<option value="' + val + '">' + val + '</option>');
								});
								$('#CalendarDate').attr('disabled', false);
							});
						}
						else
						{
							$('#CalendarDate').html('');
							$('#CalendarDate').attr('disabled', true);
						}
					});
				</script>
			</div>

			<div id="person">
				<h3>Dane osoby kontaktowej</h3>
				<table class="form-table">
					<tr>
						<td class="first"><?php echo $this->Form->input('contact_name', array('label' => 'Imię nazwisko')); ?></td>
						<td class="second"><?php echo $this->Form->input('company', array('label' => 'Firma')); ?></td>
					</tr>
					<tr>
						<td class="first"><?php echo $this->Form->input('email', array('label' => 'Adres e-mail')); ?></td>
						<td class="second"><?php echo $this->Form->input('street', array('label' => 'Ulica')); ?></td>
					</tr>
					<tr>
						<td class="first"><?php echo $this->Form->input('email_confirm', array('label' => 'Potwierdzenie adresu e-mail')); ?></td>
						<td class="second"><?php echo $this->Form->input('city', array('label' => 'Miasto')); ?></td>
					</tr>
					<tr>
						<td class="first"><?php echo $this->Form->input('phone', array('label' => 'Telefon kontaktowy')); ?></td>
						<td class="second"><?php echo $this->Form->input('tax_number', array('label' => 'NIP')); ?></td>
					</tr>
				</table>
			</div>

			<div id="persons">
				<h3>Osoby zgłaszane na szkolenie</h3>
				<div id="persons_fields">
				<?php 
					echo $this->Form->input('name', array('name' => 'data[Calendar][name][]', 'label' => 'Imię nazwisko')); 
				?>
				</div>
				<a href="#" id="add_person">Dodaj pole do wpisania kolejnej osoby</a>
				<script>
					$('#add_person').click(function() {
						$('#persons_fields').append('<?php echo $this->Form->input('name', array('name' => 'data[Calendar][name][]', 'label' => 'Imię nazwisko')); ?>');
						return false;
					});
				</script>
			</div>

			<div id="regulations">
				<h3>Zasady i Regulamin Rejestracji</h3>
				<table class="form-table">
					<tr>
						<td>
							Oświadczam, ze zapoznałem się z <?php echo $html->link("zasadami i regulaminem rejestracji", array('controller' => 'articles', 'action' => 'show', 'regulamin_szkolen'), array('target' => '_blank')); ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $this->Form->input('regulations', array('type' => 'checkbox', 'label' => 'Akceptuję regulamin')); ?>
						</td>
					</tr>
				</table>
			</div>

			<div id="recaptchaBox">
			<?php 
				//create the reCAPTCHA form. 
				$recaptcha->display_form('echo');
			?>
			</div>
		
		<?php echo $this->Form->end('send_decl.png');?>
	</div>

	<script>
		function validate() {
			$('.error-message').remove();

			var email = $('#CalendarEmail').val();
			if ($.trim(email) == '')
			{
				$('#CalendarEmail').parent().append('<div class="error-message">Adres e-mail nie może być pusty</div>');
				return;
			}

			if (!checkEmail(email))
			{
				$('#CalendarEmail').parent().append('<div class="error-message">Wprowadź poprawny adres e-mail</div>');
				return;
			}

			var email_confirm = $('#CalendarEmailConfirm').val();
			if (email != email_confirm)
			{
				$('#CalendarEmailConfirm').parent().append('<div class="error-message">Adresy e-mail nie są identyczne</div>');
				return;
			}

			var taxNum = $('#CalendarTaxNumber').val();
			if ($.trim(taxNum) == '')
			{
				$('#CalendarTaxNumber').parent().append('<div class="error-message">NIP nie może być pusty</div>');
				return;
			}

			if (!checkTaxNum(taxNum))
			{
				$('#CalendarTaxNumber').parent().append('<div class="error-message">Wprowadź poprawny numer NIP</div>');
				return;
			}

			var regulations = $('#CalendarRegulations');
			if (!regulations.is(':checked')) {
				$('#CalendarRegulations').parent().append('<div class="error-message">Musisz zaakceptować regulamin</div>');
				return;
			 }

			var form = $('#CalendarSendwriteinForm');
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
			var form = $('#CalendarSendwriteinForm');
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
			$('#send_next').show();
			$('#result_box').html(data);
			$('#result_box').show();
			$('#loading_box').hide();
		}

		$('#CalendarSendwriteinForm').submit(function() {
			$('#result_box').html('');
			validate();

			return false;
		});

		$('#send_next a').click(function() {
			Recaptcha.reload();
			$('#send_next').hide();
			$('#result_box').html('');
			$('#result_box').hide();
			$('#form_box').show('');
		});
	</script>
</div>
