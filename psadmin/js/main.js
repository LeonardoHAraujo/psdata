
(function ($) {
    "use strict";

    // Clear message credentials incorrect
    $(document).ready(e => {
        let alertSession = $('#alert-session')

        setInterval(() => {
            if(alertSession.text() !== '') {
                alertSession.removeClass('show')
                alertSession.addClass('hide')
                alertSession.text('')
            }
        }, 3000)
        
    })

    // forget pass and user
    $('#forget').click(e => {
        e.preventDefault()

        let alert = $('#alert-form')

		function clearAlert(field) {
			if(field.text() !== '') {
				setTimeout(() => {
					field.removeClass('show')
					field.addClass('hide')
					field.removeClass('alert-success')
					field.text('')
				}, 3000)
			}
		}
        
        // Ajax for send user and pass here...
        $.post('../../data/SendMailForgetPass.php', { isSend: true }, data => {
            
            if(data !== '') {
                alert.addClass('alert-success')
                alert.text('Credenciais enviadas ao seu e-mail')
                alert.removeClass('hide')
                alert.addClass('show')

                clearAlert(alert)
            }
        })
    })

    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);