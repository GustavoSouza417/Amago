<?php
	session_start();
	
	if(isset($_POST["submit"])){
		try{
			$nome = $_POST["nome"];
			$email = $_POST["email"];
			$senha = $_POST["senha"];
			$confirmarSenha = $_POST["confirmarSenha"];

			if($nome == "" || $email == "" || $senha == "" || $confirmarSenha == ""){
				echo "Por favor, preencha todos os campos do formulário!";
			}
			else{
				if(strlen($senha) < 8){
					echo "A senha deve ter, no mínimo, oito caracteres";
				}
				else{
					if($senha != $confirmarSenha){
						echo "Os dados contidos em \"senha\" e em \"confirmar senha\" devem ser iguais"; 
					}
					else{	
						include_once("../../sql/conexao.inc");

						$sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
						$saida = @mysqli_query($conexao, $sql);

						if(!isset($saida)){
			            	mysqli_close($conexao);
			            	echo "Ocorreu algum erro durante o processamento dos dados. Por favor, tente novamente";
			            }
			            else{
			            	mysqli_close($conexao);
			            	header("location: ../../html/login.php");
			            }
					}
				}
			}
		}
		catch(Exception $e){
			echo "Um erro foi encontrado. Por favor, tente novamente.\n\nErro: " . $e->getMessage();
		}
	}
?>