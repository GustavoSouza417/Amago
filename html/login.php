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
        <title>Login</title>
        <style>
            #log{
            width: 400px;
            height: 450px;
            background-color: #ffffff;
            margin: 10% auto 0 auto;
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            }

        .log_titulo{
            margin-left: 37%;
            padding-top: 10%;
            margin-bottom: 0;
        }

        #criar_conta{
            margin-left: 40%;
        }

         .botao_cad_log{
            margin-top: none;
            margin-left: 13px;
            width: 93%;
            height: 45px;
            margin-top: 5%;
            border:  2px solid black;
            border-radius: 20px;
            background-color: rgb(175, 174, 174);
            border: none;
            cursor: pointer;    
         } 
    </style>
    </head>
    <body class="body_cad">
        <section id="log">
            <form action="../php/cadLog/login.php" method="POST">
                <div class="log_titulo">
                    <h2>Entrar</h2>
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
                    <span>Tipo de conta</span>
                        <br><input class="radio" type="radio" name="perfil" value="usuario"> Usuario comum
                        <br><input class="radio" type="radio" name="perfil" value="pc"> Ponto de coleta
                </div>

                <div>
                    <input class="botao_cad_log" type="submit" name="submit" value="Entrar">
                </div>
            </form>

            <a href="perfil.php" id="criar_conta">Criar conta</a>
        </section>

        <!-- JavaScript (Opcional) -->
        <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>