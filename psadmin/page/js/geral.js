$(document).ready(e => {

    // SHOW MODAL CREATE
    $('#create').click(e => {
        $('#myModalLabel').text('Novo Cliente')
        $('#nameClient').val('')
        $('#nome').val('')
        $('#status').val('')
        $('#dataOfPayment').val('')
        $('#value').val('')

        $('#modalCreate').modal('show')
    })

    // SHOW MODAL EDIT
    $table = $('#table')
    $table.on('click', '[btn-edit]', $.proxy(onBtnEditClick))

    function onBtnEditClick(e) {
        $('#myModalLabel').text('Editar Cliente')
        $('#id').val($(e.currentTarget).attr("data-id"))

        let name = $(e.currentTarget).attr("data-name")
        let status = $(e.currentTarget).attr("data-status")
        let datePayment = $(e.currentTarget).attr("data-payment")
        let value = $(e.currentTarget).attr("data-value")

        $('#nome').val(name)
        $('#status').val(status)
        $('#dataOfPayment').val(datePayment)
        $('#value').val(value)

        $('#modalCreate').modal('show')
    }

    // DELETE CLIENT
    $table.on('click', '[btn-delete]', $.proxy(onBtnDeleteClick))

    function onBtnDeleteClick(e) {
        let btnDelete = $(e.currentTarget)

        $.ajax({
            type: 'POST',
            url: "../service/deleteClients.php",
            data: {
                id : btnDelete.attr("data-id")
            },
            success: function (data) {
                setTimeout(() => {
                    location.reload()
                }, 1000)
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(textStatus)
            }
        })
    }

    // SUBMIT MODAL
    $('#btn-send-modal').click(e => {
        e.preventDefault();

        const id                = $('#id')
        const name              = $('#nome')
		const status            = $('#status')
		const dataOfPayment     = $('#dataOfPayment')
		const value             = $('#value')
        
        let alert = $('#alert-form-modal')

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
			status.val('')
			dataOfPayment.val('')
			value.val('')
		}

        if (
			name.val() === '' ||
			status.val() === '' ||
			dataOfPayment.val() === '' ||
			value.val() === ''
		) {
			alert.addClass('alert-danger')
			alert.text('Preencha todos os dados corretamente.')
			alert.removeClass('hide')
			alert.addClass('show')

			clearInputs()
			clearAlert(alert)
		} else {

			if($('#id').val() === '') {
                $.ajax({
                    type: 'POST',
                    url: "../service/createClients.php",
                    data: {
                        name : name.val(),
                        status : status.val(),
                        dataOfPayment : dataOfPayment.val(),
                        value : value.val()
                    },
                    success: function (data) {
                        alert.addClass('alert-success')
                        alert.text('Dados enviados!')
                        alert.removeClass('hide')
                        alert.addClass('show')
    
                        clearInputs()
                        clearAlert(alert)
                        setTimeout(() => {
                            location.reload()
                            $('#modalSuporte').modal('hide')
                        }, 3000)
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(textStatus)
                    }
                })

            } else {

                $.ajax({
                    type: 'POST',
                    url: "../service/updateClients.php",
                    data: {
                        id : id.val(),
                        name : name.val(),
                        status : status.val(),
                        dataOfPayment : dataOfPayment.val(),
                        value : value.val()
                    },
                    success: function (data) {
                        alert.addClass('alert-success')
                        alert.text('Dados enviados!')
                        alert.removeClass('hide')
                        alert.addClass('show')
    
                        clearInputs()
                        clearAlert(alert)
                        setTimeout(() => {
                            location.reload()
                            $('#modalSuporte').modal('hide')
                        }, 3000)
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(textStatus)
                    }
                })
            }
		}
    })
})