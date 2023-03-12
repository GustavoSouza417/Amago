<?php
  session_start();

  include_once("../sql/conexao.inc");
  include_once("../php/mapa/gerarJson.php");
?>

<html>
  <head>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="../jsGSS/mapa.js"></script>
    
    <style>
      html{
        height: 100%;
      }

      #mapa{
        margin-top: 10%; 
        margin-left: 5%; 
        margin-bottom:5%;
        margin-right: 5%; 
        padding: 0;
      }
      #map_canvas{
      box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        margin-top: 1%; 
        margin-left: 5%; 
        width:90%;
        
        margin-bottom:3%;
        height: 80%;
      }

      .foto{
            border-radius: 100%;
            width: 25px;
            height: 25px;
        }

        .titulo{
          margin-top: 3%; 
          text-align:center;
        }
    </style>
  </head>
  <body onload="initialize()">

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
    <h2 class="titulo">Localização</h2>
    <div id="map_canvas"></div>  

    <footer class="mt-4 mb-4">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <p>
              <a href="../img/politicaPrivacidade.pdf" target="_blank">Política de Privacidade</a>
              <a href="suporte.php">Suporte</a>
            </p>
          </div>
          <div class="col-md-4 d-flex justify-content-end">
            <a href="" target="_blank" class="btn btn-outline-dark">
              <i class="fab fa-facebook"></i>
            </a>
            <a href="" target="_blank" class="btn btn-outline-dark ml-2">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="https://www.instagram.com/ecoamago/" target="_blank" class="btn btn-outline-dark ml-2">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>