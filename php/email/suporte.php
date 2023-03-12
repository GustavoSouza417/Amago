<?php
	session_start();

	require_once("./PHPMailer/PHPMailer.php");
	require_once("./PHPMailer/SMTP.php");
	require_once("./PHPMailer/Exception.php");

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	if(isset($_POST["submit"])){
		try{
			$titulo = $_POST["titulo"];
			$texto = $_POST["texto"];

			if($titulo == "" || $texto == ""){
				echo "Por favor, preencha todos os campos do formulário!";
			}
			else{
				$nomeUsuario = $_SESSION["usuario"]["nome"];
				$emailUsuario = $_SESSION["usuario"]["email"];

				$mensagem = [
					"subject" => $titulo,
					"body" => $texto
				];

				$email = new PHPMailer(true);

				$email->SMTPDebug = SMTP::DEBUG_SERVER;
				$email->isSMTP();
				$email->Host = "smtp.office365.com";
				$email->SMTPAuth = true;
				$email->Username = "ecoamagoofficial@outlook.com";
				$email->Password = "senha123";
				$email->Port = 25;

				$email->setFrom("ecoamagoofficial@outlook.com");
				$email->addAddress("ecoamagoofficial@gmail.com");

				$email->Subject = $mensagem["subject"];
				$email->Body = $mensagem["body"] . "\n\n" . $nomeUsuario . "\n" . $emailUsuario;

				if($email->send()){
					echo "E-mail enviado com sucesso!";

					$email->setFrom("ecoamagoofficial@outlook.com");
					$email->addAddress($emailUsuario);

					$email->Subject = "Confirmação";
					$email->Body = "Olá ". $nomeUsuario . ", seu e-mail foi recebido com sucesso! Em breve, a equipe da Âmago avaliará a sua mensagem e lhe dará um retorno.";

					if($email->send()){
						echo "E-mail enviado com sucesso!";
					}
					else{
						echo "Ocorreu um erro durante o envio do e-mail de confirmação.";
					}
				}
				else{
					echo "Ocorreu um erro durante o envio do seu e-mail. Por favor, tente novamente.";
				}
			}
		}
		catch(Exception $e){
			echo "Ocorreu um erro durante o processamento do envio do e-mail: " . $email->ErrorInfo;
		}
	}
?>