<?php
	session_start();

	if(isset($_POST["logout"])){
		try{
			unset($_SESSION["usuario"]);
			session_destroy();

			header("location: ../../html/index.php");
		}
		catch(Exception $e){
			echo "Um erro foi encontrado. Por favor, tente novamente.\n\nErro: " . $e->getMessage();
		}
	}
?>