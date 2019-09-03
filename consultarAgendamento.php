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
    <link rel="stylesheet" href="./css/consultar-agendamento.css">
    <script src="https://kit.fontawesome.com/5cd09c3eca.js"></script>
    <!-- <link rel="stylesheet" href="./fontawesome-free-5.9.0-web/css/all.css"> -->
    <!-- <link rel="stylesheet" href="./fontawesome-free-5.9.0-desktop/svgs/solid/paperclip.svg"> -->
    <title>Agendar Aulas</title>
</head>
<body>
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

            <h3>CONSULTAR AGENDAMENTOS</h3>

            <div class="calendario">
                <?php montaCalendarioConsulta();?>
            </div>

        </div>
    </div>
    <script type="text/javascript" src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="./js/js.js"></script>
    <script>
        var data = new Date();
        var mesAtual = data.getMonth()+1;
        var anoAtual = data.getFullYear();
        function hideShow(){
            event.preventDefault();
            if(mesAtual > data.getMonth()+5 || mesAtual > 12){
                mesAtual = data.getMonth()+1;
            } else if (mesAtual <  data.getMonth()+1){
                mesAtual = data.getMonth()+5;
            }
        }

        //Avança um mês
        $('#prox').on('click', function(event){
            event.preventDefault();
            mesAtual++;
            hideShow();
        });

        //Retorna um mês
        $('#ant').on('click', function(event){
            event.preventDefault();
            mesAtual--;
            hideShow();
        });

        $("#prox").click(function(event){
            var dataaux = new Date(data.getFullYear(), mesAtual, 0);
            var diasMesAtual = dataaux.getDate();
            var mesAtualBanco;
            if(mesAtual < 10){
                mesAtualBanco = "0"+mesAtual;
            } else{
                mesAtualBanco = mesAtual;
            }
            $.ajax({
                type: "POST",
                url: "index.php",
                data: {dias : diasMesAtual, mes : mesAtualBanco, ano : anoAtual},
                success: function(aulas){
                    var result = JSON.parse(aulas);
                    $(".td-relative").children(".aula").remove();
                    for(let i = 1; i <= diasMesAtual; i++){
                        if(i < 10){
                            dataaux2 = anoAtual+"-"+mesAtualBanco+"-0"+i;
                        } else{
                            dataaux2 = anoAtual+"-"+mesAtualBanco+"-"+i;
                        }
                        for(let j = 0; j < result.length; j++){
                            if((document.getElementById(i+"-"+mesAtual+"-"+result[j].nomesetor)) == null){
                                $("input#"+i+"-"+mesAtual).parent().prepend("<div class='aula "+result[j].nomesetor+"' id='"+i+"-"+mesAtual+"-"+result[j].nomesetor+"'><span>"+result[j].nomesetor+"</span></div>");
                            }
                        }
                    }
                },
                error: function(){
                    console.log("ERRO");
                }
            })
        });

        $("#ant").click(function(event){
            var dataaux = new Date(data.getFullYear(), mesAtual, 0);
            var diasMesAtual = dataaux.getDate();
            var mesAtualBanco;
            if(mesAtual < 10){
                mesAtualBanco = "0"+mesAtual;
            } else{
                mesAtualBanco = mesAtual;
            }
            $.ajax({
                type: "POST",
                url: "index.php",
                data: {dias : diasMesAtual, mes : mesAtualBanco, ano : anoAtual},
                success: function(aulas){
                    var result = JSON.parse(aulas);
                    $(".td-relative").children(".aula").remove();
                    for(let i = 1; i <= diasMesAtual; i++){
                        if(i < 10){
                            dataaux2 = anoAtual+"-"+mesAtualBanco+"-0"+i;
                        } else{
                            dataaux2 = anoAtual+"-"+mesAtualBanco+"-"+i;
                        }
                        for(let j = 0; j < result.length; j++){
                            if(result[j].dataaula == dataaux2){
                                var nomeSetorAux = result[j].nomesetor.split(" ").join("_");
                                var idAux = "'"+i+"_"+mesAtual+"_"+nomeSetorAux+"'";
                                if((document.getElementById(idAux)) == null){
                                    $("input#"+i+"-"+mesAtual).parent().prepend('<div class="aula '+nomeSetorAux+'" id="'+idAux+'" onclick="dadosAulas('+idAux+')"><span>'+result[j].nomesetor+'</span></div>');
                                }
                            }
                        }
                    }
                },
                error: function(){
                    console.log("ERRO");
                }
            })
        });

        function dadosAulas(id){
            console.log(id);
        }
    </script>
</body>
</html>