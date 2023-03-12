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

    <!-- Google Maps API -->
    <!-- Chave da API <script src="https://maps.googleapis.com/maps/api/js?key="></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typescript/4.9.3/typescript.min.js"></script>
    <script type="text/javascript" src="../jsGSS/geocodificacao.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Estilo customizado -->
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <title>Cadastro</title>
    <style>
        #botaoCad{
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
        /*.botao_cad_log{
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

         .endereco{
            width: 400px;
         }*/
    </style>
</head>

<body class="body_cad" onload="initialize()">
    <div id="map" style="width: 320px; height: 480px; display: none;"></div>

    <section id="cadPc" style=" height: 1150px; margin-top: 1%; margin-bottom: 1%" class="align-self-center">
        <form action="../php/cadLog/cadastroPc.php" method="POST">
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

            <div class="forms">
                <span>Área de atuação</span>
                    <select name="atuacao">
                        <option value="saude">Saúde</option>
                        <option value="parque">Parque</option>
                        <option value="ecoponto">Ecoponto</option>
                        <!-- Juh, vai ter mais opções aqui, mas eu não sei o que colocar... -->
                    </select>
            </div>

            <div class="forms">
                <span>Tipos de lixo suportados pelo ponto de coleta</span><br>
                    <input type="checkbox" name="0" value="0"> Orgânico<br>
                    <input type="checkbox" name="1" value="1"> Doméstico<br>
                    <input type="checkbox" name="2" value="2"> Comercial<br>
                    <input type="checkbox" name="3" value="3"> Público<br>
                    <input type="checkbox" name="4" value="4"> Industrial<br>
                    <input type="checkbox" name="5" value="5"> Hospitalar<br>
                    <input type="checkbox" name="6" value="6"> Verde<br>
                    <input type="checkbox" name="7" value="7"> Eletrônico<br>
                    <input type="checkbox" name="8" value="8"> Radioativo<br>
            </div>

            <div class="forms">
                <span>Rua</span>
                    <input type="text" name="rua" id="rua" class="enviar">
            </div>

            <div class="forms">
                <span>Número</span>
                    <input type="text" name="numero" id="numero" class="enviar">
            </div>

            <div class="forms">
                <span>Bairro</span>
                    <input type="text" name="bairro" id="bairro" class="enviar">
            </div>

            <div class="forms">
                <span>Cidade</span>
                    <select name="cidade" id="cidade">
                        <option value="">                       Selecione alguma cidade</option>
                        <option value="Arujá">                  Arujá                  </option>
                        <option value="Barueri">                Barueri                </option>
                        <option value="Biritiba-Mirim">         Biritiba-Mirim         </option>
                        <option value="Caieiras">               Caieiras               </option>
                        <option value="Cajamar">                Cajamar                </option>
                        <option value="Carapicuíba">            Carapicuíba            </option>
                        <option value="Cotia">                  Cotia                  </option>
                        <option value="Diadema">                Diadema                </option>
                        <option value="Embu">                   Embu                   </option>
                        <option value="Embu-Guaçu">             Embu-Guaçu             </option>
                        <option value="Ferraz de Vasconcelos">  Ferraz de Vasconcelos  </option>
                        <option value="Francisco Morato">       Francisco Morato       </option>
                        <option value="Franco da Rocha">        Franco da Rocha        </option>
                        <option value="Guararema">              Guararema              </option>
                        <option value="Guarulhos">              Guarulhos              </option>
                        <option value="Itapevi">                Itapevi                </option>
                        <option value="Itapecerica da Serra">   Itapecerica da Serra   </option>
                        <option value="Itaquaquecetuba">        Itaquaquecetuba        </option>
                        <option value="Jandira">                Jandira                </option>
                        <option value="Juquitiba">              Juquitiba              </option>
                        <option value="Mairiporã">              Mairiporã              </option>
                        <option value="Mauá">                   Mauá                   </option>
                        <option value="Mogi das Cruzes">        Mogi das Cruzes        </option>
                        <option value="Osasco">                 Osasco                 </option>
                        <option value="Pirapora do Bom Jesus">  Pirapora do Bom Jesus  </option>
                        <option value="Poá">                    Poá                    </option>
                        <option value="Ribeirão Pires">         Ribeirão Pires         </option>
                        <option value="Rio Grande da Serra">    Rio Grande da Serra    </option>
                        <option value="Salesópolis">            Salesópolis            </option>
                        <option value="Santa Isabel">           Santa Isabel           </option>
                        <option value="Santana de Parnaíba">    Santana de Parnaíba    </option>
                        <option value="Santo André">            Santo André            </option>
                        <option value="São Bernardo do Campo">  São Bernardo do Campo  </option>
                        <option value="São Caetano do Sul">     São Caetano do Sul     </option>
                        <option value="São Lourenço da Serra">  São Lourenço da Serra  </option>
                        <option value="São Paulo">              São Paulo              </option>
                        <option value="Suzano">                 Suzano                 </option>
                        <option value="Taboão da Serra">        Taboão da Serra        </option>
                        <option value="Vargem Grande Paulista"> Vargem Grande Paulista </option>
                    </select>
            </div>

            <div>
                <input type="hidden" id="address" name="address" value="">
                <input type="hidden" id="boleano" name="boleano" value="">

                <input type="hidden" id="latitude" name="latitude" value="">
                <input type="hidden" id="longitude" name="longitude" value="">

                <!-- Juh, depois tira esses BR que coloquei para facilitar a visualização e dá algum jeitinho no CSS -->
                <br>    
                <input type="button" value="Confirmar localização" onclick="confirmarLocalizacao()">
            </div>

            <br>

            <div>
                <span>Seus dados de endereço</span><br>
                    <!-- Juh, coloquei essa classe que aumenta o tamanho disso só para facilitar minha visualização. Depois, tu arruma isso e deixa do tamanho que tu quiser -->
                    <input class="endereco" type="text" id="addressE" readonly>
            </div>

            <div>
                <input class="botao_cad_log" type="submit" name="submit" class="enviar" value="Cadastrar">
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