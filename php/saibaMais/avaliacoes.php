<?php
	session_start();

	if(isset($_POST["submit"])){
		try{
			$idUsuario = $_SESSION["usuario"]["id"];
			$avaliacao = $_POST["avaliacao"];

			$idPc = $_POST["idPc"];
			$latitudeUsuario = $_POST["latitudeUsuario"];
			$longitudeUsuario = $_POST["longitudeUsuario"];
			$longitudePc = $_POST["longitudePc"];
			$latitudePc = $_POST["latitudePc"];

			include_once("../../sql/conexao.inc");

			if($avaliacao != ""){
				$sql = "SELECT * FROM avaliacoes WHERE id_usuario = '$idUsuario' AND id_pc = '$idPc'";
				$saida = @mysqli_query($conexao, $sql);
				$jaAvaliou = $saida -> fetch_assoc();

				$sql = "SELECT quantidadeAvaliacoes FROM pc WHERE id = '$idPc'";
				$saida = @mysqli_query($conexao, $sql);
				$quantidadeAvaliacoes = $saida -> fetch_assoc();

				$quantidadeAvaliacoes = intval($quantidadeAvaliacoes["quantidadeAvaliacoes"][0]);

				if($jaAvaliou == null){
					$quantidadeAvaliacoes += 1;

					$sql = "
						INSERT INTO avaliacoes (nota, id_usuario, id_pc) VALUES ('$avaliacao', '$idUsuario', '$idPc');
						UPDATE pc SET quantidadeAvaliacoes = '$quantidadeAvaliacoes' WHERE id = '$idPc'
					";
					$saida = @mysqli_multi_query($conexao, $sql);

					mysqli_close($conexao);
					header("location: ../../html/apresentacaoPc.php?idPc=" . $idPc . "&latitudeUsuario=" . $latitudeUsuario . "&longitudeUsuario=" . $longitudeUsuario . "&longitudePc=" . $longitudePc . "&latitudePc=" . $latitudePc);
				}
				else{
					$sql = "UPDATE avaliacoes SET nota = '$avaliacao' WHERE id_usuario = '$idUsuario' AND id_pc = '$idPc'";
					$saida = @mysqli_query($conexao, $sql);

					mysqli_close($conexao);
					header("location: ../../html/apresentacaoPc.php?idPc=" . $idPc . "&latitudeUsuario=" . $latitudeUsuario . "&longitudeUsuario=" . $longitudeUsuario . "&longitudePc=" . $longitudePc . "&latitudePc=" . $latitudePc);
				}
			}
			else{
				echo "Preencha a sua avaliação";
			}
		}
		catch(Exception $e){
			echo "Ocorreu um erro durante o processamento da sua avaliação: " . $e->getMessage();
		}
	}
?>