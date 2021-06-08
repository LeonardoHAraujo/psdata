// JavaScript Document
$( document ).ready(function() {

	// Update Visits
	$.ajax({
		type: 'POST',
		url: "../psadmin/service/updateVisits.php",
		data: {
			visit : 1
		},
		success: function (data) {
			// ...
		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
			// ...
		}
	})
	
	// Contact form
	$('#btn-send').click(function(e){
		e.preventDefault()
		
		const name     = $('#iptnome')
		const email    = $('#iptemail')
		const company  = $('#iptempresa')
		const subject  = $('#iptassunto')
		const text	   = $('#iptmsg')

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
			company.val('')
			subject.val('')
			text.val('')
		}

		if (
			name.val() === '' ||
			email.val() === '' ||
			company.val() === '' ||
			subject.val() === '' ||
			text.val() === ''
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
				url: "data/SendMailContact.php",
				data: {
					name : name.val(),
					email : email.val(),
					company : company.val(),
					subject : subject.val(),
					text : text.val()
				},
				success: function (data) {
	
					alert.addClass('alert-success')
					alert.text('Dados enviados! Em breve retornaremos o contato. Obrigado.')
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


	// Modal Form
	$('#btn-send-modal').click(function(e){
		e.preventDefault()
		
		const name     = $('#iptCliente')
		const email    = $('#iptEmail')
		const service  = $('#iptTitulo')
		const description  = $('#iptDescricao')

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
			email.val('')
			service.val('')
			description.val('')
		}

		if (
			name.val() === '' ||
			email.val() === '' ||
			service.val() === '' ||
			description.val() === ''
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
				url: "data/SendMailSupport.php",
				data: {
					name : name.val(),
					email : email.val(),
					service : service.val(),
					description : description.val()
				},
				success: function (data) {
					console.log(data)
	
					alert.addClass('alert-success')
					alert.text('Dados enviados! Em breve retornaremos o contato. Obrigado.')
					alert.removeClass('hide')
					alert.addClass('show')

					clearInputs()
					clearAlert(alert)
					setTimeout(() => $('#modalSuporte').modal('hide'), 3000)
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					console.log(textStatus)
				}
			})
		}
	})
})

	/*$.ajax({

		success: function( data )
		{
			$("#caixaFormulario").html("<b>Dados enviados!</b> Em breve retornaremos o contato. Obrigado.");
		}
	}).fail(function() {
		alert( "Erro ao enviar formulário!" );
	});*/