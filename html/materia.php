<?php session_start(); ?>

<!DOCTYPE php>
<php lang="pt-br">
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

    <title>Âmago</title>
    <style>
      p{
        margin-right:2%;
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
                      <a href="perfilUsuario.php" class="btn btn-outline-light ml-4">FotoUs</a>
                <?php
                    }
                    else{
                      if($_SESSION["usuario"]["id_perfil"] == "2"){
                ?>
                      <a href="perfilPc.php" class="btn btn-outline-light ml-4">FotoPc</a>
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

    <section class="caixa"><!--/Início seção saiba -->
      <div class="container">
        <div class="row">
          <div class="col-md-6 d-flex">
            <div class="align-self-center">
              <h2>Como fazer composteira em casa</h2><br>
              <p>
              A composteira doméstica feita com balde é acessível, prática e fácil de ser feita. No vídeo, são utilizados 3 baldes de 15 litros,
              mas essa medida pode ser modificada de acordo com a sua produção de resíduos orgânicos. Ou seja, você pode utilizar mais ou menos baldes em sua composteira conforme sua necessidade.<br><br>
              Primeiro, reúna 3 baldes de gordura vegetal com tampa, serragem, flange e uma torneira. Depois, separe as ferramentas que serão utilizadas: furadeira, serra copo, tesoura, faca de serra, caneta e brocas para madeira;
              Em seguida, corte as tampas dos baldes para que um se encaixe no outro. Marque com uma caneta onde será feito o corte nas tampas de cada balde e, depois, faça um furo com a furadeira para facilitar o corte. 
              Lembre-se de que a tampa do balde que ficará por cima não deve ser cortada;<br><br>
              Após cortar as tampas com a faca de serra ou tesoura, faça furos no fundo de todos os baldes, com exceção do coletor (o que ficará embaixo dos outros baldes). Utilize uma tampa recortada para marcar a área em que os furos devem ser feitos;
              Faça diversos furos com a furadeira na área marcada;
              Faça também pequenos furos nas laterais superiores dos baldes (com exceção do coletor), para melhorar a oxigenação da composteira;
              Pegue o balde coletor e utilize o flange como molde para marcar o furo na lateral inferior da peça, onde será colocada a torneira;
              Faça um furo na área com a furadeira e abra-o com a serra copo;
              Encaixe o flange no furo e, depois, instale a torneira;
              Empilhe os baldes, lembrando-se de deixar o coletor por baixo e, por cima, o balde com a tampa completa;
              Depois, é só colocar o resíduo orgânico no balde de cima e cobrir com uma pequena camada de serragem;
              Quando esse primeiro balde ficar cheio, troque-o de posição e de tampa com o balde vazio do meio.<br><br>
              Fonte: Tuacasa
              </p>
            </div>
          </div>
          <div class="col-md-6 d-flex">
            <div class="align-self-center">
            <img src="../img/composteira.jpg" width="80%">
          </div>
        </div>
      </div>
    </section><!--/FIM seção saiba -->


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