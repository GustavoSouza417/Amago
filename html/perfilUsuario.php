<?php 
    session_start();

    if($_SESSION["usuario"]["id_perfil"] == "2"){
        header("location: index.php");
    } 
?>

<!DOCTYPE html>
	<html>
		<!-- Meta tags Obrigatórias -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		 <!-- Estilo customizado -->
		 <link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title> 
		<style>
			#dadosUsuario{
				margin-left: 20%;
				margin-right: 20%;
				margin-top: 1%;
				padding: 5%;
			}

			.botoes{
				margin-top: 1%;
				width: 20%;
				height: 45px;
				border: none;
				cursor: pointer;   
			}

			.excluir{
				margin-top: 1%;
				width: 50%;
				height: 45px;
				border: none;
				cursor: pointer;      
				color: red
			} 

      .foto{
        border-radius: 100%;
				width: 150px;
				height: 150px;
      }

      img:hover{
    transform:none;
      }
        .foto_topo{
            border-radius: 100%;
            width: 25px;
            height: 25px;
        }
    </style>
  </head>

  <body onload="initialize()">
    <div id="map" style="width: 320px; height: 480px; display: none;"></div>
    
    <header><!-- inicio Cabecalho -->
      <nav class="navbar navbar-expand-sm navbar-light bg-success">
        <div class="container">
          
          <a href="index.php" class="navbar-brand">
            <img id="logo" src="../img/logo/SVG/1logotipo/logotipoBranco-svg.svg" width="100px">
          </a>

          <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="nav-principal">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a href="index.php" id="inicio" class="nav-link">Início</a>
              </li>
              <li class="nav-item">
                <a href="descarte.php" id="descarte" class="nav-link">Descarte</a>
              </li>
              <li class="nav-item">
                <a href="blog.php" id="blog" class="nav-link">Matérias</a>
              </li>
              <li class="nav-item">
                <?php
                  if(isset($_SESSION["usuario"])){
                    if($_SESSION["usuario"]["id_perfil"] == "1"){
                ?>
                      <a href="perfilUsuario.php" class="btn btn-outline-light ml-4"><?php echo ($_SESSION["usuario"]["foto"] == NULL ? "<img class=foto_topo src=../img/perfilSemFoto.png>" : "<img class=foto_topo src=../php-img/fotoPerfilUsuario/" . $_SESSION["usuario"]["foto"] . ">");  ?></a>
                <?php
                    }
                    else{
                      if($_SESSION["usuario"]["id_perfil"] == "2"){
                ?>
                      <a href="perfilPc.php" class="btn btn-outline-light ml-4"><?php echo ($_SESSION["usuario"]["foto"] == NULL ? "<img class=foto_topo src=../img/perfilSemFoto.png>" : "<img class=foto_topo src=../php-img/fotoPerfilPc/" . $_SESSION["usuario"]["foto"] . ">");  ?></a>
                <?php
                      }
                    }
                  }
                  else{
                ?>
                  <a href="login.php" class="btn btn-outline-light ml-4">Entrar</a>
                <?php
                  }
                ?>
              </li>
            </ul>
          </div>

        </div>
      </nav>
    </header><!--/fim Cabecalho -->

	<div id="dadosUsuario">
		<div>
      <h2>Dados pessoais</h2>
			Nome:   <?php echo $_SESSION["usuario"]["nome"]  ?> <br>
			E-mail: <?php echo $_SESSION["usuario"]["email"] ?> <br><br>
			<?php echo ($_SESSION["usuario"]["foto"] == NULL ? "<img src=../img/perfilSemFoto.png> " : "<img class=foto src=../php-img/fotoPerfilUsuario/" . $_SESSION["usuario"]["foto"] . ">");  ?><br><br>
    </div>

		<form action="../php/perfilUsuario/fotoPerfil.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="fotoPerfil">
			<input class="botoes" type="submit" name="enviarFoto" value="Enviar foto">
		</form>

		<br>

		<form action="../php/perfilUsuario/logout.php" method="POST">
			<input class="botoes" type="submit" name="logout" value="Sair">
		</form>
			
		<form action="../php/perfilUsuario/excluirConta.php" method="POST">
			<input class="excluir" type="submit" name="excluirConta" value="Excluir conta">
		</form>
	</div>			  
		
	</body>
</html>