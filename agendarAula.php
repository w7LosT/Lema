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
    <title>Agendar Aulas</title>
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

            <h3>AGENDAR AULAS</h3>

            <div class="vertical-right"></div>
            
            <div class="vertical-left"></div>

            <form action="index.php" method="post" id="formulario">
                <div class="left-outer">
                    <div class="left-inner">
                        <label class="ident" for="siape">Siape</label>
                        <input type="text" name="siape" id="siape" placeholder="Siape" pattern="[0-9]+" title="Apenas números">
                    </div>

                    <div class="left-inner">
                        <label class="ident" for="prof">Professor</label>
                        <input type="text" name="prof" id="prof" placeholder="Ex.: Maria A. Pereira" pattern="[a-zA-Z.\s]+" title="Apenas letras, espaços ou .">
                    </div>

                    <div class="left-inner">
                        <label class="ident" for="emailProf">E-mail</label>
                        <input type="email" name="emailProf" id="emailProf" placeholder="Ex.: Contato@email.com">
                    </div>
                </div>

                <div class="right-outer">
                    <div class="right-inner">
                        <label class="ident" for="codDisc">Código Disciplina</label>
                        <input type="text" name="codDisc" id="codDisc" placeholder="Código da Disciplina" pattern="[a-zA-z0-9]+" title="Não utilize caracteres especiais" autocomplete="off">
                        <div class="autocomplete-coddisc"></div>
                    </div>

                    <div class="right-inner">
                        <label class="ident" for="nomeDisc">Nome da Disciplina</label>
                        <input type="text" name="nomeDisc" id="nomeDisc" placeholder="Nome da Disciplina" autocomplete="off">
                        <div class="autocomplete-nomedisc"></div>
                    </div>

                    <div class="right-inner">
                        <ul class="montec">
                            <li>
                                <input type="checkbox" name="monitor" id="monitor" value="Necessário">
                                <label for="monitor">A disciplina possui monitor</label>
                            </li>
                            <li>
                                <input type="checkbox" name="tecnico" id="tecnico" value="Necessário">
                                <label for="tecnico">Será necessário acompanhamento de um técnico</label>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="curso">
                    <!-- <h4>Curso</h4> -->
                    <fieldset>
                        <legend>Curso</legend>                    
                        <table>
                            <tr>
                                <td>
                                    <input type="radio" value="GRADUAÇÃO EM ENGENHARIA SANITÁRIA E AMBIENTAL" name="curso" id="gesa">
                                    <label for="gesa">Graduação em Engenharia Sanitária e Ambiental</label>
                                </td>
                                <td>
                                    <input type="radio" value="GRADUAÇÃO EM ENGENHARIA CIVIL" name="curso" id="gec">
                                    <label for="gec">Graduação em Engenharia Civil</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" value="MESTRADO EM ENGENHARIA AMBIENTAL" name="curso" id="mea">
                                    <label for="mea">Mestrado em Engenharia Ambiental</label>
                                </td>
                                <td>
                                    <input type="radio" value="MESTRADO EM ENGENHARIA CIVIL" name="curso" id="mec">
                                    <label for="mec">Mestrado em Engenharia Civil</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" value="DOUTORADO EM ENGENHARIA AMBIENTAL" name="curso" id="dea">
                                    <label for="dea">Doutorado em Engenharia Ambiental</label>
                                </td>
                                <td>
                                    <input type="radio" value="DOUTORADO EM ENGENHARIA CIVIL" name="curso" id="dec">
                                    <label for="dec">Doutorado em Engenharia Civil</label>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="radio" name="curso" id="other">
                                    <label for="other">Outro: </label>
                                    <input type="text" name="outro" id="outro" disabled>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </div>

                <div class="setor">
                    <!-- <h4>Setor</h4> -->
                    <fieldset>
                        <legend>Setor</legend>
                        <table>
                            <tr>
                                <td>
                                    <input type="radio" value="ANÁLISES FÍSICO-QUÍMICAS" name="setor" id="sfq" onclick="configuraCalendario('sfq');">
                                    <label for="sfq">Setor de Análises Físico-Químicas</label>
                                </td>
                        
                                <td>
                                    <input type="radio" value="MECÂNICA DOS FLUIDOS E HIDRÁULICA" name="setor" id="mecflu" onclick="configuraCalendario('mecflu');">
                                    <label for="mecflu">Setor de Mecânica dos Fluidos e Hidráulica</label>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="radio" value="SEDIMENTOMETRIA E HIDROMENTRIA" name="setor" id="hidro" onclick="configuraCalendario('hidro');">
                                    <label for="hidro">Setor de Sedimentometria e Hidromentria</label>
                                </td>
            
                                <td>
                                    <input type="radio" value="APOIO LOGÍSTICO PARA SAÍDA DE CAMPO" name="setor" id="saidacampo" onclick="configuraCalendario('saidacampo');">
                                    <label for="saidacampo">Apoio Logístico para Saída de Campo</label>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </div>

                <div class="right-outer hora">
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

                    <div class="right-inner">
                        <label class="ident" for="numAlunos">Número de Alunos</label>
                        <input type="number" name="numAlunos" id="numAlunos" min="1" max="40">
                    </div>
                    
                </div>

                <div class="calendario-outer">
                    <!-- <h4>Data</h4> -->
                    <fieldset>
                        <legend class="ident">Data</legend>                    
                        <div class="calendario">
                            <?php montaCalendario(); ?>
                            <span>*O horário selecionado está indisponível nos dias marcados em vermelho.*</span>
                        </div>
                    </fieldset>
                </div>

                <div class="left-outer">
                    <div class="left-inner">
                        <div class="arquivo">       
                            <div class="div-label-input">
                                <label class="ident" for="resumo">Resumo da Aula</label>
                            </div>
                            <div class="div-label-arquivo">
                                <input type="file" name="arquivomaterial" id="arquivomaterial"><label for="arquivomaterial"><i class="fas fa-paperclip">Anexar Arquivo</i> (Opcional)</label>
                            </div>
                        </div>
                        <textarea name="resumo" id="resumo" cols="30" rows="10" placeholder="Digite aqui o resumo da aula ou anexe um arquivo."></textarea>
                    </div>
                </div>

                <div class="right-outer">
                    <div class="right-inner">
                        <div class="arquivo">       
                            <div class="div-label-input">
                                <label class="ident" for="material">Equipamentos ou Vidraria Necessários</label>
                            </div>             
                            <div class="div-label-arquivo">
                                <input type="file" name="arquivomaterial" id="arquivomaterial"><label for="arquivomaterial"><i class="fas fa-paperclip">Anexar Arquivo</i> (Opcional)</label>
                            </div>
                        </div>
                        <textarea name="material" id="material" cols="30" rows="10" placeholder="Digite aqui quais equipamentos ou as vidrarias serão usados na aula ou anexe um arquivo."></textarea>
                    </div>
                </div>

                <fieldset>
                    <legend>TERMO DE RESPONSABILIDADE</legend>
                    <ul class="termo-resp">
                        <li>Este termo de responsabilidade demonstra o compromisso do usuário na utilização dos
                        laboratórios para fins didáticos do Laboratório de Engenharia do Meio Ambiente (LEMA).
                        O usuário que aceita esse termo de responsabilidade se compromete a:</li>
                        
                        <li>− Cumprir os horários de funcionamento do laboratório (7:30h às 18:30h);</li>
                        <li>− Utilizar o laboratório apenas no horário preestabelecido no presente agendamento;</li>
                        <li>− Não exceder a quantidade de alunos especificada no presente agendamenti, respeitando a
                        capacidade máxima de lotação do laboratório;</li>
                        <li>− Zelar pelas boas condições do laboratório, devolvendo-o, ao final das atividades, nas mesmas
                        condições de início;</li>
                        <li>− Comunicar ao Gerente Técnico qualquer irregularidade encontrada no laboratório;</li>
                        <li>− Procurar o Gerente Técnico para esclarecimentos referentes a qualquer dúvida técnica,
                        organizacional ou prática do laboratório.</li>
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

        //Automaticamente completa o campo nome da disciplina e codigo da disciplina através da opção clicada no autocomplete do codigo da disciplina
        function puxaDadosCod(idcod){
            // var id = $(this).attr("class");
            $.ajax({
                type: "POST",
                url: "index.php",
                data: { coddisc : $(idcod).text(), chave : "codDisc", clickSuggest : "true"},
                success: function(dadosDisc){
                    var dados = JSON.parse(dadosDisc);
                    $(".autocomplete-coddisc").css("display", "none");
                    $(".autocomplete-nomedisc").css("display", "none");
                    $("#codDisc").val(dados[0].codigo);
                    $("#nomeDisc").val(dados[0].nome);
                },
                error: function(erro){
                    console.log('Erro');
                }
            });
        }

        //Automaticamente completa o campo nome da disciplina e codigo da disciplina através da opção clicada no autocomplete do nome da disciplina
        function puxaDadosNome(idnome){
            $.ajax({
                type: "POST",
                url: "index.php",
                data: { nomedisc : $(idnome).text(), chave : "nomeDisc", clickSuggest : "true"},
                success: function(dadosDisc){
                    var dados = JSON.parse(dadosDisc);
                    $(".autocomplete-coddisc").css("display", "none");
                    $(".autocomplete-nomedisc").css("display", "none");
                    $("#codDisc").val(dados[0].codigo);
                    $("#nomeDisc").val(dados[0].nome);
                },
                error: function(erro){
                    console.log('Erro');
                }
            });
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