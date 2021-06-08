$(document).ready(e => {
    $('#updtProfile').click(e => {
        e.preventDefault();

        const name        = $('#name')
        const email       = $('#email')
		const password    = $('#password')
        
        let alert = $('#alert-form')

		function clearAlert(field) {
			if(field.text() !== '') {
				setTimeout(() => {
					field.removeClass('show')
					field.addClass('hide')
					field.removeClass('alert-danger')
					field.text('')
				}, 3000)
			}
		}

        function clearInputs() {
			name.val('')
			email.val('')
			password.val('')
		}

        if (
			name.val() === '' ||
			email.val() === '' ||
			password.val() === ''
		) {
			alert.addClass('alert-danger')
			alert.text('Preencha todos os dados corretamente.')
			alert.removeClass('hide')
			alert.addClass('show')

			clearInputs()
			clearAlert(alert)
		} else {

            $.ajax({
                type: 'POST',
                url: "../service/updateCredentials.php",
                data: {
                    name : name.val(),
                    email : email.val(),
                    pass : password.val()
                },
                success: function (data) {
                    alert.addClass('alert-success')
                    alert.text('Dados Atualizados!')
                    alert.removeClass('hide')
                    alert.addClass('show')

                    clearInputs()
                    clearAlert(alert)
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log(textStatus)
                }
            })
        }	
    })
})