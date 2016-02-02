$(document).ready(function() {

	 /*

	########  #######   ######    ######   ##       ########    #### ##    ## ########  ##     ## ######## 
	   ##    ##     ## ##    ##  ##    ##  ##       ##           ##  ###   ## ##     ## ##     ##    ##    
	   ##    ##     ## ##        ##        ##       ##           ##  ####  ## ##     ## ##     ##    ##    
	   ##    ##     ## ##   #### ##   #### ##       ######       ##  ## ## ## ########  ##     ##    ##    
	   ##    ##     ## ##    ##  ##    ##  ##       ##           ##  ##  #### ##        ##     ##    ##    
	   ##    ##     ## ##    ##  ##    ##  ##       ##           ##  ##   ### ##        ##     ##    ##    
	   ##     #######   ######    ######   ######## ########    #### ##    ## ##         #######     ##   

	 */

	$('.toggle_input_value').each(function() {
	    var default_value = this.value;
	    $(this).focus(function() {
	        if(this.value == default_value) {
	            this.value = '';
	            $(this).css('color','#000000');
	        }
	        if($(this).hasClass('password_field')) {
		        this.type = 'password';
	        }
	    });

	    $(this).blur(function() {
	        if(this.value == '') {
	            this.value = default_value;
	            this.type = 'text';
	            $(this).css('color','#CCCCCC');
	        }
	    });
	});

	// Subscribe to Mailchimp

	$('#working_indicator').hide();
	$('#success_message').hide();
	$('#error_message').hide();

	$('#subscribe_form').submit(function() {

		var errors = "";
		var server_path = $('#server_path').val();

		if ($('#email').val() == "") { 
			errors += "Please Enter Your Email<br />"; 
		} else if (!validateEmail($('#email').val())) {
			errors += "Please check your email address";
		}

		/* Fade any existing messages on submit - then process */

		$('#working_indicator').fadeOut('fast');
		$('#success_message').fadeOut('fast');
		$('#error_message').fadeOut('fast', function() {

			if (errors != "") {
				$('#error_message').html(errors);
				$('#error_message').fadeIn();
			} else {
				$('#working_indicator').fadeIn();
				$.ajax({
					type: "POST",
					url: server_path+"mailchimp/subscribe",
					data: $('#subscribe_form').serialize()
				}).done(function(server_response) {
					$('#working_indicator').fadeOut('fast', function() {
						if (server_response == "success") {
							$('#success_message').fadeIn();
						} else {
							$('#error_message').html(server_response);
							$('#error_message').fadeIn();	
						}
					});
				});
			}
		});
		return false;
	});
});


// $('#error_message').fadeOut('fast', function() {
// 	$('#error_message').html(server_response);
// 	$('#error_message').fadeIn();	
// });

function validateAlphaOnly(value) {
	var pattern = /^([a-zA-Z- ]+)$/;
	return pattern.test(value);
}

function validateEmail(value) {
	var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
	return pattern.test(value);
}