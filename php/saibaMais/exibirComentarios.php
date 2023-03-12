<?php
	try{
		$host = "localhost"; $username = "root"; $password = "usbw"; $dbName = "amago";
		$conexao = @mysqli_connect($host, $username, $password, $dbName) or die("O banco morreu");

		$sql = "
			SELECT
				c.id, c.comentario, c.curtidas, c.data, c.hora, c.id_usuario, c.id_pc,
				u.id, u.nome, u.foto
			FROM comentariosPc AS c
			INNER JOIN usuario AS u
			ON c.id_usuario = u.id
			WHERE c.id_pc = '$idPc'
			ORDER BY c.id DESC
		";

		$saida = @mysqli_query($conexao, $sql);
		$comentario = $saida -> fetch_all();
	}
	catch(Exception $e){
		echo "Um erro foi encontrado. Por favor, tente novamente.\n\nErro: " . $e->getMessage();
	}
?>