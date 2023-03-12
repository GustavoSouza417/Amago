<?php 
	session_start(); 
	
	$idPc = $_GET["idPc"];
	$latitudeUsuario = $_GET["latitudeUsuario"];
	$longitudeUsuario = $_GET["longitudeUsuario"];
	$longitudePc = $_GET["longitudePc"];
	$latitudePc = $_GET["latitudePc"];
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Meta tags Obrigatórias -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Maps API -->
    <!-- Chave da API <script src="https://maps.googleapis.com/maps/api/js?key="></script> -->
    <script type="text/javascript" src="../jsGSS/geocodificacaoIndex.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<title></title>

		<script type="text/javascript" src="../jsGSS/saibaMais.js"></script>


		<style>
			.estrela{
				width: 25px;
				cursor: pointer;
			}
			#tudo{
				margin-left: 20%;
				margin-right: 20%;
				padding: 5%;
			}

			#caixaComentarios{
			margin-bottom: 3%;
			}

			.botoes{
					margin-top: 1%;
					width: 180px;
					height: 40px;
					border: none;
					cursor: pointer;     
			}
			.foto{
				width: 250px;
				height: 250px;
				margin-bottom: 1%;
			}

			.foto2{
				border-radius: 100%;
				width: 100px;
				height: 100px;
				margin-bottom: 80px;
			}
			.foto3{
				
				border-radius: 100%;
            width: 25px;
            height: 25px;
			}

			.foto2:hover{
			transform:none;
			}

			.foto:hover{
			transform:none;
			}

			.data_hora{
				padding-left:5px;
				padding-right:5px;
				color: grey;
			}

			.nome{
				font-weight: bold;
				padding-left:5px;
				padding-right:5px;
			}
			
			.like{
				color: grey;  
				background: white;
				border-color: grey;
			}

			.like:hover{
				background: #e7e7e8;
			}

			.resp{
				color: grey;
						font-style: italic; 
				padding-bottom:25px;
			}

			.foto_perfil{
            border-radius: 100%;
            width: 25px;
            height: 25px;
        }

		.infos{
			font-size: 18px;
		}

		#quadrado{
		}

		.iniciar{
			margin-top:2%;
		}

		.titulo{
			text-align:center;
		}
		</style>
	</head>
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
                      <a href="perfilUsuario.php" class="btn btn-outline-light ml-4"><?php echo ($_SESSION["usuario"]["foto"] == NULL ? "<img class=foto3 src=../img/perfilSemFoto.png>" : "<img class=foto3 src=../php-img/fotoPerfilUsuario/" . $_SESSION["usuario"]["foto"] . ">");  ?></a>
                <?php
                    }
                    else{
                      if($_SESSION["usuario"]["id_perfil"] == "2"){
                ?>
                      <a href="perfilPc.php" class="btn btn-outline-light ml-4"><?php echo ($_SESSION["usuario"]["foto"] == NULL ? "<img class=foto3 src=../img/perfilSemFoto.png>" : "<img class=foto3 src=../php-img/fotoPerfilPc/" . $_SESSION["usuario"]["foto"] . ">");  ?></a>
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
<div id=tudo>	
	<h2 class="titulo">Informações gerais</h2>
	<div id="quadrado">
	<?php
		include_once("../sql/conexao.inc");
		include_once("../php/saibaMais/obterDadosAvaliacoes.php");
	?>

	<body onload="semClicar(<?php echo $notaEstrelas; ?>)"> 
	<div class=infos>
		<?php
			echo "Nome do Ponto de coleta: " . $pontoDeColeta["nome"] . "<br>";
			echo "Atuação: " . $pontoDeColeta["atuacao"] . "<br><br>";

			echo "E-mail: " . $pontoDeColeta["email"] . "<br>";
			echo "" . ($pontoDeColeta["foto"] == NULL ? "<img class=foto src=../img/perfilSemFoto.png>" : "<img class=foto src=../php-img/fotoPerfilUsuario/" . $pontoDeColeta["foto"] . ">");

			echo "<br><br><br>";

			echo "Rua: " . $pontoDeColeta["rua"] . "<br>";
			echo "Número: " . $pontoDeColeta["numero"] . "<br>";
			echo "Bairro: " . $pontoDeColeta["bairro"] . "<br>";
			echo "Cidade: " . $pontoDeColeta["cidade"] . "<br>";

			echo "<br><br><br>";

			echo "Avaliação média: " . $mediaAvaliacao . "<br>";
			echo "Total de avaliadores: " . $quantidadeAvaliacoes . "<br>";
		?>

		<h3 class="iniciar">Iniciar jornada</h3>
		<?php echo "<a href=https://www.google.com/maps/dir/?api=1&origin=" . $latitudeUsuario . "," . $longitudeUsuario . "&destination=" . $latitudePc . "," . $longitudePc . " target=_blank>Ir às rotas</a>"; ?>	

		<?php
			if(isset($_SESSION["usuario"]) AND $_SESSION["usuario"]["id_perfil"] == 1){
		?>

		</div>	
			</div>
				<form action="../php/saibaMais/avaliacoes.php" method="POST">
					<img class="estrela" src="../z-anexos/psd-img/estrelaNaoPintada.svg" id="img1" onclick="contarEstrelas(1)">
					<img class="estrela" src="../z-anexos/psd-img/estrelaNaoPintada.svg" id="img2" onclick="contarEstrelas(2)">
					<img class="estrela" src="../z-anexos/psd-img/estrelaNaoPintada.svg" id="img3" onclick="contarEstrelas(3)">
					<img class="estrela" src="../z-anexos/psd-img/estrelaNaoPintada.svg" id="img4" onclick="contarEstrelas(4)">
					<img class="estrela" src="../z-anexos/psd-img/estrelaNaoPintada.svg" id="img5" onclick="contarEstrelas(5)">

					<input type="hidden" name="avaliacao" id="avaliacao" value="">

					<input type="hidden" name="idPc"             value="<?php echo $idPc ?>">
					<input type="hidden" name="latitudeUsuario"  value="<?php echo $latitudeUsuario ?>">
					<input type="hidden" name="longitudeUsuario" value="<?php echo $longitudeUsuario ?>">
					<input type="hidden" name="longitudePc"      value="<?php echo $longitudePc ?>">
					<input type="hidden" name="latitudePc"       value="<?php echo $latitudePc ?>">

					<input class=botoes type="submit" name="submit" value="Enviar avaliação">
				</form>
		<?php
			}
			else{
				if(isset($_SESSION["usuario"]) AND $_SESSION["usuario"]["id_perfil"] == 2){
		?>
				<p>Contas de pontos de coleta não podem fazer avaliações</p>
		<?php
				}
				else{
					echo "<p>Para fazer suas avaliações, faça login numa conta de usuário comum</p>";
				}
			}
		?>
				
		<div>
			<div>
				<?php
					include_once("../php/saibaMais/exibirComentarios.php");

					echo "<br><br>";
					echo count($comentario) . " comentários <hr>";

					for($row = 0; $row < count($comentario); $row++){
						echo "
							<table>
								<tr>
									<td class=foto rowspan=5>"; 

									if(isset($comentario[$row][9]) != null){
										echo "<img class=foto2 src=../php-img/fotoPerfilUsuario/" . $comentario[$row][9] . ">";
									}
									else{
										echo "<img class=foto2 src=../img/perfilSemFoto.png>";
									}

						echo "
									</td>

									<td class=nome>
										" . $comentario[$row][8] . "
									</td>

									<td class=data_hora>
										" . $comentario[$row][3] . "
									</td>

									<td class=data_hora>
										" . $comentario[$row][4] . "
									</td>
								</tr>

								<tr>
									<td colspan=3>
										" . $comentario[$row][1] . "
									</td>
								</tr>

								<tr>
									<td colspan=3>
										<form class=form action=../php/saibaMais/gerenciarCurtidas.php method=POST>
											<input type=hidden name=idPc             value=" . $idPc             . ">
											<input type=hidden name=latitudeUsuario  value=" . $latitudeUsuario  . ">
											<input type=hidden name=longitudeUsuario value=" . $longitudeUsuario . ">
											<input type=hidden name=longitudePc      value=" . $longitudePc      . ">
											<input type=hidden name=latitudePc       value=" . $latitudePc       . ">

											<input type=submit name=curtir value=Curtir> " . $comentario[$row][2] . " 
											<input type=hidden name=idComentario value=" . $comentario[$row][0] . ">
										</form>
									</td>
								<tr>

								<tr>
									<td class=resp colspan=3>
										Número de respostas
									</td>
								<tr>
							</table>
						";
					}
				?>
			</div>

			<br><br><br>

			<?php
				if(isset($_SESSION["usuario"]) AND $_SESSION["usuario"]["id_perfil"] == 1){
			?>
					<div>
					<form action="../php/saibaMais/enviarComentarios.php" method="POST">
						<input type="hidden" name="data" id="data" value="">
						<input type="hidden" name="hora" id="hora" value="">

						<input type="hidden" name="idPc"             value="<?php echo $idPc ?>">
						<input type="hidden" name="latitudeUsuario"  value="<?php echo $latitudeUsuario ?>">
						<input type="hidden" name="longitudeUsuario" value="<?php echo $longitudeUsuario ?>">
						<input type="hidden" name="longitudePc"      value="<?php echo $longitudePc ?>">
						<input type="hidden" name="latitudePc"       value="<?php echo $latitudePc ?>">

						<input type="text" name="inputComentario" placeholder="Digite algum comentário">
						<input class=botoes type="submit" name="submitComentario" value="Enviar comentário">
					</form>
				</div>

			<?php
				}
				else{
					if(isset($_SESSION["usuario"]) AND $_SESSION["usuario"]["id_perfil"] == 2){
			?>
					<p>Contas de pontos de coleta não podem comentar e nem curtir</p>
			<?php
					}
					else{
			?>

				<div>
					<p>Para comentar e curtir, faça login numa conta de usuário comum</p>
				</div>
				
			<?php
					}
				}
			?>
				

			<script type="text/javascript" src="../jsGSS/dataHoraComentarios.js"></script>
		</div>
	</div>
		<!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</php>