<?php
	try{
		if(isset($_SESSION["usuario"])){
			$id_usuario = $_SESSION["usuario"]["id"];
			
			//busca o número de estrelas que o usuário curtiu para exibir dinâmicamente no front-end
			$sql = "SELECT nota FROM avaliacoes WHERE id_usuario = '$id_usuario' AND id_pc = '$idPc'";
			$saida = @mysqli_query($conexao, $sql);
			$notaEstrelas = $saida -> fetch_assoc();
			$notaEstrelas = $notaEstrelas["nota"];
		}

		//pega a média das avaliações
		$sql = "SELECT AVG(nota) AS nota FROM avaliacoes WHERE id_pc = '$idPc'";
		$saida = @mysqli_query($conexao, $sql);
		$mediaAvaliacao = $saida -> fetch_assoc();
		$mediaAvaliacao = number_format($mediaAvaliacao["nota"], 1, ',','');
		
		//pega a quantidade de avaliadores
		$sql = "SELECT quantidadeAvaliacoes FROM pc WHERE id = '$idPc'";
		$saida = @mysqli_query($conexao, $sql);
		$quantidadeAvaliacoes = $saida -> fetch_assoc();
		$quantidadeAvaliacoes = $quantidadeAvaliacoes["quantidadeAvaliacoes"];

		//pega todos os dados essênciais dos pontos de coleta
		$sql = "SELECT nome, email, foto, tipoLixo, atuacao, cidade, bairro, rua, numero FROM pc WHERE id = '$idPc'";
		$saida = @mysqli_query($conexao, $sql);
		$pontoDeColeta = $saida -> fetch_assoc();

		$tipoLixo = $pontoDeColeta["tipoLixo"];

		echo "<br>";

		mysqli_close($conexao);
	}
	catch(Exception $e){
		echo "Ocorreu um erro durante o processamento da exibição das avaliações: " . $e->getMessage();
	}
?>