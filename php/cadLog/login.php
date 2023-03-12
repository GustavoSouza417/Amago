<?php
	session_start();

	if(isset($_POST["submit"])){
		try{
			$email = $_POST["email"];
			$senha = $_POST["senha"];
			$perfil = $_POST["perfil"];
			$tabela = null;

			if($email == "" || $senha == "" || !isset($perfil)){
				echo "Por favor, preencha todos os campos do formulário!";
			}
			else{
				if($perfil == "usuario"){
					$tabela = "usuario";
				}
				else{
					if($perfil == "pc"){
						$tabela = "pc";
					}
				}

				include_once("../../sql/conexao.inc");

				$sql = "SELECT * FROM $tabela WHERE email = '$email' AND senha = '$senha'";
				$saida = @mysqli_query($conexao, $sql);
				$usuario = $saida->fetch_assoc();

				if(isset($usuario)){
					$_SESSION["usuario"] = $usuario;
					header("location: ../../html/index.php");
				}
				else{
					mysqli_close($conexao);
					echo "Conta não encontrada";
				}
			}
		}
		catch(Exception $e){
			echo "Um erro foi encontrado. Por favor, tente novamente.\n\nErro: " . $e->getMessage();
		}
	}
?>