<?php 
    session_start();

    if(isset($_SESSION["usuario"])){
        header("location: index.php");
    } 
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- Meta tags Obrigatórias -->
		 <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- Estilo customizado -->
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<title>Perfil</title>
		<style>
		.perfil{
			width: 400px;
			height: 300px;
			background-color: #ffffff;
			margin: 15% auto 0 auto;
			box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
  		} 
		.forms{
			margin-left: 10%;
			padding-top: 20%;
			margin-bottom: 5%;
		}
		
		.itens{
			margin-left: 10%;
			margin-top: 30%;
		}
    </style>
	</head>
	
	<body class="body_cad">
	<session class="">
		<div class="perfil">
			<h3 class="forms">Você quer cadastrar um:</h3><br>
			<a class="itens" href="cadastroUsuario.php">Usuario comum</a><br>
			<a class="itens" href="cadastroPc.php">Ponto de coleta</a>
		</div>
	</session>

	<!-- JavaScript (Opcional) -->
        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>
</html>