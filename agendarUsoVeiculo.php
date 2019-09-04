<?php
    include 'calendario.php';
    include 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/agendar-aulas.css">
    <script src="https://kit.fontawesome.com/5cd09c3eca.js"></script>
    <!-- <link rel="stylesheet" href="./fontawesome-free-5.9.0-web/css/all.css"> -->
    <!-- <link rel="stylesheet" href="./fontawesome-free-5.9.0-desktop/svgs/solid/paperclip.svg"> -->
    <title>Agendar Uso de Veículos</title>
</head>
<body onload="resetaFormulario();">
    <div class="wrapper">
        <div class="banner">

            <div class="left"></div>

            <div class="right"></div>

            <div class="center">
                <div class="img-header"></div>
                <div class="titulo">
                    <h3> LEMA - LABORATÓRIO DE ENGENHARIA DE MEIO AMBIENTE </h3>
                </div>
            </div>

        </div>
        
        <div class="main">

            <button class="voltar"><a href="./index.html"><i class="fas fa-arrow-left"></i></a></button>

            <h3>AGENDAR USO DE VEÍCULOS</h3>

            <div class="vertical-right"></div>
            
            <div class="vertical-left"></div>

            <form action="index.php" method="post" id="formulario">
                <div class="reponsavel">
                    <fieldset>
                        <legend>Dados do Orientador/Responsável</legend>
                        <div class="left-outer">
                            <div class="left-inner">
                                <label class="ident" for="prof">Orientador/Responsável</label>
                                <input type="text" name="prof" id="prof" placeholder="Ex.: Maria A. Pereira" pattern="[a-zA-Z.\s]+" title="Apenas letras, espaços ou .">
                            </div>
                        </div>
                        <div class="right-outer">
                            <div class="right-inner">
                                <label class="ident" for="emailProf">E-mail do Orientador</label>
                                <input type="email" name="emailProf" id="emailProf" placeholder="Ex.: Contato@email.com">
                            </div>
                        </div>
                    </fieldset>
                </div>

                <!-- <div class="right-outer">
                    <div class="right-inner">
                        <label class="ident" for="cnhSolic">CNH do Solicitante</label>
                        <input type="text" name="cnhSolic" id="cnhSolic" placeholder="Número da CNH" pattern="[0-9]+" title="Apenas Números">
                    </div>

                    <div class="right-inner">
                        <label class="ident" for="cnhcat">Categoria</label>
                        <input type="text" name="cnhCat" id="cnhCat" placeholder="Categoria da CNH">
                    </div>

                    <div class="right-inner">
                        <label class="ident" for="cnhValidade">Validade</label>
                        <input type="text" name="cnhValidade" id="cnhValidade" placeholder="Validade da CNH">
                    </div>

                </div> -->

                <div class ="solicitante" style="clear:left;">
                    <fieldset>
                        <legend>Dados do Solicitante</legend>
                        <div class="left-outer">
                            <div class="left-inner">
                                <label class="ident" for="nomeSolicitante">Nome</label>
                                <input type="text" name="nomeSolicitante" id="nomeSolicitante" placeholder="Ex.: Maria A. Pereira" pattern="[a-zA-Z.\s]+" title="Apenas letras, espaços ou .">
                            </div>

                            <div class="left-inner">
                                <label class="ident" for="emailSolicitante">Email</label>
                                <input type="email" name="emailSolicitante" id="emailSolicitante" placeholder="Ex.: Contato@email.com">
                            </div>
                        </div>

                        <div class="right-outer">
                            <div class="right-inner">
                                <label class="ident" for="cnhSolic">CNH do Solicitante</label>
                                <input type="text" name="cnhSolic" id="cnhSolic" placeholder="Número da CNH" pattern="[0-9]+" title="Apenas Números">
                            </div>

                            <div class="right-inner">
                                <label class="ident" for="cnhcat">Categoria</label>
                                <input type="text" name="cnhCat" id="cnhCat" pattern="[a-eA-E]" placeholder="Categoria da CNH">
                            </div>

                            <div class="right-inner">
                                <label class="ident" for="cnhValidade">Validade</label>
                                <input type="date" name="cnhValidade" id="cnhValidade" placeholder="Validade da CNH">
                            </div>
                        </div>     
                    </fieldset>
                </div>

                <!-- <div class="veiculo">
                    <fieldset>
                        <legend>Informações da Rota</legend>
                        <div class="left-outer">
                            <div class="left-inner">
                                <label class="ident" for="itinerario">Itinerário</label>
                                <input type="text" name="itinerario" id="itinerario" placeholder="Informe seu destino" checked>
                            </div>
                        </div>
                        <div class="right-outer">
                            <div class="right-inner">
                                <label class="ident" for="descricao">Descrição</label>
                                <input type="text" name="descricao" id="descricao" checked>
                            </div>
                        </div>
                    </fieldset>
                </div> -->

                <div class="veiculo">
                    <fieldset>
                        <legend>Veículo</legend>
                        <div class="left-outer">
                            <div class="left-inner">
                                <label class="ident" for="veiculo">Veículo</label>
                                <select name="veiculo" id="veiculo">
                                    <option value="">-- Selecione um veículo --</option>
                                    <option value="">Carro</option>
                                    <option value="">Caminhão</option>
                                </select>
                            </div>
                        </div>
                        <div class="right-outer">
                            <div class="right-inner">
                                <label class="ident" for="placa">Placa</label>
                                <input type="text" name="placa" id="placa">
                            </div>
                        </div>
                    </fieldset>
                </div>

                <div class="right-outer hora" style="margin-top:40px">
                    <div class="right-inner">
                        <label class="ident" for="horainicio">Horário de Início</label>
                        <select name="horainicio" id="horainicio">
                            <option value="7:30">7:30</option>
                            <option value="8:00">8:00</option>
                            <option value="8:30">8:30</option>
                            <option value="9:00">9:00</option>
                            <option value="9:30">9:30</option>
                            <option value="10:00">10:00</option>
                            <option value="10:30">10:30</option>
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                            <option value="12:00">12:00</option>
                            <option value="12:30">12:30</option>
                            <option value="13:00">13:00</option>
                            <option value="13:30">13:30</option>
                            <option value="14:00">14:00</option>
                            <option value="14:30">14:30</option>
                            <option value="15:00">15:00</option>
                            <option value="15:30">15:30</option>
                            <option value="16:00">16:00</option>
                            <option value="16:30">16:30</option>
                            <option value="17:00">17:00</option>
                            <option value="17:30">17:30</option>
                            <option value="18:00">18:00</option>
                            <option value="18:30">18:30</option>
                            <!-- <option value="19:00">19:00</option>
                            <option value="19:30">19:30</option>
                            <option value="20:00">20:00</option>
                            <option value="20:30">20:30</option>
                            <option value="21:00">21:00</option>
                            <option value="21:30">21:30</option>
                            <option value="22:00">22:00</option> -->
                        </select>
                    </div>

                    <div class="right-inner">
                        <label class="ident" for="horafinal">Horário Final</label>
                        <select name="horafinal" id="horafinal">
                            <option value="8:00">8:00</option>
                            <option value="8:30">8:30</option>
                            <option value="9:00">9:00</option>
                            <option value="9:30">9:30</option>
                            <option value="10:00">10:00</option>
                            <option value="10:30">10:30</option>
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                            <option value="12:00">12:00</option>
                            <option value="12:30">12:30</option>
                            <option value="13:00">13:00</option>
                            <option value="13:30">13:30</option>
                            <option value="14:00">14:00</option>
                            <option value="14:30">14:30</option>
                            <option value="15:00">15:00</option>
                            <option value="15:30">15:30</option>
                            <option value="16:00">16:00</option>
                            <option value="16:30">16:30</option>
                            <option value="17:00">17:00</option>
                            <option value="17:30">17:30</option>
                            <option value="18:00">18:00</option>
                            <option value="18:30">18:30</option>
                            <!-- <option value="19:00">19:00</option>
                            <option value="19:30">19:30</option>
                            <option value="20:00">20:00</option>
                            <option value="20:30">20:30</option>
                            <option value="21:00">21:00</option>
                            <option value="21:30">21:30</option>
                            <option value="22:00">22:00</option>
                            <option value="22:30">22:30</option> -->
                        </select>
                    </div>
                    
                </div>

                <div class="calendario-outer">
                    <!-- <h4>Data</h4> -->
                    <fieldset>
                        <legend class="ident">Data</legend>                    
                        <div class="calendario">
                            <?php montaCalendario(); ?>
                        </div>
                    </fieldset>
                </div>

                <div class="left-outer">
                    <div class="left-inner">
                        <div class="arquivo">       
                            <div class="div-label-input">
                                <label class="ident" for="itinerario">Itinerário</label>
                            </div>
                            <div class="div-label-arquivo">
                                <input type="file" name="arquivomaterial" id="arquivomaterial"><label for="arquivomaterial"><i class="fas fa-paperclip">Anexar Arquivo</i></label>
                            </div>
                        </div>
                        <textarea name="itinerario" id="itinerario" cols="30" rows="10" placeholder="Digite aqui o resumo da aula ou anexe um arquivo."></textarea>
                    </div>
                </div>

                <div class="right-outer">
                    <div class="right-inner">
                        <div class="arquivo">       
                            <div class="div-label-input">
                                <label class="ident" for="descAtividade">Descrição da Atividade</label>
                            </div>             
                            <div class="div-label-arquivo">
                                <input type="file" name="arquivomaterial" id="arquivomaterial"><label for="arquivomaterial"><i class="fas fa-paperclip">Anexar Arquivo</i></label>
                            </div>
                        </div>
                        <textarea name="descAtividade" id="descAtividade" cols="30" rows="10" placeholder="Digite aqui quais equipamentos ou as vidrarias serão usados na aula ou anexe um arquivo."></textarea>
                    </div>
                </div>

                <fieldset>
                    <legend>TERMO DE RESPONSABILIDADE</legend>
                    <ul class="termo-resp">
                        <li>Este termo de responsabilidade demonstra o compromisso do usuário na utilização dos
                        veículos do Laboratório de Engenharia do Meio Ambiente (LEMA). 
                        O usuário que assina esse termo de responsabilidade se compromete a:</li>
                        
                        <li>− Ter Carteira Nacional de Habilitação na categoria exigida pelos órgãos fiscalizadores de
                        transito para o tipo de automóvel em questão, e saber manusear o veículo em questão;</li>
                        <li>− Fazer uma condução responsável e segura, respeitando todas as regras gerais de
                        trânsito e limites de velocidade;</li>
                        <li>− Responsabilizar-se por todas as multas incorridas por infrações de trânsito cometidas;</li>
                        <li>− Utilizar o veículo apenas para os fins descritos no presente documento;</li>
                        <li>− Retirar e devolver o veículo no prazo preestabelecido pelo presente documento;</li>
                        <li>− Zelar pelas boas condições do veículo;</li>
                        <li>− Abastecer o veículo com a quantidade (estimada) de combustível consumida;</li>
                        <li>− Devolver o veículo nas mesmas condições e estado de conservação do ato de retirada,
                        responsabilizando-se por todos os danos provocados no automóvel por utilização indevida.</li>
                    </ul>

                    <div class="aceito">
                        <input onclick="habilitaAgendar();" type="checkbox" name="aceito" id="aceito">
                        <label onclick="habilitaAgendar();" for="aceito">Li e Aceito o Termo de Responsabilidade</label>
                    </div>
                </fieldset>

                <div class="acao">
                    <input id="enviar" name="enviarAula" type="submit" value="Agendar" disabled>
                    <input id="cancelar" type="button" onclick="javascript: history.go(-1);" value="Cancelar">
                </div>
            </form>

        </div>
    </div>
    <script type="text/javascript" src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="./js/js.js"></script>
    <script>
        function resetaFormulario(){
            document.getElementById('formulario').reset();
        }

        function habilitaAgendar(){
            if(document.getElementById('aceito').checked){
                document.getElementById('enviar').disabled = false;
            } else {
                document.getElementById('enviar').disabled = true;
            }
        }

        /* CONFIGURAÇÃO DO CALENDÁRIO */
        //Esta seção configura no calendário quais dias serão mostrados para marcar uma aula referente ao setor e horário selecionados
        var data = new Date();
        var mesAtual = data.getMonth()+1;
        var ano = data.getFullYear();
        var setorid = ["", "", "", "", "", "", "", "", "", "", "", ""];

        function checaMesAtual(){
            if(mesAtual > data.getMonth()+5 || mesAtual > 12){
                mesAtual = data.getMonth()+1;
            } else if (mesAtual <  data.getMonth()+1){
                mesAtual = data.getMonth()+5;
            }
        }

        $('#prox').on('click', function(event){
            event.preventDefault();
            mesAtual++;
            checaMesAtual();
            var id = "";
            var sec = document.getElementsByName("setor");
            for(let i = 0; i < sec.length; i++){
                if(sec[i].checked){
                    id = sec[i].id;
                    break;
                }
            }
            $.ajax({
                type: "POST",
                url: "index.php",
                data: {Setor : $("#"+id).val(), horainicio : $("#horainicio").val(), horafinal : $("#horafinal").val()},
                success: function(resultado){
                    var data = JSON.parse(resultado);
                    var datacerta = [];
                    var dataaux = new Date(ano, mesAtual, 0);
                    var diasMesAtual = dataaux.getDate();
                    var objetos = [];
                    objetos[0]="";
                    for(let i = 0; i < data.length; i++){
                        var aux = data[i].dataaula.split('-');
                        if(aux[1] < 10){
                            aux[1] = aux[1].replace("0", "");
                        }   
                        if(aux[2] < 10){
                            aux[2] = aux[2].replace("0", "");
                        }
                        datacerta[i] = aux[2]+"-"+aux[1];
                    }
                    if(id != setorid[mesAtual]){
                        for(let i = 1; i <= diasMesAtual; i++){
                            objetos[i] = document.getElementById(i+"-"+mesAtual);
                            objetos[i].disabled = false;
                            objetos[i].checked = false;
                            objetos[i].parentNode.style.backgroundColor = "#ededed";
                            setorid[mesAtual] = id;
                        }  
                    }
                    for(let i = 1; i < objetos.length; i++){
                        for(let j = 0; j < datacerta.length; j++){
                            if(objetos[i].id == datacerta[j]){
                                objetos[i].disabled = true;
                                objetos[i].checked = false;
                                objetos[i].parentNode.style.backgroundColor = "#dd7171";
                            } 
                        }
                    }  
                },
                error: function(erro){
                    console.log('Erro');
                }
            })
        });

        //Retorna um mês
        $('#ant').on('click', function(event){
            event.preventDefault();
            mesAtual--;
            checaMesAtual();
            var id = "";
            var sec = document.getElementsByName("setor");
            for(let i = 0; i < sec.length; i++){
                if(sec[i].checked){
                    id = sec[i].id;
                    break;
                }
            }
            // console.log();
            $.ajax({
                type: "POST",
                url: "index.php",
                data: {Setor : $("#"+id).val(), horainicio : $("#horainicio").val(), horafinal : $("#horafinal").val()},
                success: function(resultado){
                    var data = JSON.parse(resultado);
                    var datacerta = [];
                    var dataaux = new Date(ano, mesAtual, 0);
                    var diasMesAtual = dataaux.getDate();
                    var objetos = [];
                    objetos[0]="";
                    for(let i = 0; i < data.length; i++){
                        var aux = data[i].dataaula.split('-');
                        if(aux[1] < 10){
                            aux[1] = aux[1].replace("0", "");
                        }   
                        if(aux[2] < 10){
                            aux[2] = aux[2].replace("0", "");
                        }
                        datacerta[i] = aux[2]+"-"+aux[1];
                    }
                    if(id != setorid[mesAtual]){
                        for(let i = 1; i <= diasMesAtual; i++){
                            objetos[i] = document.getElementById(i+"-"+mesAtual);
                            objetos[i].disabled = false;
                            objetos[i].checked = false;
                            objetos[i].parentNode.style.backgroundColor = "#ededed";
                            setorid[mesAtual] = id;
                        } 
                    }
                    // console.log(setorid[mesAtual]);
                    for(let i = 1; i < objetos.length; i++){
                        for(let j = 0; j < datacerta.length; j++){
                            if(objetos[i].id == datacerta[j]){
                                objetos[i].disabled = true;
                                objetos[i].checked = false;
                                objetos[i].parentNode.style.backgroundColor = "#dd7171";
                            } 
                        }
                    }  
                },
                error: function(erro){
                    console.log('Erro');
                }
            })
        });

        $("#horainicio").click(function(event){
            event.preventDefault();
            var id = "";
            var sec = document.getElementsByName("setor");
            for(let i = 0; i < sec.length; i++){
                if(sec[i].checked){
                    id = sec[i].id;
                    break;
                }
            }
            $.ajax({
                type: "POST",
                url: "index.php",
                data: {Setor : $("#"+id).val(), horainicio : $("#horainicio").val(), horafinal : $("#horafinal").val()},
                success: function(resultado){
                    var data = JSON.parse(resultado);
                    var datacerta = [];
                    var dataaux = new Date(ano, mesAtual, 0);
                    var diasMesAtual = dataaux.getDate();
                    var objetos = [];
                    objetos[0]="";
                    for(let i = 0; i < data.length; i++){
                        var aux = data[i].dataaula.split('-');
                        if(aux[1] < 10){
                            aux[1] = aux[1].replace("0", "");
                        }   
                        if(aux[2] < 10){
                            aux[2] = aux[2].replace("0", "");
                        }
                        datacerta[i] = aux[2]+"-"+aux[1];
                    }
                    for(let i = 1; i <= diasMesAtual; i++){
                        objetos[i] = document.getElementById(i+"-"+mesAtual);
                        objetos[i].disabled = false;
                        objetos[i].checked = false;
                        objetos[i].parentNode.style.backgroundColor = "#ededed";
                    }
                    for(let i = 1; i < objetos.length; i++){
                        for(let j = 0; j < datacerta.length; j++){
                            if(objetos[i].id == datacerta[j]){
                                objetos[i].disabled = true;
                                objetos[i].checked = false;
                                objetos[i].parentNode.style.backgroundColor = "#dd7171";
                            } 
                        }
                    }  
                },
                error: function(erro){
                    console.log('Erro');
                }
            })
        });

        $("#horafinal").click(function(event){
            event.preventDefault();
            var id = "";
            var sec = document.getElementsByName("setor");
            for(let i = 0; i < sec.length; i++){
                if(sec[i].checked){
                    id = sec[i].id;
                    break;
                }
            }
            // console.log(id);
            $.ajax({
                type: "POST",
                url: "index.php",
                data: {Setor : $("#"+id).val(), horainicio : $("#horainicio").val(), horafinal : $("#horafinal").val()},
                success: function(resultado){
                    var data = JSON.parse(resultado);
                    var datacerta = [];
                    var dataaux = new Date(ano, mesAtual, 0);
                    var diasMesAtual = dataaux.getDate();
                    var objetos = [];
                    objetos[0]="";
                    for(let i = 0; i < data.length; i++){
                        var aux = data[i].dataaula.split('-');
                        if(aux[1] < 10){
                            aux[1] = aux[1].replace("0", "");
                        }   
                        if(aux[2] < 10){
                            aux[2] = aux[2].replace("0", "");
                        }
                        datacerta[i] = aux[2]+"-"+aux[1];
                    }
                    for(let i = 1; i <= diasMesAtual; i++){
                        objetos[i] = document.getElementById(i+"-"+mesAtual);
                        objetos[i].disabled = false;
                        objetos[i].checked = false;
                        objetos[i].parentNode.style.backgroundColor = "#ededed";
                    }
                    for(let i = 1; i < objetos.length; i++){
                        for(let j = 0; j < datacerta.length; j++){
                            if(objetos[i].id == datacerta[j]){
                                objetos[i].disabled = true;
                                objetos[i].checked = false;
                                objetos[i].parentNode.style.backgroundColor = "#dd7171";
                            } 
                        }
                    }  
                },
                error: function(erro){
                    console.log('Erro');
                }
            })
        });
        //Realiza requisição ajax ao selecionar o setor
        function configuraCalendario(id){
            $.ajax({
                type: "POST",
                url: "index.php",
                data: {Setor : $("#"+id).val(), horainicio : $("#horainicio").val(), horafinal : $("#horafinal").val()},
                success: function(resultado){
                    var data = JSON.parse(resultado);
                    var datacerta = [];
                    var dataaux = new Date(ano, mesAtual, 0);
                    var diasMesAtual = dataaux.getDate();
                    var objetos = [];
                    objetos[0]="";
                    setorid[mesAtual] = id;
                    for(let i = mesAtual+1; i < setorid.length; i++){
                        if(setorid[i] == ""){
                            setorid[i] = id;
                        }
                    }
                    for(let i = 0; i < data.length; i++){
                        var aux = data[i].dataaula.split('-');
                        if(aux[1] < 10){
                            aux[1] = aux[1].replace("0", "");
                        }   
                        if(aux[2] < 10){
                            aux[2] = aux[2].replace("0", "");
                        }
                        datacerta[i] = aux[2]+"-"+aux[1];
                    }
                    for(let i = 1; i <= diasMesAtual; i++){
                        objetos[i] = document.getElementById(i+"-"+mesAtual);
                        objetos[i].disabled = false;
                        objetos[i].checked = false;
                        objetos[i].parentNode.style.backgroundColor = "#ededed";
                    }
                    for(let i = 1; i < objetos.length; i++){
                        for(let j = 0; j < datacerta.length; j++){
                            if(objetos[i].id == datacerta[j]){
                                objetos[i].disabled = true;
                                objetos[i].checked = false;
                                objetos[i].parentNode.style.backgroundColor = "#dd7171";
                            } 
                        }
                    }  
                },
                error: function(erro){
                    console.log('Erro');
                }
            })
        }
    </script>

</body>
</html>