<?php

	require '../vendor/autoload.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

    # Get Authorized from front
    $isSend = filter_var($_POST['isSend'], FILTER_VALIDATE_BOOLEAN);

    if ($isSend == 1) {
        
        $credentials = file_get_contents('../psadmin/data/credentials.json');
        $credentials = json_decode($credentials, true);

        $name = $credentials['Name'];
        $email = $credentials['Email'];
        $password = $credentials['Password'];
    }

    # Validate fields
	if (
		$name === '' ||
		$name === null ||
		$email === '' ||
		$email === null ||
		$password === '' ||
		$password === null
	) {
		die();
	}

	$mail = new PHPMailer(true);

	# Server settings
	$mail->SMTPDebug  = SMTP::DEBUG_SERVER;                      
	$mail->isSMTP();                                            
	$mail->Host       = 'smtp.gmail.com';                    
	$mail->SMTPAuth   = true;                                   
	$mail->Username   = 'no.replay.psdata@gmail.com';                 
	$mail->Password   = 'Pablo@123456';                             
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
	$mail->Port       = 587; 

	# Recipients
	$mail->setFrom('no.replay.psdata@gmail.com', 'PSDATA Tecnologia');
	# $mail->addAddress('pablo@psdata.com.br', 'Pablo PSDATA');
	$mail->addAddress($email, $name);

	try {

		# Content
		$bodyMessage = "<!DOCTYPE html>
			<html lang='pt-br'>
			<head>
				<meta charset='UTF-8'>
				<title>E-mail</title>

				<style>
					.container {
						margin: 50px auto;
						width: 60%;
					}

					.ola {
						font-size: 140%;
					}
				</style>
			</head>
			<body>
				<div class='container'>
					<td
					valign='top'
					style='
						font-size: 16px;
						font-family: Arial;
						font-weight: normal;
						border-collapse: collapse;
						vertical-align: top;
						padding: 20px;
						margin: 0px;
						border: 1px solid rgb(235, 235, 235);
						background: rgb(255, 255, 255);
						--darkreader-inline-border-top: #363a3c;
						--darkreader-inline-border-right: #363a3c;
						--darkreader-inline-border-bottom: #363a3c;
						--darkreader-inline-border-left: #363a3c;
						--darkreader-inline-bgimage: initial;
						--darkreader-inline-bgcolor: #181a1b;
					'
					data-darkreader-inline-border-top=''
					data-darkreader-inline-border-right=''
					data-darkreader-inline-border-bottom=''
					data-darkreader-inline-border-left=''
					data-darkreader-inline-bgimage=''
					data-darkreader-inline-bgcolor=''
					>
									
					<br />
					
					<p class='ola'>
						Ola! <b>$(name)</b> segue suas credenciais de acesso,
					</p>
					
					<br />
				
					<p>
						$(message)
					</p>
				
					<br />Atenciosamente, <br /><b>Suporte PSDATA</b> <br /><a
						href='http://psdata.com.br/'
						target='_blank'
						rel='noopener noreferrer'
						data-auth='NotApplicable'
						>PSDATA Tecnologia</a>

						<br />
						<br />

						<img
						src='https://i.ibb.co/CW1wqH2/logo.png'
						width='201'
						height='50'
						/>
					</td>
				</div>
			</body>
		</html>";

		$infos = "
			<ul>
				<li>Nome: $name</li>
				<li>Email: $email</li>
				<li>Password: $password</li>
			</ul>
		";

		$bodyMessage = str_replace('$(name)', 'Pablo PSDATA', $bodyMessage);
		$bodyMessage = str_replace('$(message)', $infos, $bodyMessage);

		$mail->isHTML(true);      
		$mail->Subject = "Recuperacao de credenciais";
		$mail->Body    = $bodyMessage;

		$mail->send();

	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
?>