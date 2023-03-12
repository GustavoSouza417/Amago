<?php
	session_start();

	if(isset($_POST["curtir"])){
		try{
			$quemCurtiu = $_SESSION["usuario"]["id"];
			$idComentario = $_POST["idComentario"];

			$idPc = $_POST["idPc"];
			$latitudeUsuario = $_POST["latitudeUsuario"];
			$longitudeUsuario = $_POST["longitudeUsuario"];
			$longitudePc = $_POST["longitudePc"];
			$latitudePc = $_POST["latitudePc"];

			include_once("../../sql/conexao.inc");

			$sql = "SELECT * FROM curtidasPc WHERE id_usuario = '$quemCurtiu' AND id_comentarioPc = '$idComentario'";
			$saida = @mysqli_query($conexao, $sql);
			$dadosCurtida = $saida -> fetch_assoc();

			$sql2 = "SELECT curtidas FROM comentariosPc WHERE id = '$idComentario'";
			$saida2 = @mysqli_query($conexao, $sql2);
			$numeroCurtidas = $saida2 -> fetch_assoc();

			$numeroCurtidas = intval($numeroCurtidas["curtidas"][0]);

			if($dadosCurtida == null){
				$numeroCurtidas += 1;

				$sql = "
					INSERT INTO curtidasPc (id_usuario, id_comentarioPc) VALUES ('$quemCurtiu', '$idComentario');
					UPDATE comentariosPc SET curtidas = '$numeroCurtidas' WHERE id = '$idComentario'
				";
				$saida = @mysqli_multi_query($conexao, $sql);

				mysqli_close($conexao);
				header("location: ../../html/apresentacaoPc.php?idPc=" . $idPc . "&latitudeUsuario=" . $latitudeUsuario . "&longitudeUsuario=" . $longitudeUsuario . "&longitudePc=" . $longitudePc . "&latitudePc=" . $latitudePc);
			}
			else{
				$numeroCurtidas -= 1;

				$sql = "
					DELETE FROM curtidasPc WHERE id_usuario = '$quemCurtiu' AND id_comentarioPc = '$idComentario';
					UPDATE comentariosPc SET curtidas = '$numeroCurtidas' WHERE id = '$idComentario'
				";
				$saida = @mysqli_multi_query($conexao, $sql);

				var_dump($saida);

				mysqli_close($conexao);
				header("location: ../../html/apresentacaoPc.php?idPc=" . $idPc . "&latitudeUsuario=" . $latitudeUsuario . "&longitudeUsuario=" . $longitudeUsuario . "&longitudePc=" . $longitudePc . "&latitudePc=" . $latitudePc);
			}
		}
		catch(Exception $e){
			echo "Um erro foi encontrado. Por favor, tente novamente.\n\nErro: " . $e->getMessage();
		}
	}
?>