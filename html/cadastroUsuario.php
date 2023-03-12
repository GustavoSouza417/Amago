<?php 
    session_start();

    if(isset($_SESSION["usuario"])){
        header("location: index.php");
    } 
?>

<!DOCTYPE html>
<html lang="pt-br">
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
    <title>Cadastro</title>
    <style>
    </style>
</head>
<body class="body_cad">
    <section id="cad" class="align-self-center">
        <form action="../php/cadLog/cadastroUsuario.php" method="POST">
            <div class="cad_titulo">
                <h2>Cadastre-se</h2>
            </div>

            <div class="forms">
                <span>Nome</span>
                    <input type="text" name="nome" autofocus="true" class="enviar">
            </div>
            
            <div class="forms">
                <span>Email</span>
                    <input type="email" name="email" class="enviar">
            </div>
            
            <div class="forms">
                <span>Senha</span>
                    <input type="password" name="senha" class="enviar">
            </div>

            <div class="forms">
                <span>Confirme a senha</span>
                    <input type="password" name="confirmarSenha" class="enviar">
            </div>

            <div>
                <input id="botaoCad" type="submit" name="submit" class="enviar" value="Cadastrar">
            </div>
        </form>
    </section>

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>