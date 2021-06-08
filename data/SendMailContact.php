<?php

	require '../vendor/autoload.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	# Validate fields
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
	$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
	$text = filter_var($_POST['text'], FILTER_SANITIZE_STRING);

	if (
		$name === '' ||
		$name === null ||
		$email === '' ||
		$email === null ||
		$company === '' ||
		$company === null ||
		$subject === '' ||
		$subject === null ||
		$text === '' ||
		$text === null
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
	$mail->addAddress('pablo@psdata.com.br', 'Pablo PSDATA');

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
						Ola! <b>$(name)</b> esta pessoa está tentando contato com você,
					</p>

					<p>
						$(infos)
					</p>						
				
					<p
						align='center'
						style='
						font-size: 22px;
						padding: 10px;
						background-color: rgb(231, 231, 231);
						--darkreader-inline-bgcolor: #26292a;
						'
						data-darkreader-inline-bgcolor=''
					>
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
				<li>Empresa: $company</li>
			</ul>
		";

		$bodyMessage = str_replace('$(name)', 'Pablo PSDATA', $bodyMessage);
		$bodyMessage = str_replace('$(infos)', $infos, $bodyMessage);
		$bodyMessage = str_replace('$(message)', $text, $bodyMessage);

		$mail->isHTML(true);      
		$mail->Subject = $subject;
		$mail->Body    = $bodyMessage;

		$mail->send();

	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}

	/*
	require('autoload.php');
	// Register API keys at https://www.google.com/recaptcha/admin
	$siteKey = '6LeLTgkTAAAAALDDqQImQPSvUdl62IccMO7hSpge';
	$secret = '6LeLTgkTAAAAAHl2x1g5y0CG2tQ3vQg_3kq920Hz';
	$recaptcha = new \ReCaptcha\ReCaptcha($secret);
	// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
	$lang = 'pt-BR';
	
	$resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
	
	if ($resp->isSuccess()) {
	    
		
		
	} else {
	    $errors = $resp->getErrorCodes();
	}
	*/
?>