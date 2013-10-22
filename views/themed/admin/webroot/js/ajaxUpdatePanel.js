(function($) {
	$.fn.extend({
		ajaxUpdatePanel: function(contentLink, startHidden, ajaxId) {
			// Call the ConfigureAjaxUpdatePanel function for the selected element
			return $(this).each(function () {
				ConfigureAjaxUpdatePanel(this, contentLink, startHidden, ajaxId);
			});
		}
	});

})(jQuery);

function ConfigureAjaxUpdatePanel(panel, contentLink, startHidden, ajaxId) {
	if (startHidden == true) {
		$("<div class='ajaxUpdatePanelContent' style='display: none' id='" + ajaxId + "'></div>").prependTo($(panel));
	} else {
		$("<div class='ajaxUpdatePanelContent' id='" + ajaxId + "'></div>").prependTo($(panel));
	}

	if (startHidden == true) {
		$("<div class='ajaxUpdatePanelLoading'><span></span></div>").prependTo($(panel));
	} else {
		$("<div class='ajaxUpdatePanelLoading' style='display: none'><span></span></div>").prependTo($(panel));
	}
	

	var content = $(".ajaxUpdatePanelContent", panel);
	var parent = $(".ajaxUpdatePanelContent", panel).parent();
	$(content).load(contentLink, function() {
		stopLoading(content);
	});
	attachHandlers(content);
}

function stopLoading(panel) {
	$(panel).prev().slideUp();
	$(panel).slideDown();
}

function startLoading(panel) {
	$(panel).slideUp();
	$(panel).prev().slideDown();
}

function attachHandlers(panel) {
	$('a', panel).live('click', function() {
		startLoading(panel);
		
		var ajaxId = $(panel).attr('id');
		if (ajaxId != '')
			ajaxId = '/ajaxId:' + ajaxId;
		
		var targetUrl = $(this).attr('href') + ajaxId;
		$(panel).load(targetUrl, function() {
			stopLoading(panel);
		});
		return false;
	});
	
	var form = $('form', panel);
	$(form).live('submit', function(event) {
		event.preventDefault();

		startLoading(panel);
		
		var ajaxId = $(panel).attr('id');
		if (ajaxId != '')
			ajaxId = '/ajaxId:' + ajaxId;
		
		var targetUrl = $(this).attr('action') + ajaxId;
		
		$.post(targetUrl, $(this).serialize(),
			function(data) {
				$(panel).empty().append(data);
				stopLoading(panel);
			}
		);
	});
}