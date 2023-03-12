<?php
	session_start();

	if(isset($_POST["enviarFoto"])){
		try{
			if(isset($_FILES["fotoPerfil"])){
				$extensao = strtolower(substr($_FILES["fotoPerfil"]["name"], -4));
				$nome = md5(time()) . $extensao;
				$endereco = "../../php-img/fotoPerfilPc/";
				move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], $endereco . $nome);

				include_once("../../sql/conexao.inc");

				$id = $_SESSION["usuario"]["id"];

				$sql = "UPDATE pc SET foto = '$nome' WHERE id = '$id'";
				$saida = @mysqli_query($conexao, $sql);

				if(isset($saida)){
					$_SESSION["usuario"]["foto"] = $nome;
					header("location: ../../html/perfilPc.php");
				}
				else{
					echo "Houve um erro durante o envio da sua foto. Tente novamente";
				}
			}
		}
		catch(Exception $e){
			echo "Um erro foi encontrado. Por favor, tente novamente.\n\nErro: " . $e->getMessage();
		}
	}
?>