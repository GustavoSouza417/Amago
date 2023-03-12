<?php
	session_start();

	if(isset($_POST["submitComentario"])){
		try{
			$comentario = $_POST["inputComentario"];
			$idUsuario = $_SESSION["usuario"]["id"];
			$data = $_POST["data"];
			$hora = $_POST["hora"];

			$idPc = $_POST["idPc"];
			$latitudeUsuario = $_POST["latitudeUsuario"];
			$longitudeUsuario = $_POST["longitudeUsuario"];
			$longitudePc = $_POST["longitudePc"];
			$latitudePc = $_POST["latitudePc"];

			include_once("../../sql/conexao.inc");

			$sql = "INSERT INTO comentariosPc (comentario, data, hora, id_usuario, id_pc) VALUES ('$comentario', '$data', '$hora', '$idUsuario', '$idPc')";
			$saida = @mysqli_query($conexao, $sql);

			if(isset($saida)){
				mysqli_close($conexao);
            	header("location: ../../html/apresentacaoPc.php?idPc=" . $idPc . "&latitudeUsuario=" . $latitudeUsuario . "&longitudeUsuario=" . $longitudeUsuario . "&longitudePc=" . $longitudePc . "&latitudePc=" . $latitudePc);	
			}
			else{
				mysqli_close($conexao);
				echo "Ocorreu algum erro durante o processamento do envio do seu comentário. Por favor, tente novamente.";
			}
		}
		catch(Exception $e){
			echo "Um erro foi encontrado. Por favor, tente novamente.\n\nErro: " . $e->getMessage();
		}
	}
?>