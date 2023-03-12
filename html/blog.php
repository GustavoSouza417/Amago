<?php session_start(); ?>

<!DOCTYPE php>
<php lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">

    <title>Matérias</title>

    <style>
        .titulo_blog{
          color: #000;
          text-decoration: none;
        }

        a:hover{
          text-decoration: none;
        }
        
        .foto{
            border-radius: 100%;
            width: 25px;
            height: 25px;
        }

        .descricao{
          margin-bottom:5%;
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
    
      <div id="matérias" class="container">
        <h1 class="materias">Últimas noticias</h1>
        <div class="row">
          <div class="col-lg">
          <a href="../html/materia.php">
              <img src="../img/balde.jpg" class="img_blog" height="60%" width="80%"/>
            <h2 class="titulo_blog">Composteira em casa</h2></a>
            <td class="descricao">A composteira doméstica feita com balde é acessível, prática e fácil de ser feita.</td>
          </div>
          <div class="col-lg">
          <a href="../html/materia.php">
              <img src="../img/folha.jpg" class="img_blog" height="60%" width="80%"/>
            <h2 class="titulo_blog">Título</h2></a>
            <td class="descricao">descrição.</td>
          </div>
          <div class="col-lg">
          <a href="../html/materia.php">
              <img src="../img/folha.jpg" class="img_blog" height="60%" width="80%"/>
            <h2 class="titulo_blog">Título</h2></a>
            <td class="descricao">descrição.</td>
          </div>
        </div>

        <div class="row">
          <div class="col-lg">
          <a href="../html/materia.php">
              <img src="../img/folha.jpg" class="img_blog" height="60%" width="80%"/>
            <h2 class="titulo_blog">Título</h2></a>
            <td class="descricao">descrição.</td>
          </div>
          <div class="col-lg">
          <a href="../html/materia.php">
              <img src="../img/folha.jpg" class="img_blog" height="60%" width="80%"/>
            <h2 class="titulo_blog">Título</h2></a>
            <td class="descricao">descrição.</td>
          </div>
          <div class="col-lg">
          <a href="../html/materia.php">
              <img src="../img/folha.jpg" class="img_blog" height="60%" width="80%"/>
            <h2 class="titulo_blog">Título</h2></a>
            <td class="descricao">descrição.</td>
          </div>

        <div class="row">
          <div class="col-lg">
          <a href="../html/materia.php">
              <img src="../img/folha.jpg" class="img_blog" height="60%" width="80%"/>
            <h2 class="titulo_blog">Título</h2></a>
            <td class="descricao">descrição.</td>
          </div>
          <div class="col-lg">
          <a href="../html/materia.php">
              <img src="../img/folha.jpg" class="img_blog" height="60%" width="80%"/>
            <h2 class="titulo_blog">Título</h2></a>
            <td class="descricao">descrição.</td>
          </div>
          <div class="col-lg">
          <a href="../html/materia.php">
              <img src="../img/folha.jpg" class="img_blog" height="60%" width="80%"/>
            <h2 class="titulo_blog">Título</h2></a>
            <td class="descricao">descrição.</td>
          </div>
        </div>
      </div>

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
  
  
  
      <!-- JavaScript (Opcional) -->
      <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
  </php>