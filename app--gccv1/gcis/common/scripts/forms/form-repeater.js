/*=========================================================================================
		File Name: form-repeater.js
		Description: Repeat forms or form fields
		----------------------------------------------------------------------------------------
		Item Name: Robust - Responsive Admin Template
		Version: 2.0
		Author: PIXINVENT
		Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

(function(window, document, $) {
	'use strict';

	// Default
	$('.repeater-default').repeater();

	// Custom Show / Hide Configurations
	$('.file-repeater, .contact-repeater').repeater({
		
		show: function () {
			$(this).slideDown();
		},
		hide: function(remove) {
			if (confirm('This item will be removed upon save and cannot be undone!')) {
				$(this).slideUp(remove);				
			}
		}
	});


})(window, document, jQuery);