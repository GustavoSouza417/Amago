<?php
	session_start();

	if(isset($_POST["excluirConta"])){
		try{
			include_once("../../sql/conexao.inc");

			$id = $_SESSION['usuario']['id'];

			$sql = "DELETE FROM pc WHERE id = $id";
			$saida = @mysqli_query($conexao, $sql);

			if(isset($saida)){
				unset($_SESSION["usuario"]);
				session_destroy();
				
				header("location: ../../html/index.php");
			}
			else{
				echo "Houve um erro durante a exclusão de sua conta. Por favor, tente novamente.";
			}
		}
		catch(Exception $e){
			echo "Um erro foi encontrado. Por favor, tente novamente.\n\nErro: " . $e->getMessage();
		}
	}
?>