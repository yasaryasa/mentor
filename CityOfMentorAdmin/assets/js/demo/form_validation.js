/*
 * form_validation.js
 *
 * Demo JavaScript used on Validation-pages.
 */

"use strict";

$(document).ready(function(){

	//===== Validation =====//
	// @see: for default options, see assets/js/plugins.form-components.js (initValidation())

	$.extend( $.validator.defaults, {
		invalidHandler: function(form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
				? 'You have left 1 mandatory field blank. Required fields are highlighted..'
				: 'You have left ' + errors + ' mandatory fields blank. Required fields are highlighted.';
				noty({
					text: message,
					type: 'error',
					timeout: 2000
				});
			}
		}
	});

	$("#form_to_be_validated").validate();

});