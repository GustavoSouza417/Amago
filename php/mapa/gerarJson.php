<?php
	$sql = "SELECT id, nome, foto, cidade, bairro, rua, latitude, longitude FROM pc ORDER BY id ASC";
	$saida = mysqli_query($conexao, $sql);
	$resultados = $saida->fetch_all();

	mysqli_close($conexao);

	$fh = fopen("../php/mapa/pontos.json", 'w');
	fwrite($fh, json_encode($resultados,
								JSON_PRETTY_PRINT |
							    JSON_NUMERIC_CHECK |
							    JSON_FORCE_OBJECT
							));
?>