<?php session_start(); ?>

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
			.bloco{
				background-color: black;
				width: 700px;
				height: 355px;
				background-color: #ffffff;
				margin: 10% auto 0 auto;
				box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
			}

			#suporte{
				margin-top: 5%;
				margin-left: 5%;
				margin-right: 20%;
				margin-top: 3%;
			}

			/*.video{
				position: absolute;
				right: 0;
				bottom: 0;
				min-width: 100%;
				min-height: 100%;
				width: 100%;
				height: 100%;
				z-index: -100;
				background-size: cover;
				background-color: #020501;
			}  */

			.texto{
				font-style: italic; 
				margin-left:5%;
				margin-right: 2.5%;
				text-align: justify;
			}

			.botoes{
				margin-top: 1%;
				width: 30%;
				height: 40px;
				border: none;
				cursor: pointer;     
			}

			.titulo{
				margin-left: 50%;
				padding-top: 5%;
				padding-bottom: 5%;
			}

			
			body{
				background-color: #e7e7e8;
				background-image: url("../img/capa.jpg");
				background-size: cover;
				background-repeat: no-repeat;
			}
        .foto{
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
                      <a href="perfilUsuario.php" class="btn btn-outline-light ml-4"><?php echo ($_SESSION["usuario"]["foto"] == NULL ? "<img class=foto src=../img/perfilSemFoto.png>" : "<img class=foto src=../php-img/fotoPerfilUsuario/" . $_SESSION["usuario"]["foto"] . ">");  ?></a>
                <?php
                    }
                    else{
                      if($_SESSION["usuario"]["id_perfil"] == "2"){
                ?>
                      <a href="perfilPc.php" class="btn btn-outline-light ml-4"><?php echo ($_SESSION["usuario"]["foto"] == NULL ? "<img class=foto src=../img/perfilSemFoto.png>" : "<img class=foto src=../php-img/fotoPerfilPc/" . $_SESSION["usuario"]["foto"] . ">");  ?></a>
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

	<body class="fundo">
		
	<!--<video autoplay muted loop class="video">
		<source src="../img/verde2.mp4" type="video/mp4">
	</video>-->
			<div class="bloco">
				<?php
					if(isset($_SESSION["usuario"])){
						?>
							<form id="suporte" action="../php/email/suporte.php" method="POST">
								<h2 class="titulo">Suporte</h2>
								<label>Título da mensagem:</label>
								<input type="text" name="titulo"><br><br>

								<label>Mensagem:</label>
								<input type="text" name="texto"><br><br>

								<input class="botoes" type="submit" name="submit" value="Enviar">
							</form>

							<br>

							<div class="texto">
							<p>Observação: não constará no seu e-mail que a mensagem foi enviada, mas fique em paz que ela chegará normalmente na equipe da Âmago e ela lhe retornará um e-mail avisando</p>
						<?php
					}
					else{
						echo "Para entrar em contato com a equipe da Âmago, por favor, faça login";
					}
				?>
							</div>
				</div>	

	</body>
</html>