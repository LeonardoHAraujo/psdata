$(document).ready(function(){

    $('#formShipping').submit(function(e){
        e.preventDefault();

        const name        = $('#name')
        const email       = $('#email')
		const files       = $('#files')
        
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
			files.val('')
		}

        if (
			name.val() === '' ||
			email.val() === '' ||
			files.val() === ''
		) {
			alert.addClass('alert-danger')
			alert.text('Preencha todos os dados corretamente.')
			alert.removeClass('hide')
			alert.addClass('show')

			clearInputs()
			clearAlert(alert)
		} else {

            var form_data = new FormData();

            form_data.append("name", name.val());
            form_data.append("email", email.val());
        
            // Read selected files
            var totalfiles = document.getElementById('files').files.length;
            for (var index = 0; index < totalfiles; index++) {
                form_data.append("files[]", document.getElementById('files').files[index]);
            }

            $.ajax({
                url: '../../../data/SendFileByEmail.php',
                data: form_data,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    alert.addClass('alert-success')
                    alert.text('Dados Enviados!')
                    alert.removeClass('hide')
                    alert.addClass('show')

                    clearInputs()
                    clearAlert(alert)
                }
            })           
        }
    });
});