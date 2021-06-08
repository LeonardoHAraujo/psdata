<?php

	require '../vendor/autoload.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	# Validate fields
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$files = $_FILES['files'];

	if (
		$name === '' ||
		$name === null ||
		$email === '' ||
		$email === null ||
		!isset($files) ||
		$files === ''
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
	$mail->addAddress($email, $name);

    # atach here...
    $countfiles = count($files['name']);

    for ($i=0; $i < $countfiles; $i++) { 
        
        # File name
        $filename = $files['name'][$i];

        # Get extension
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        # Valid image extension
        $valid_ext = array("pdf");

        # Check extension
        if(in_array($ext, $valid_ext)){
            $mail->addAttachment($files['tmp_name'][$i], $files['name'][$i]);
        }
    }

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
						Ola! <b>$(name)</b>,
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

		$message = 'Segue presente no corpo deste e-mail o(s) seu(s) boleto(s) referente à demanda exercida pela PSDATA Tecnologia.';

		$bodyMessage = str_replace('$(name)', $name, $bodyMessage);
		$bodyMessage = str_replace('$(message)', $message, $bodyMessage);

		$mail->isHTML(true);      
		$mail->Subject = 'Boleto PSDATA';
		$mail->Body    = $bodyMessage;

		$mail->send();

	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
?>