<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>

		<style type="text/css">
        #tudo{
          margin-left: 5%;
          margin-right: 5%;
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
        		border-radius: 100%;
				width: 50px;
				height: 50px;
     	 }

      img:hover{
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
        padding-bottom:5%;
      }
		</style>
	</head>

	<!--coments-->
    <div id="tudo">
      
			<div id="caixaComentarios">
				<form action="../php/saibaMais/enviarComentarios.php" method="POST">
					<input type="hidden" name="data" id="data" value="">
					<input type="hidden" name="hora" id="hora" value="">

					<input type="text" name="inputComentario" placeholder="Digite algum comentário">
					<input class="botoes" type="submit" name="submitComentario" value="Enviar comentário">
				</form>
			</div>


			<div>
				<?php
					include_once("../php/saibaMais/exibirComentarios.php");

					echo count($comentario) . " comentários <hr>";

					for($row = 0; $row < count($comentario); $row++){
						echo "
							<table border=1px>
								<tr>
									<td rowspan=5>
										<img class=foto src=../php-img/fotoPerfilUsuario/" . $comentario[$row][8] . ">
									</td>

									<td class=nome>
										" . $comentario[$row][7] . "
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
									<td lass=like colspan=3>
										<form action=../php/saibaMais/gerenciarCurtidas.php method=POST>
											<input type=submit name=curtir value=Curtir>
											<input type=hidden name=idComentario value=" . $comentario[$row][0] . ">
										</form> "

										. $comentario[$row][2] . "
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

					mysqli_close($conexao);
				?>
			</div>

			<br><br><br>
		</div>

		<!-- 
			0 = id do comentário

			1 = texto do comentário

			2 = curtidas

			3 = data

			4 = hora

			5 = fk do usuário

			6 = id do usuário

			7 = nome do usuário

			8 = foto do usuário
		-->

		<script type="text/javascript" src="../jsGSS/dataHoraComentarios.js"></script>
	</body>
</html>