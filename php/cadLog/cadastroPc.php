<?php
	session_start();
	
	$boleano = $_POST["boleano"];
	
	if(isset($_POST["submit"]) && $boleano == "true"){
		try{
			$nome = $_POST["nome"];
			$email = $_POST["email"];
			$senha = $_POST["senha"];
			$confirmarSenha = $_POST["confirmarSenha"];
			$atuacao = $_POST["atuacao"];
			$checkbox = null;
			$tipoLixo = "";

			$cidade = $_POST["cidade"];
			$rua = $_POST["rua"];
			$bairro = $_POST["bairro"];
			$numero = $_POST["numero"];

			$latitude = $_POST["latitude"];
			$longitude = $_POST["longitude"];

			if($nome == "" || $email == "" || $senha == "" || $confirmarSenha == "" || !isset($atuacao) || $cidade == "" || $rua == "" || $bairro == "" || $numero == "" || $latitude == "" || $longitude == ""){
				echo "Por favor, preencha todos os campos do formulário!";
			}
			else{
				for($i = 0; $i < 9; $i++){
					if(isset($_POST[$i])){
						$checkbox[$i] = true;
					}
					else{
						$checkbox[$i] = false;
					}
				}

				for($i = 0; $i < 9; $i++){
					if($checkbox[$i]){
						$tipoLixo .= $i;
					}
				}

				if($tipoLixo == "" || !isset($tipoLixo) || $tipoLixo == null){
					echo "Seu ponto de coleta deve suportar, pelo menos, um tipo de lixo";
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

							$sql = "INSERT INTO pc (nome, email, senha, tipoLixo, atuacao, cidade, bairro, rua, numero, latitude, longitude) VALUES ('$nome', '$email', '$senha', '$tipoLixo', '$atuacao', '$cidade', '$bairro', '$rua', '$numero', '$latitude', '$longitude')";
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
		}
		catch(Exception $e){
			echo "Um erro foi encontrado. Por favor, tente novamente.\n\nErro: " . $e->getMessage();
		}
	}
	else{
		echo "Por favor, preencha todos os dados, incluindo os de enredeços e confirme a localização";
	}
?>